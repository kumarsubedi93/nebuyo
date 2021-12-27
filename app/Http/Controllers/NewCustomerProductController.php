<?php

namespace App\Http\Controllers;

use Foundation\Lib\Meta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\CustomerProduct;
use App\Category;
use App\SubCategory;
use App\Brand;
use App\SubSubCategory;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Product;
use App\Seller;

class NewCustomerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = CustomerProduct::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.new_customer.classified-product.index', compact('products'));
    }

    public function customer_product_index()
    {
        $products = CustomerProduct::all();
        return view('frontend.new_customer.classified-product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function create()
    {
        if(Auth::user()->user_type == "customer" && Auth::user()->remaining_uploads > 0){
            $categories = Category::all();
            return view('frontend.new_customer.classified-product.create', compact('categories'));
        }
        elseif (Auth::user()->user_type == "seller" && Auth::user()->remaining_uploads > 0) {
            $categories = Category::all();
            return view('frontend.new_customer.classified-product.create', compact('categories'));
        }
        else{
            flash(translate('Your classified product upload limit has been reached. Please buy a package.'))->error();
            return redirect()->route('new.customer_packages_list_show');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $customer_product = new CustomerProduct;
        $customer_product->name = $request->name;
        $customer_product->added_by = $request->added_by;
        $customer_product->user_id = Auth::user()->id;
        $customer_product->category_id = $request->category_id;
        $customer_product->subcategory_id = $request->subcategory_id;
        $customer_product->subsubcategory_id = $request->subsubcategory_id;
        $customer_product->brand_id = $request->brand_id;
        $customer_product->conditon = $request->conditon;
        $customer_product->location = $request->location;
        $photos = array();

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/customer_products/photos');
                array_push($photos, $path);
                // ImageOptimizer::optimize(base_path('public/').$path);
            }
            $customer_product->photos = json_encode($photos);
        }

        if($request->hasFile('thumbnail_img')){
            $customer_product->thumbnail_img = $request->thumbnail_img->store('uploads/customer_products/thumbnail');
            // ImageOptimizer::optimize(base_path('public/').$customer_product->thumbnail_img);
        }

        $customer_product->unit = $request->unit;
        $customer_product->tags = implode('|',$request->tags);
        $customer_product->description = $request->description;
        $customer_product->short_description = $request->short_description;
        $customer_product->video_provider = $request->video_provider;
        $customer_product->video_link = $request->video_link;
        $customer_product->unit_price = $request->unit_price;
        $customer_product->meta_title = $request->meta_title;
        $customer_product->meta_description = $request->meta_description;
        if($request->hasFile('meta_img')){
            $customer_product->meta_img = $request->meta_img->store('uploads/customer_products/meta');
            // ImageOptimizer::optimize(base_path('public/').$customer_product->meta_img);
        }
        $customer_product->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5));
        if($customer_product->save()){
            $user = Auth::user();
            $user->remaining_uploads -= 1;
            $user->save();
            flash(translate('Product has been inserted successfully'))->success();
            return redirect()->route('new.customer-products.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = CustomerProduct::find(decrypt($id));
        return view('frontend.new_customer.classified-product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $customer_product = CustomerProduct::find($id);
        $customer_product->name = $request->name;
        $customer_product->status = '1';
        $customer_product->user_id = Auth::user()->id;
        $customer_product->category_id = $request->category_id;
        $customer_product->subcategory_id = $request->subcategory_id;
        $customer_product->subsubcategory_id = $request->subsubcategory_id;
        $customer_product->brand_id = $request->brand_id;
        $customer_product->conditon = $request->conditon;
        $customer_product->location = $request->location;
        $photos = array();

        if($request->has('previous_photos')){
            $photos = $request->previous_photos;
        }
        else{
            $photos = array();
        }

        if($request->hasFile('photos')){
            foreach ($request->photos as $key => $photo) {
                $path = $photo->store('uploads/customer_products/photos');
                array_push($photos, $path);
            }
        }
        $customer_product->photos = json_encode($photos);

        $customer_product->thumbnail_img = $request->previous_thumbnail_img;
        if($request->hasFile('thumbnail_img')){
            $customer_product->thumbnail_img = $request->thumbnail_img->store('uploads/customer_products/thumbnail');
            // ImageOptimizer::optimize(base_path('public/').$customer_product->thumbnail_img);
        }

        $customer_product->unit = $request->unit;
        $customer_product->tags = implode('|',$request->tags);
        $customer_product->description = $request->description;
        $customer_product->short_description = $request->short_description;
        $customer_product->video_provider = $request->video_provider;
        $customer_product->video_link = $request->video_link;
        $customer_product->unit_price = $request->unit_price;
        $customer_product->meta_title = $request->meta_title;
        $customer_product->meta_description = $request->meta_description;
        if($request->hasFile('meta_img')){
            $customer_product->meta_img = $request->meta_img->store('uploads/customer_products/meta');
            // ImageOptimizer::optimize(base_path('public/').$customer_product->meta_img);
        }
        $customer_product->slug = strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5));
        if($customer_product->save()){
            flash(translate('Product has been updated successfully'))->success();
            return redirect()->route('new.customer-products.index');
        }
        else{
            flash(translate('Something went wrong'))->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $product = CustomerProduct::findOrFail($id);
        if (CustomerProduct::destroy($id)) {
            if(Auth::user()->user_type == "customer" || Auth::user()->user_type == "seller"){
                flash(translate('Product has been deleted successfully'))->success();
                return redirect()->route('new.customer-products.index');
            }
            else {
                return back();
            }
        }
    }

    public function updateStatus(Request $request)
    {
        $product = CustomerProduct::findOrFail($request->id);
        $product->status = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function updatePublished(Request $request)
    {
        $product = CustomerProduct::findOrFail($request->id);
        $product->published = $request->status;
        if($product->save()){
            return 1;
        }
        return 0;
    }

    public function customer_products_listing(Request $request)
    {
        return $this->search($request);
    }

    public function customer_product($slug)
    {
        $customer_product  = CustomerProduct::where('slug', $slug)->first();
        if($customer_product!=null){
            return view('newui.customer_product_details', compact('customer_product'));
        }
        abort(404);
    }

    public function search(Request $request)
    {
        $limit = Meta::get('search_product_limit');
        $number = 1;
        $conditions = ['published' => 1];
        $customer_products = CustomerProduct::where($conditions);
        $customer_products->orderBy('created_at', 'desc');
        $sidebarAllCategories = Cache::remember('sidebar_all_categories', 120, function () {
            return \App\Category::where('menu_status', '1')->orderby('order', 'asc')->get();
        });
        $customer_products = filter_customer_products($customer_products);
        $allProducts = $customer_products->get();
        $products = $customer_products->paginate($limit)->appends(request()->query());
        return view('newui.customer_product_listing', compact('products','sidebarAllCategories','allProducts', 'limit', 'number'));
    }

    public function ajax_search(Request $request){
        $filterData = $request->get('filterData');
        $brand_id = $filterData['brandName'];
        $sort_by = $filterData['sortID'];
        $condition = $filterData['condition'];
        $limit = Meta::get('search_product_limit');
        $number = 1;
        $conditions = ['published' => 1];
        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if($condition != null){
            $conditions = array_merge($conditions, ['conditon' => $condition]);
        }
        $customer_products = CustomerProduct::where($conditions);
        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $customer_products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $customer_products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $customer_products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $customer_products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }

        if($condition != null){
            $customer_products->where('conditon', $condition);
        }

        $customer_products = filter_customer_products($customer_products);
        $allProducts = $customer_products->get();
        $products = $customer_products->paginate($limit);
        $response['html'] = view('newui.home.partials.search.customer-search-result', compact('products', 'allProducts','limit','number'))->render();
        return response()->json($response);
    }

    public function ajax_search_load_more(Request $request){
        $filterData = $request->get('filterData');
        $brand_id = $filterData['brandName'];
        $sort_by = $filterData['sortID'];
        $condition = $filterData['condition'];
        $number = 0;
        $limit = Meta::get('search_product_limit');
        $number =$number + $request->get('page');


        $conditions = ['published' => 1];
        if($brand_id != null){
            $conditions = array_merge($conditions, ['brand_id' => $brand_id]);
        }
        if($condition != null){
            $conditions = array_merge($conditions, ['conditon' => $condition]);
        }
        $customer_products = CustomerProduct::where($conditions);
        if($sort_by != null){
            switch ($sort_by) {
                case '1':
                    $customer_products->orderBy('created_at', 'desc');
                    break;
                case '2':
                    $customer_products->orderBy('created_at', 'asc');
                    break;
                case '3':
                    $customer_products->orderBy('unit_price', 'asc');
                    break;
                case '4':
                    $customer_products->orderBy('unit_price', 'desc');
                    break;
                default:
                    // code...
                    break;
            }
        }

        if($condition != null){
            $customer_products->where('conditon', $condition);
        }

        $customer_products = filter_customer_products($customer_products);
        $allProducts = $customer_products->get();
        $products = $customer_products->paginate($limit);
        $response['html'] = view('newui.home.partials.search.customer-search-result', compact('products', 'allProducts','limit','number'))->render();
        return response()->json($response);
    }


}
