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
            $prod = Product::where('id', $item->prod_id)->first();
            // echo "Product Quantity ".$prod->quantity." got ".$item->prod_qty."<br>";
            if($prod->quantity<$item->prod_qty){
            // if(!Product::where('id', $item->prod_id)->where('quantity','>=',$item->prod_qty)->exists()){
                
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        // print_r($cartItems);
        return view('frontend.checkout', compact('cartItems'));
    }
    function placeOrder(Request $request){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $item){
            $prod = Product::where('id', $item->prod_id)->first();
            // echo "Product Quantity ".$prod->quantity." got ".$item->prod_qty."<br>";
            if($prod->quantity<$item->prod_qty){
            // if(!Product::where('id', $item->prod_id)->where('quantity','>=',$item->prod_qty)->exists()){
                
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        // print_r($cartItems);
        return view('frontend.checkout', compact('cartItems'));
    }
}
