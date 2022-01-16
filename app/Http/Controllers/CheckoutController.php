<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    function viewCheckout(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $item){
            if(!Product::where('id', $item->prod_id)->where('quantity','>=',$item->prod_qty)->exists()){
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                // print_r($cartItems);
                // echo $removeItem->product->name;
                // echo "<br>";
                // echo $removeItem->product->quantity;
                // echo "<br>";
                // echo $removeItem->prod_qty;
                // echo "<br>";
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        // print_r($cartItems);
        return view('frontend.checkout', compact('cartItems'));
    }
}
