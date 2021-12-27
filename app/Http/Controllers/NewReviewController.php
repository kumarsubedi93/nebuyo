<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewReviewController extends Controller
{

    public function index(Request $request)
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(15);
        return view('reviews.index', compact('reviews'));
    }

    public function seller_reviews()
    {
        $reviews = DB::table('reviews')
            ->orderBy('id', 'desc')
            ->join('products', 'reviews.product_id', '=', 'products.id')
            ->where('products.user_id', Auth::user()->id)
            ->select('reviews.id')
            ->distinct()
            ->paginate(9);

        foreach ($reviews as $key => $value) {
            $review = \App\Review::find($value->id);
            $review->viewed = 1;
            $review->save();
        }

        return view('frontend.new_customer.review.index', compact('reviews'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->viewed = '0';
        if($review->save()){
            $product = Product::findOrFail($request->product_id);
            if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            flash(translate('Review has been submitted successfully'))->success();
            return back();
        }
        flash(translate('Something went wrong'))->error();
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function updatePublished(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->status = $request->status;
        if($review->save()){
            $product = Product::findOrFail($review->product->id);
            if(count(Review::where('product_id', $product->id)->where('status', 1)->get()) > 0){
                $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating')/count(Review::where('product_id', $product->id)->where('status', 1)->get());
            }
            else {
                $product->rating = 0;
            }
            $product->save();
            return 1;
        }
        return 0;
    }

}