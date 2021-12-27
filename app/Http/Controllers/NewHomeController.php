<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Color;
use App\CustomerPackage;
use App\Models\Attribute;
use App\Models\Banner;
use App\Models\BusinessSetting;
use App\Models\Category;
use App\Models\Order;
use App\Models\Slider;
use App\Models\SubSubCategory;
use App\Page;
use App\Seller;
use App\Shop;
use App\User;
use Foundation\Lib\Meta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Models\SubCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Neputer\Traits\SiteMap;
use Auth;

class NewHomeController extends Controller
{
    use SiteMap;

    public function user_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                if ($request->has('remember')) {
                    auth()->login($user, true);
                } else {
                    auth()->login($user, false);
                }
                flash('Successfully Login');
                return redirect()->route('new.dashboard');
            }
        }
        flash('Please Enter Correct Email Or Password');
        return back();
    }

    public function cart_login(Request $request)
    {
        $user = User::whereIn('user_type', ['customer', 'seller'])->where('email', $request->email)->orWhere('phone', $request->email)->first();
        if ($user != null) {
            updateCartSetup();
            if (Hash::check($request->password, $user->password)) {
                if ($request->has('remember')) {
                    auth()->login($user, true);
                } else {
                    auth()->login($user, false);
                }
            }
        }
        return back();
    }

    /**
     * Show the customer/seller dashboard.
     *
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        if (Auth::user()->user_type == 'seller') {
            return view('frontend.new_seller.dashboard');
        } elseif (Auth::user()->user_type == 'customer') {
            return view('frontend.new_customer.dashboard');
        } else {
            abort(404);
        }
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function profile(Request $request)
    {
        return view('frontend.new_customer.profile');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        $data = [];
        $asset_path = '/public/newui/';
        $brands = Brand::select('logo', 'name')->get();
        $data['slider'] = Slider::where('published', 1)->limit(Meta::get('homepage_slider_limit'))->get();
        $data['banner'] = Banner::where('published', 1)->get();
        $data['feature-category'] = Category::with(['subcategories', 'products'])->where('featured', 1)->limit(Meta::get('feature_category_limit'))->get();
        return view('newui.home', compact('asset_path', 'data', 'brands'));
    }

    public function all_categories(Request $request)
    {
        $categories = Category::all();
        return view('newui.all_category', compact('categories'));
    }

    public function mainSiteMap()
    {
        $records = new Collection();
        $pages = config('sitemap.sitemap.main');
        foreach ($pages as $key => $page) {
            $records->push((object)[
                'url' => route($page['route']),
                'last_modified_date' => $page['last_modified_date']
            ]);
        }

        $products = \DB::table('products')->select(
            'products.slug', 'products.updated_at as last_modified_date'
        )->get();

        foreach ($products->chunk(1000) as $key => $record) {
            $records->push((object)[
                'url' => route('new.sitemap.product', 'product-sitemap' . $key),
                'last_modified_date' => $record[1000 * $key]->last_modified_date ?? now()->format('Y-m-d H:i:s'),
            ]);
        }

        return $this->getSiteMap($records, 'sitemap.main');
    }

    public function categorySiteMap()
    {
        $category = \DB::table('categories')->select('updated_at as last_modified_date', 'slug as cat_slug', 'slug', 'type')->get();
        $subCategory = \DB::table('sub_categories')
            ->select('sub_categories.updated_at as last_modified_date', 'sub_categories.slug', 'sub_categories.type', 'cat.slug as cat_slug')
            ->join('categories as cat', 'cat.id', '=', 'sub_categories.category_id')
            ->get();
        $subSubCategory = \DB::table('sub_sub_categories')
            ->select('sub_sub_categories.updated_at as last_modified_date',
                'sub_sub_categories.slug', 'sub_sub_categories.type',
                'sub_cat.slug as sub_cat_slug', 'sub_cat.category_id', 'cat.slug as cat_slug')
            ->join('sub_categories as sub_cat', 'sub_cat.id', '=', 'sub_sub_categories.sub_category_id')
            ->join('categories as cat', 'cat.id', '=', 'sub_cat.category_id')
            ->get();
        $merged = $category->merge($subCategory);
        $records = $merged->merge($subSubCategory);
        return $this->getSiteMap($records, 'sitemap.category');
    }

    public function productSiteMap($product)
    {
        $data = explode('-', $product);
        if (!isset($data[1])) {
            return abort('404');
        }
        $siteMap = explode('.', $data[1]);
        $order = (int)preg_replace('/[^0-9]/', '', $siteMap[0]);
        $limit = 1000;
        $offset = $order * $limit;

        $records = \DB::table('products')->select(
            'products.slug', 'products.updated_at as last_modified_date'
        )
            ->offset($offset)
            ->limit($limit)
            ->get();

        $homePage = new Collection();
        $homePage->push((object)[
            'title' => 'home',
            'slug' => null,
            'category_slug' => null,
            'last_modified_date' => now(),
        ]);
        $records = $homePage->concat($records);
        return $this->getSiteMap($records, 'sitemap.product');
    }

    public function pageSiteMap()
    {
        $topic = \DB::table('products')->select('updated_at')
            ->orderBy('updated_at', 'DESC')
            ->first();
        $records = new Collection();
        $pages = config('sitemap.sitemap.pages');
        foreach ($pages as $key => $page) {
            $records->push((object)[
                'url' => route($page['route']),
                'last_modified_date' => $topic->updated_at
            ]);
        }
        return $this->getSiteMap($records, 'sitemap.page');
    }


    public function firstCategory(Request $request, $category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if (!$category)
            abort('404');
        $data = self::commonSearch($request, $category_slug, $subCategory = null, $subSubCategory = null);
        $products = $data['products'];
        $query = $data['query'];
        $category = $data['category'];
        $subcategory = $data['subcategory'];
        $subsubcategory = $data['subsubcategory'];
        $attributes = $data['attributes'];
        $selected_attributes = $data['selected_attributes'];
        $all_colors = $data['all_colors'];
        $relatedColors = $data['relatedColors'];
        $relatedAttributes = $data['relatedAttributes'];
        $latest_product = $data['latest_product'];
        $limit = $data['limit'];
        $allProducts = $data['allProducts'];
        $cat_id = $data['cat_id'];
        $selected_color = $data['selected_color'];
        $sub_sub_category = $data['sub_sub_category'];
        $sub_category = $data['sub_category'];
        $sidebarAllCategories = $data['sidebarAllCategories'];
        $number = $data['number'];
        $brands = $data['brands'];
        $meta_title = $data['meta_title'];
        $meta_description = $data['meta_description'];
        $totalProduct = $data['totalProduct'];
        $sellers = $data['sellers'];

        return view('newui.category',
            compact('products', 'query', 'category', 'subcategory', 'meta_title', 'meta_description',
                'subsubcategory', 'attributes', 'selected_attributes', 'all_colors', 'relatedColors', 'sellers',
                'latest_product', 'limit', 'allProducts', 'cat_id', 'brands', 'relatedAttributes', 'totalProduct',
                'selected_color', 'sub_sub_category', 'sub_category', 'sidebarAllCategories', 'number'));
    }


    public function secondCategory(Request $request, $category_slug, $sub_category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if (!$category)
            abort('404');
        $sub_category = SubCategory::where('slug', $sub_category_slug)->where('category_id', $category->id)->first();
        if (!$sub_category)
            abort('404');

        $data = self::commonSearch($request, $category_slug, $sub_category_slug, $subSubCategory = null);
        $products = $data['products'];
        $query = $data['query'];
        $category = $data['category'];
        $subcategory = $data['subcategory'];
        $subsubcategory = $data['subsubcategory'];
        $attributes = $data['attributes'];
        $selected_attributes = $data['selected_attributes'];
        $all_colors = $data['all_colors'];
        $relatedColors = $data['relatedColors'];
        $relatedAttributes = $data['relatedAttributes'];
        $latest_product = $data['latest_product'];
        $limit = $data['limit'];
        $allProducts = $data['allProducts'];
        $cat_id = $data['cat_id'];
        $selected_color = $data['selected_color'];
        $sub_sub_category = $data['sub_sub_category'];
        $sub_category = $data['sub_category'];
        $sidebarAllCategories = $data['sidebarAllCategories'];
        $number = $data['number'];
        $brands = $data['brands'];
        $meta_title = $data['meta_title'];
        $meta_description = $data['meta_description'];
        $totalProduct = $data['totalProduct'];
        $sellers = $data['sellers'];

        return view('newui.category',
            compact('products', 'query', 'category', 'subcategory', 'meta_title', 'meta_description',
                'subsubcategory', 'attributes', 'selected_attributes', 'all_colors', 'relatedColors', 'sellers',
                'latest_product', 'limit', 'allProducts', 'cat_id', 'brands', 'relatedAttributes', 'totalProduct',
                'selected_color', 'sub_sub_category', 'sub_category', 'sidebarAllCategories', 'number'));
    }

    public function productList(Request $request, $category_slug, $sub_category_slug, $sub_sub_category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $sub_category = SubCategory::where('slug', $sub_category_slug)->where('category_id', $category->id)->first();
        $sub_sub_category = SubSubCategory::where('slug', $sub_sub_category_slug)->where('sub_category_id', $sub_category->id)->first();
        if (!$sub_sub_category)
            abort('404');

        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (\App\Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (\App\SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (\App\SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;

        $conditions = ['published' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if ($category_id != null) {
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if ($subcategory_id != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if ($subsubcategory_id != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if ($seller_id != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        if ($min_price != null && $max_price != null) {
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
        }

        if ($sort_by != null) {
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(12)->appends(request()->query());

        return view('newui.product_list', compact(
            'category', 'sub_category', 'sub_sub_category', 'products',
            'query', 'category_id',
            'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by',
            'seller_id', 'min_price', 'max_price', 'attributes', 'selected_attributes',
            'all_colors', 'selected_color'));
    }

    public function categorySearch(Request $request)
    {
        $id = \Crypt::decryptString($request->get('subsubcategory'));
        $sub_sub_category = SubSubCategory::where('id', $id)->first();
        $sub_category = SubCategory::where('id', $sub_sub_category->sub_category_id)->first();
        $category = Category::where('id', $sub_category->category_id)->first();
        if (!$sub_sub_category)
            abort('404');

        $query = $request->q;
        $brand_id = (Brand::where('slug', $request->brand)->first() != null) ? Brand::where('slug', $request->brand)->first()->id : null;
        $sort_by = $request->sort_by;
        $category_id = (\App\Category::where('slug', $request->category)->first() != null) ? Category::where('slug', $request->category)->first()->id : null;
        $subcategory_id = (\App\SubCategory::where('slug', $request->subcategory)->first() != null) ? SubCategory::where('slug', $request->subcategory)->first()->id : null;
        $subsubcategory_id = (\App\SubSubCategory::where('slug', $request->subsubcategory)->first() != null) ? SubSubCategory::where('slug', $request->subsubcategory)->first()->id : null;

        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $seller_id = $request->seller_id;


        $products = Product::
        select(
            'products.*',
            'categories.name as category_name',
            'categories.slug as category_slug',
            'sub_cat.name as sub_category_name',
            'sub_cat.slug as sub_category_slug',
            'sub_sub_cat.name as sub_sub_category_name',
            'sub_sub_cat.slug as sub_sub_category_slug'
        )->where('published', 1)->where('subsubcategory_id', $sub_sub_category->id)
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
            ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
            ->get();

        $conditions = ['published' => 1];

        if ($brand_id != null) {
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if ($category_id != null) {
            $conditions = array_merge($conditions, ['category_id' => $category_id]);
        }
        if ($subcategory_id != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory_id]);
        }
        if ($subsubcategory_id != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory_id]);
        }
        if ($seller_id != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($seller_id)->user->id]);
        }

        $products = Product::where($conditions);

        if ($min_price != null && $max_price != null) {
            $products = $products->where('unit_price', '>=', $min_price)->where('unit_price', '<=', $max_price);
        }

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
        }

        if ($sort_by != null) {
            switch ($sort_by) {
                case '1':
                    $products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }


        $non_paginate_products = filter_products($products)->get();

        //Attribute Filter

        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }


        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }


        $products = filter_products($products)->paginate(12)->appends(request()->query());

//        $products = Product::
//        select(
//            'products.*',
//            'categories.name as category_name',
//            'categories.slug as category_slug',
//            'sub_cat.name as sub_category_name',
//            'sub_cat.slug as sub_category_slug',
//            'sub_sub_cat.name as sub_sub_category_name',
//            'sub_sub_cat.slug as sub_sub_category_slug'
//        )->where('published', 1)->where('subsubcategory_id', $sub_sub_category->id)
//            ->join('categories', 'categories.id', '=', 'products.category_id')
//            ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
//            ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
//            ->get();
        /*        return view('frontend.product_listing', compact(
                    'products', 'query', 'category_id',
                    'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by',
                    'seller_id','min_price', 'max_price', 'attributes', 'selected_attributes',
                    'all_colors', 'selected_color'));*/

        return view('newui.product_list', compact(
            'category', 'sub_category', 'sub_sub_category', 'products',
            'query', 'category_id',
            'subcategory_id', 'subsubcategory_id', 'brand_id', 'sort_by',
            'seller_id', 'min_price', 'max_price', 'attributes', 'selected_attributes',
            'all_colors', 'selected_color'));
    }

    public function product(Request $request, $slug)
    {
        $detailedProduct = Product::where('slug', $slug)->first();
        if ($detailedProduct != null && $detailedProduct->published) {
            updateCartSetup();
            if ($request->has('product_referral_code')) {
                Cookie::queue('product_referral_code', $request->product_referral_code, 43200);
                Cookie::queue('referred_product_id', $detailedProduct->id, 43200);
            }
            if ($detailedProduct->digital == 1) {
                return view('frontend.digital_product_details', compact('detailedProduct'));
            } else {

                return view('newui.product_detail', compact('detailedProduct'));
//                return view('frontend.product_details', compact('detailedProduct'));
            }
            // return view('frontend.product_details', compact('detailedProduct'));
        }
        abort(404);
    }

    public function shop($slug)
    {
        $topSellLimit = Meta::get('top_selling_limit');
        $allProductLimit = Meta::get('all_product_limit');
        $newArrivalLimit = Meta::get('new_arrival_limit');

        $shop = Shop::where('slug', $slug)->first();
        if ($shop != null) {
            $allProd = $this->getCategoryProduct($shop['user_id'], $type = 'all');
            $topSell = $this->getCategoryProduct($shop['user_id'], $type = 'topSell');
            $topFeatured = $this->getCategoryProduct($shop['user_id'], $type = 'featured');
            $topSellProduct = $topSell->paginate($topSellLimit);
            $featureProduct = $topFeatured->get();
            $allProduct = $allProd->paginate($allProductLimit);
            $newProduct = $allProd->orderBy('products.created_at', 'desc')->paginate($newArrivalLimit);
            $seller = Seller::where('user_id', $shop->user_id)->first();
            if ($seller->verification_status != 0) {
                return view('newui.seller_shop', compact('shop', 'topSellProduct', 'allProduct', 'newProduct', 'featureProduct'));
            } else {
                return view('newui.seller_shop_without_verification', compact('shop', 'seller'));
            }
        }
        abort(404);
    }

    public function variant_price(Request $request)
    {
        $product = Product::find($request->id);
        $str = '';
        $quantity = 0;

        if ($request->has('color')) {
            $data['color'] = $request['color'];
            $str = Color::where('code', $request['color'])->first()->name;
        }

        if (json_decode(Product::find($request->id)->choice_options) != null) {
            foreach (json_decode(Product::find($request->id)->choice_options) as $key => $choice) {
                if ($str != null) {
                    $str .= '-' . str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                } else {
                    $str .= str_replace(' ', '', $request['attribute_id_' . $choice->attribute_id]);
                }
            }
        }


        if ($str != null && $product->variant_product) {
            $product_stock = $product->stocks->where('variant', $str)->first();
            $price = $product_stock->price;
            $quantity = $product_stock->qty;
        } else {
            $price = $product->unit_price;
            $quantity = $product->current_stock;
        }
        //discount calculation
        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $key => $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first() != null) {
                $flash_deal_product = \App\FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $product->id)->first();
                if ($flash_deal_product->discount_type == 'percent') {
                    $price -= ($price * $flash_deal_product->discount) / 100;
                } elseif ($flash_deal_product->discount_type == 'amount') {
                    $price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }
        if (!$inFlashDeal) {
            if ($product->discount_type == 'percent') {
                $price -= ($price * $product->discount) / 100;
            } elseif ($product->discount_type == 'amount') {
                $price -= $product->discount;
            }
        }

        if ($product->tax_type == 'percent') {
            $price += ($price * $product->tax) / 100;
        } elseif ($product->tax_type == 'amount') {
            $price += $product->tax;
        }
        return array('price' => single_price($price * $request->quantity), 'quantity' => $quantity, 'digital' => $product->digital);
    }

    public function terms(Request $request)
    {
        $slug = collect(request()->segments())->last();
        $data['page'] = Page::where('slug', $slug)->first();
        return view('newui.terms', compact('data'));
    }

    public function shopGrid(Request $request)
    {
        return view('newui.shop-grid');
    }

    public function getCategoryProduct($id, $type)
    {
        $product = Product:: select(
            'products.*',
            'categories.name as category_name',
            'categories.slug as category_slug',
            'sub_cat.name as sub_category_name',
            'sub_cat.slug as sub_category_slug',
            'sub_sub_cat.name as sub_sub_category_name',
            'sub_sub_cat.slug as sub_sub_category_slug'
        )
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('sub_categories as sub_cat', 'sub_cat.id', '=', 'products.subcategory_id')
            ->leftJoin('sub_sub_categories as sub_sub_cat', 'sub_sub_cat.id', '=', 'products.subsubcategory_id')
            ->where('products.user_id', $id)->where('products.published', 1);
        if ($type == 'all') {
            $product->get();
        }
        if ($type == 'topSell') {
            $product->orderBy('products.num_of_sale', 'desc')->get();
        }
        if ($type == 'featured') {
            $product->where('products.featured', '1')->get();
        }
        return $product;
    }

    public function trackOrder(Request $request)
    {
        if ($request->has('order_code')) {
            $order = Order::where('code', $request->order_code)->first();
            if ($order != null) {
                return view('newui.track_order', compact('order'));
            }
        }
        return view('newui.track_order');
    }

    public function search(Request $request)
    {
        $category = $request->category;
        $subCategory = $request->subCategory;
        $subSubCategory = $request->subSubCategory;
        $data = self::commonSearch($request, $category, $subCategory, $subSubCategory);

        $products = $data['products'];
        $query = $data['query'];
        $category = $data['category'];
        $subcategory = $data['subcategory'];
        $subsubcategory = $data['subsubcategory'];
        $attributes = $data['attributes'];
        $selected_attributes = $data['selected_attributes'];
        $all_colors = $data['all_colors'];
        $relatedColors = $data['relatedColors'];
        $relatedAttributes = $data['relatedAttributes'];
        $latest_product = $data['latest_product'];
        $limit = $data['limit'];
        $allProducts = $data['allProducts'];
        $cat_id = $data['cat_id'];
        $selected_color = $data['selected_color'];
        $sub_sub_category = $data['sub_sub_category'];
        $sub_category = $data['sub_category'];
        $sidebarAllCategories = $data['sidebarAllCategories'];
        $number = $data['number'];
        $brands = $data['brands'];
        $meta_title = $data['meta_title'];
        $meta_description = $data['meta_description'];
        $totalProduct = $data['totalProduct'];
        $sellers = $data['sellers'];


        return view('newui.product_listing',
            compact('products', 'query', 'category', 'subcategory',
                'subsubcategory', 'attributes', 'relatedAttributes', 'selected_attributes', 'all_colors', 'relatedColors', 'totalProduct', 'sellers',
                'latest_product', 'limit', 'allProducts', 'cat_id', 'brands', 'meta_description', 'meta_title',
                'selected_color', 'sub_sub_category', 'sub_category', 'sidebarAllCategories', 'number'));
    }

    public function commonSearch($request, $cat, $subCat, $subSubCat)
    {
        $query = $request->q;
        $categoryQuery = null;
        $subcategory = null;
        $subsubcategory = null;
        $cat_id = null;
        $meta_title = null;
        $meta_description = null;
        $data = [];

        $brands = \App\Brand::select('id', 'logo', 'name')->get();
        $sellers = \App\Seller::select('sellers.id', 'shops.name as shop_name')
            ->leftJoin('shops', 'shops.user_id', '=', 'sellers.user_id')
            ->get();
        $category = Category::select('id', 'slug', 'name', 'meta_title', 'meta_description')->where('slug', $cat)->first() ?? null;
        if ($category) {
            $subcategory = SubCategory::select('id', 'slug', 'name', 'meta_title', 'meta_description')
                    ->where('category_id', $category['id'])->where('slug', $subCat)->first() ?? null;
            $cat_id = $category['id'];
            $meta_title = $category['meta_title'];
            $meta_description = $category['meta_description'];
        }
        if ($subcategory != null) {
            $subsubcategory = SubSubCategory::select('id', 'slug', 'name', 'meta_title', 'meta_description')->where('sub_category_id', $subcategory['id'])->where('slug', $subSubCat)->first() ?? null;
            $meta_title = $subcategory['meta_title'];
            $meta_description = $subcategory['meta_description'];
        }
        if ($subsubcategory != null) {
            $meta_title = $subsubcategory['meta_title'];
            $meta_description = $subsubcategory['meta_description'];
        }

        $conditions = ['published' => 1];
        $number = 1;
        $limit = Meta::get('search_product_limit');

        if (isset($category)) {
            $sub_category = SubCategory::where('category_id', $category->id)->get();
            $latest_product = Product::where('category_id', $category->id)->latest()->limit(5)->get();
        } else {
            $sub_category = null;
            $latest_product = Product::latest()->limit(5)->get();
        }
        if (isset($subcategory)) {
            $sub_sub_category = SubSubCategory::where('sub_category_id', $subcategory->id)->get();
        } else {
            $sub_sub_category = null;
        }
        $sidebarAllCategories = Cache::remember('sidebar_all_categories', 120, function () {
            return \App\Category::where('menu_status', '1')->orderby('order', 'asc')->get();
        });

        if ($category != null) {
            $conditions = array_merge($conditions, ['category_id' => $category->id]);
            $categoryQuery = $category->name;
        }
        if ($subcategory != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory->id]);
            $categoryQuery = $subcategory->name;
        }
        if ($subsubcategory != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory->id]);
            $categoryQuery = $subsubcategory->name;
        }

        $products = Product::select(
            'products.id', 'products.name', 'products.category_id', 'products.subcategory_id', 'products.subsubcategory_id',
            'products.brand_id', 'products.thumbnail_img', 'products.unit_price', 'products.purchase_price', 'products.tax', 'products.tax_type',
            'products.attributes', 'products.choice_options', 'products.colors', 'products.unit_price', 'products.discount_type', 'products.discount',
            'products.slug', 'products.rating', 'products.digital', 'flash_deal_products.discount as flash_deal_product_discount',
            'flash_deals.title as flash_deals_title', 'flash_deals.start_date as flash_deal_start_date', 'flash_deal_products.discount_type as flash_deal_product_discount_type',
            'flash_deals.end_date as flash_deal_end_date'
        )
            ->leftJoin('flash_deal_products', 'flash_deal_products.product_id', '=', 'products.id')
            ->leftJoin('flash_deals', 'flash_deals.id', '=', 'flash_deal_products.flash_deal_id')
            ->where('flash_deals.status', 1)
            ->groupby('products.id')
            ->where($conditions);
