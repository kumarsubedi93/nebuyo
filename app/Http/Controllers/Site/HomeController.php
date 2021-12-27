<?php

namespace App\Http\Controllers\Site;


use App\Models\Category;
use App\Models\Product;
use Neputer\Traits\SiteMap;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    use SiteMap;

    const VIEW_PATH = 'nebuyo.';

    public function index()
    {
        return view(self::VIEW_PATH . 'index');
    }

    public function category($categorySlug)
    {
        $category = Category::whereSlug($categorySlug)->firstOrFail();
        $products = Product::where('category_id', $category->id)->get();
        return view(self::VIEW_PATH . 'category', [
            'products' => $products
        ]);
    }

    public function productDetails($productSlug)
    {
        $product = Product::whereSlug($productSlug)->firstOrFail();
        return view(self::VIEW_PATH . 'product-detail', [
            'product' => $product
        ]);
    }
}