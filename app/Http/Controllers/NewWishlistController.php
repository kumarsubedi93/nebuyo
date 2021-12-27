<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Auth;
use App\Wishlist;
use App\Category;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class NewWishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $asset_path = '/public/newui/';
        $wishlists = Wishlist::with('product')->where('user_id', Auth::user()->id)->limit(9)->get();
        return view('newui.view_wishlist', compact('asset_path', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
            if($wishlist == null){
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->id;
                $wishlist->save();
            }
            return view('frontend.partials.wishlist');
        }
        return 0;
    }

    public function remove(Request $request)
    {
        if(!$request->ajax()) {
            abort(404);
        }

        $wishlistId = Arr::get($request, 'id');

        $wishlist = Wishlist::find($wishlistId);
        $isEmptyWishlist = false;

        if($wishlist!=null){
            if(Wishlist::destroy($wishlistId)){
                if(count(Auth::user()->wishlists()->get()) == 0) {
                    $isEmptyWishlist = true;
                }
                return response()->json([
                   'isEmptyWishlist' => $isEmptyWishlist
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