//        dd($products->get());
//        $products = Product::where($conditions);

//        $business_settings = BusinessSetting::where('type', 'system_default_currency')->first();
//        if(!is_null($business_settings)){
//            $currency = \App\Currency::find($business_settings->value);
//        }
//        $code = \App\Currency::findOrFail(\App\BusinessSetting::where('type', 'system_default_currency')->first()->value)->code;
//        $codes= \App\Currency::findOrFail('');
//        dd($code, $currency,
//            \App\BusinessSetting::where('type', 'system_default_currency')->first()->value,
//            \App\Currency::get()
//        );

        if ($query != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            if ($query == 'recommended') {
                $products = $products->orderBy('num_of_sale', 'desc');
            } else {
                $products = $products->where('name', 'like', '%' . $query . '%')->orWhere('tags', 'like', '%' . $query . '%');
            }
        } else {
            $query = $categoryQuery;
        }
        if (is_null($query)) {
            $urlFull = \Request::fullUrl();
            $urlFull = explode('=', $urlFull);
            $query = end($urlFull);
        }

        $non_paginate_products = filter_join_products($products)->get();
        //Attribute Filter
        $attributes = array();
        //Color Filter
        $all_colors = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }
        $relatedColors = Color::select('name', 'code')->whereIn('code', $all_colors)->get();
        $relatedAttributes = Attribute::select('id', 'name')->get();
        $selected_attributes = array();

        foreach ($attributes as $key => $attribute) {
            if ($request->has('attribute_' . $attribute['id'])) {
                foreach ($request['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }

                $item['id'] = $attribute['id'];
                $item['values'] = $request['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }

        $selected_color = null;

        if ($request->has('color')) {
            $str = '"' . $request->color . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $request->color;
        }

        $products = filter_join_products($products);
        $allProducts = $products->get();
        $totalProduct = filter_products(Product::select('unit_price'))->get();
        $products = $products->paginate($limit)->appends(request()->query());
        $query = ucfirst(str_replace('_', ' ', $query));

        $data = [
            'products' => $products,
            'query' => $query,
            'category' => $category,
            'subcategory' => $subcategory,
            'subsubcategory' => $subsubcategory,
            'attributes' => $attributes,
            'selected_attributes' => $selected_attributes,
            'all_colors' => $all_colors,
            'relatedColors' => $relatedColors,
            'relatedAttributes' => $relatedAttributes,
            'latest_product' => $latest_product,
            'limit' => $limit,
            'allProducts' => $allProducts,
            'totalProduct' => $totalProduct,
            'cat_id' => $cat_id,
            'selected_color' => $selected_color,
            'sub_sub_category' => $sub_sub_category,
            'sub_category' => $sub_category,
            'sidebarAllCategories' => $sidebarAllCategories,
            'number' => $number,
            'brands' => $brands,
            'sellers' => $sellers,
            'meta_title' => $meta_title,
            'meta_description' => $meta_description,

        ];
        return $data;
    }


    public function load_best_selling_section()
    {
        return view('newui.home.partials.best_selling_section');
    }

    public function premium_package_index()
    {
        $customer_packages = CustomerPackage::all();
        return view('frontend.new_customer.customer_package_list', compact('customer_packages'));
    }

    public function customer_update_profile(Request $request)
    {
        if (env('DEMO_MODE') == 'On') {
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('photo')) {
            $user->avatar_original = $request->photo->store('uploads/users');
        }

        if ($user->save()) {
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function seller_update_profile(Request $request)
    {
        if (env('DEMO_MODE') == 'On') {
            flash(translate('Sorry! the action is not permitted in demo '))->error();
            return back();
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->phone = $request->phone;

        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            $user->password = Hash::make($request->new_password);
        }

        if ($request->hasFile('photo')) {
            $user->avatar_original = $request->photo->store('uploads');
        }

        $seller = $user->seller;
        $seller->cash_on_delivery_status = $request->cash_on_delivery_status;
        $seller->bank_payment_status = $request->bank_payment_status;
        $seller->bank_name = $request->bank_name;
        $seller->bank_acc_name = $request->bank_acc_name;
        $seller->bank_acc_no = $request->bank_acc_no;
        $seller->bank_routing_no = $request->bank_routing_no;

        if ($user->save() && $seller->save()) {
            flash(translate('Your Profile has been updated successfully!'))->success();
            return back();
        }

        flash(translate('Sorry! Something went wrong.'))->error();
        return back();
    }

    public function seller_product_list(Request $request)
    {
        $search = null;
        $products = Product::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc');
        if ($request->has('search')) {
            $search = $request->search;
            $products = $products->where('name', 'like', '%' . $search . '%');
        }
        $products = $products->paginate(10);
        return view('frontend.new_customer.product.index', compact('products', 'search'));
    }

    public function show_product_upload_form(Request $request)
    {
        if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            if (Auth::user()->seller->remaining_uploads > 0) {
                $categories = \App\Category::all();
                return view('frontend.seller.product_upload', compact('categories'));
            } else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }
        $categories = Category::all();
        return view('frontend.new_customer.product.create', compact('categories'));
    }

    public function show_product_edit_form(Request $request, $id)
    {
        $categories = \App\Category::all();
        $product = Product::find(decrypt($id));
        return view('frontend.new_customer.product.edit', compact('categories', 'product'));

    }

    public function show_digital_product_upload_form(Request $request)
    {
        if (\App\Addon::where('unique_identifier', 'seller_subscription')->first() != null && \App\Addon::where('unique_identifier', 'seller_subscription')->first()->activated) {
            if (Auth::user()->seller->remaining_digital_uploads > 0) {
                $business_settings = \App\BusinessSetting::where('type', 'digital_product_upload')->first();
                $categories = \App\Category::where('digital', 1)->get();
                return view('frontend.seller.digitalproducts.product_upload', compact('categories'));
            } else {
                flash(translate('Upload limit has been reached. Please upgrade your package.'))->warning();
                return back();
            }
        }

        $business_settings = BusinessSetting::where('type', 'digital_product_upload')->first();
        $categories = Category::where('digital', 1)->get();
        return view('frontend.seller.digitalproducts.product_upload', compact('categories'));
    }

    public function show_digital_product_edit_form(Request $request, $id)
    {
        $categories = Category::where('digital', 1)->get();
        $product = Product::find(decrypt($id));
        return view('frontend.seller.digitalproducts.product_edit', compact('categories', 'product'));
    }

    public function ajax_home_search(Request $request)
    {
        $keywords = array();
        $products = Product::where('published', 1)->where('tags', 'like', '%' . $request->search . '%')->get();
        foreach ($products as $key => $product) {
            foreach (explode(',', $product->tags) as $key => $tag) {
                if (stripos($tag, $request->search) !== false) {
                    if (sizeof($keywords) > 5) {
                        break;
                    } else {
                        if (!in_array(strtolower($tag), $keywords)) {
                            array_push($keywords, strtolower($tag));
                        }
                    }
                }
            }
        }

        $products = filter_products(Product::where('published', 1)->where('name', 'like', '%' . $request->search . '%'))->get()->take(3);

        $subsubcategories = SubSubCategory::where('name', 'like', '%' . $request->search . '%')->get()->take(3);

        $shops = Shop::whereIn('user_id', verified_sellers_id())->where('name', 'like', '%' . $request->search . '%')->get()->take(3);

        if (sizeof($keywords) > 0 || sizeof($subsubcategories) > 0 || sizeof($products) > 0 || sizeof($shops) > 0) {
            return view('newui.home.partials.search_content', compact('products', 'subsubcategories', 'keywords', 'shops'));
        }
        return '0';
    }


    public function ajax_search(Request $request)
    {
        $filterData = $request->get('filterData');
        $category = $filterData['category'];
        $subCategory = $filterData['subcategory'];
        $subSubCategory = $filterData['subsubcategory'];
        $data = self::ajax_common_search($request, $category, $subCategory, $subSubCategory);

        $products = $data['products'];
        $allProducts = $data['allProducts'];
        $limit = $data['limit'];
        $number = $data['number'];
        $response['html'] = view('newui.home.partials.search.search-result', compact('products', 'allProducts', 'limit', 'number'))->render();
        return response()->json($response);
    }

    public function ajax_common_search($request, $cat, $subCat, $subSubCat)
    {
        $data = [];
        $filterData = $request->get('filterData');
        $request->q = $filterData['q'];
        $subcategory = null;
        $subsubcategory = null;
        $category = Category::select('id', 'slug', 'name')->where('slug', $cat)->first() ?? null;
        if ($category) {
            $subcategory = SubCategory::select('id', 'slug', 'name')->where('category_id', $category['id'])->where('slug', $subCat)->first() ?? null;
        }
        if ($subcategory != null) {
            $subsubcategory = SubSubCategory::select('id', 'slug', 'name')->where('sub_category_id', $subcategory['id'])->where('slug', $subSubCat)->first() ?? null;
        }
        $limit = Meta::get('search_product_limit');
        $number = 1;
        $conditions = ['published' => 1];
        if ($filterData['brandName'] != null) {
            $conditions = array_merge($conditions, ['brand_id' => $filterData['brandName']]);
        }
        if ($category != null) {
            $conditions = array_merge($conditions, ['category_id' => $category->id]);
        }
        if ($subcategory != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory->id]);
        }
        if ($subsubcategory != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory->id]);
        }
        if ($filterData['seller'] != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($filterData['seller'])->user->id]);
        }
