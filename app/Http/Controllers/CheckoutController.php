<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    function viewCheckout(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        // print_r($cartItems);
        return view('frontend.checkout', compact('cartItems'));
    }
}
