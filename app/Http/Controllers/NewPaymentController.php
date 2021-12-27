<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NewPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $payments = Payment::where('seller_id', Auth::user()->seller->id)->paginate(9);
        return view('frontend.new_customer.payment-history.index', compact('payments'));
    }

//    /**
//     * Display a listing of the resource.
//     *
//     * @return Application|Factory|View
//     */
//    public function payment_histories(Request $request)
//    {
//        $payments = Payment::orderBy('created_at', 'desc')->paginate(15);
//        return view('sellers.payment_histories', compact('payments'));
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return Application|Factory|RedirectResponse|View
//     */
//    public function show($id)
//    {
//        $payments = Payment::where('seller_id', decrypt($id))->orderBy('created_at', 'desc')->get();
//        if($payments->count() > 0){
//            return view('sellers.payment', compact('payments'));
//        }
//        flash(translate('No payment history available for this seller'))->warning();
//        return back();
//    }

}