//        $products = Product::where($conditions);

        $products = Product::select(
            'products.id', 'products.name', 'products.category_id', 'products.subcategory_id', 'products.subsubcategory_id',
            'products.brand_id', 'products.thumbnail_img', 'products.unit_price', 'products.purchase_price', 'products.tax', 'products.tax_type',
            'products.attributes', 'products.choice_options', 'products.colors', 'products.unit_price', 'products.discount_type', 'products.discount',
            'products.slug', 'products.rating', 'products.digital', 'flash_deal_products.discount as flash_deal_product_discount',
            'flash_deals.title as flash_deals_title', 'flash_deals.start_date as flash_deal_start_date', 'flash_deal_products.discount_type as flash_deal_product_discount_type',
            'flash_deals.end_date as flash_deal_end_date'
        )
            ->leftJoin('flash_deal_products', 'flash_deal_products.product_id', '=', 'products.id')
            ->leftJoin('flash_deals', 'flash_deals.id', '=', 'flash_deal_products.flash_deal_id')
            ->where('flash_deals.status', 1)
            ->groupby('products.id')
            ->where($conditions);

        if ($filterData['maxPrice'] != null && $filterData['minPrice'] != null) {
            $products = $products->where('unit_price', '>=', $filterData['minPrice'])->where('unit_price', '<=', $filterData['maxPrice']);
        }

        if ($filterData['q'] != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            if ($filterData['q'] == 'recommended') {
                $products = $products->orderBy('num_of_sale', 'desc');
            } else {
                $products = $products->where('name', 'like', '%' . $filterData['q'] . '%')->orWhere('tags', 'like', '%' . $filterData['q'] . '%');
            }
        }
        if ($filterData['sortID'] != null) {
            if ($filterData['sortID'] == 1) {
                $products = $products->orderBy('products.created_at', 'desc');
            }
            if ($filterData['sortID'] == 2) {
                $products = $products->orderBy('products.created_at', 'asc');
            }
            if ($filterData['sortID'] == 3) {
                $products = $products->orderBy('products.unit_price', 'asc');
            }
            if ($filterData['sortID'] == 4) {
                $products = $products->orderBy('products.unit_price', 'desc');
            }
        }

        $non_paginate_products = filter_join_products($products)->get();


        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();
        foreach ($attributes as $key => $attribute) {
            if (isset($filterData['attribute_' . $attribute['id']])) {
                foreach ($filterData['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }
                $item['id'] = $attribute['id'];
                $item['values'] = $filterData['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }
        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($filterData['color']) {
            $str = '"' . $filterData['color'] . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $filterData['color'];
        }
        $products = filter_join_products($products);
        $allProducts = $products->get();
        $products = $products->paginate($limit);
        $data = [
            'products' => $products,
            'limit' => $limit,
            'allProducts' => $allProducts,
            'number' => $number,
        ];
        return $data;
    }

    public function ajax_search_load_more(Request $request)
    {

        $filterData = $request->get('filterData');
        $category = $filterData['category'];
        $subCategory = $filterData['subcategory'];
        $subSubCategory = $filterData['subsubcategory'];
        $data = self::ajax_common_search_load_more($request, $category, $subCategory, $subSubCategory);
        $products = $data['products'];
        $allProducts = $data['allProducts'];
        $limit = $data['limit'];
        $number = $data['number'];
        $response['html'] = view('newui.home.partials.search.search-result', compact('products', 'allProducts', 'limit', 'number'))->render();
        return response()->json($response);
    }

    public function ajax_common_search_load_more($request, $cat, $subCat, $subSubCat)
    {
        $data = [];
        $filterData = $request->get('filterData');
        $request->q = $filterData['q'];
        $subcategory = null;
        $subsubcategory = null;
        $category = Category::select('id', 'slug', 'name')->where('slug', $cat)->first() ?? null;
        if ($category) {
            $subcategory = SubCategory::select('id', 'slug', 'name')->where('category_id', $category['id'])->where('slug', $subCat)->first() ?? null;
        }
        if ($subcategory != null) {
            $subsubcategory = SubSubCategory::select('id', 'slug', 'name')->where('sub_category_id', $subcategory['id'])->where('slug', $subSubCat)->first() ?? null;
        }

        $limit = Meta::get('search_product_limit');
        $conditions = ['published' => 1];
        $number = 0;
        $number = $number + $request->get('page');

        if ($filterData['brandName'] != null) {
            $conditions = array_merge($conditions, ['brand_id' => $filterData['brandName']]);
        }
        if ($category != null) {
            $conditions = array_merge($conditions, ['category_id' => $category->id]);
        }
        if ($subcategory != null) {
            $conditions = array_merge($conditions, ['subcategory_id' => $subcategory->id]);
        }
        if ($subsubcategory != null) {
            $conditions = array_merge($conditions, ['subsubcategory_id' => $subsubcategory->id]);
        }
        if ($filterData['seller'] != null) {
            $conditions = array_merge($conditions, ['user_id' => Seller::findOrFail($filterData['seller'])->user->id]);
        }

//        $products = Product::where($conditions);

        $products = Product::select(
            'products.id', 'products.name', 'products.category_id', 'products.subcategory_id', 'products.subsubcategory_id',
            'products.brand_id', 'products.thumbnail_img', 'products.unit_price', 'products.purchase_price', 'products.tax', 'products.tax_type',
            'products.attributes', 'products.choice_options', 'products.colors', 'products.unit_price', 'products.discount_type', 'products.discount',
            'products.slug', 'products.rating', 'products.digital', 'flash_deal_products.discount as flash_deal_product_discount',
            'flash_deals.title as flash_deals_title', 'flash_deals.start_date as flash_deal_start_date', 'flash_deal_products.discount_type as flash_deal_product_discount_type',
            'flash_deals.end_date as flash_deal_end_date'
        )
            ->leftJoin('flash_deal_products', 'flash_deal_products.product_id', '=', 'products.id')
            ->leftJoin('flash_deals', 'flash_deals.id', '=', 'flash_deal_products.flash_deal_id')
            ->where('flash_deals.status', 1)
            ->groupby('products.id')
            ->where($conditions);

        if ($filterData['maxPrice'] != null && $filterData['minPrice'] != null) {
            $products = $products->where('unit_price', '>=', $filterData['minPrice'])->where('unit_price', '<=', $filterData['maxPrice']);
        }

        if ($filterData['q'] != null) {
            $searchController = new SearchController;
            $searchController->store($request);
            if ($filterData['q'] == 'recommended') {
                $products = $products->orderBy('num_of_sale', 'desc');
            } else {
                $products = $products->where('name', 'like', '%' . $filterData['q'] . '%')->orWhere('tags', 'like', '%' . $filterData['q'] . '%');
            }
        }

        if ($filterData['sortID'] != null) {
            if ($filterData['sortID'] == 1) {
                $products = $products->orderBy('products.created_at', 'desc');
            }
            if ($filterData['sortID'] == 2) {
                $products = $products->orderBy('products.created_at', 'asc');
            }
            if ($filterData['sortID'] == 3) {
                $products = $products->orderBy('products.unit_price', 'asc');
            }
            if ($filterData['sortID'] == 4) {
                $products = $products->orderBy('products.unit_price', 'desc');
            }
        }

        $non_paginate_products = filter_join_products($products)->get();


        $attributes = array();
        foreach ($non_paginate_products as $key => $product) {
            if ($product->attributes != null && is_array(json_decode($product->attributes))) {
                foreach (json_decode($product->attributes) as $key => $value) {
                    $flag = false;
                    $pos = 0;
                    foreach ($attributes as $key => $attribute) {
                        if ($attribute['id'] == $value) {
                            $flag = true;
                            $pos = $key;
                            break;
                        }
                    }
                    if (!$flag) {
                        $item['id'] = $value;
                        $item['values'] = array();
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                $item['values'] = $choice_option->values;
                                break;
                            }
                        }
                        array_push($attributes, $item);
                    } else {
                        foreach (json_decode($product->choice_options) as $key => $choice_option) {
                            if ($choice_option->attribute_id == $value) {
                                foreach ($choice_option->values as $key => $value) {
                                    if (!in_array($value, $attributes[$pos]['values'])) {
                                        array_push($attributes[$pos]['values'], $value);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        $selected_attributes = array();
        foreach ($attributes as $key => $attribute) {
            if (isset($filterData['attribute_' . $attribute['id']])) {
                foreach ($filterData['attribute_' . $attribute['id']] as $key => $value) {
                    $str = '"' . $value . '"';
                    $products = $products->where('choice_options', 'like', '%' . $str . '%');
                }
                $item['id'] = $attribute['id'];
                $item['values'] = $filterData['attribute_' . $attribute['id']];
                array_push($selected_attributes, $item);
            }
        }

        //Color Filter
        $all_colors = array();

        foreach ($non_paginate_products as $key => $product) {
            if ($product->colors != null) {
                foreach (json_decode($product->colors) as $key => $color) {
                    if (!in_array($color, $all_colors)) {
                        array_push($all_colors, $color);
                    }
                }
            }
        }

        $selected_color = null;

        if ($filterData['color']) {
            $str = '"' . $filterData['color'] . '"';
            $products = $products->where('colors', 'like', '%' . $str . '%');
            $selected_color = $filterData['color'];
        }

        $products = filter_join_products($products);
        $allProducts = $products->get();
        $products = $products->paginate($limit);

        $data = [
            'products' => $products,
            'limit' => $limit,
            'allProducts' => $allProducts,
            'number' => $number,
        ];
        return $data;
    }
}
