<?php

namespace App\Http\Controllers;

use App\Art;
use App\Purchase;
use App\User;
use App\Users;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function order(Request $request)
    {
        if (session('user')) {
            $art = Art::find($request->id);

            return view('purchase.order', compact('art'));
        } else {
            return redirect()->back();
        }

    }

    public function checkout(Request $request)
    {
        if (session('user')) {
            $art = Art::find($request->art_id);
            $user = Users::find($request->user_id);


            return view('purchase.checkout', compact(['art', 'user']));
        } else {
            return redirect()->back();
        }

    }

    public function processing(Request $request)
    {
        if (session('user')) {

            $purchase['user_id'] = $request->user_id;
            $purchase['art_id'] = $request->art_id;

            Purchase::create($purchase);
            return redirect('confirmed');
        } else {
            return redirect()->back();
        }

    }
    public function confirmed()
    {
        if (session('user')) {


            return view('purchase.confirmed');
        } else {
            return redirect()->back();
        }

    }
}
