<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    function viewCart(){
        $cartItems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    function add(Request $request){

        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        $prod_check = Product::where('id',$prod_id)->first();
        if($prod_check){

            if(Cart::where('user_id',Auth::id())->where('prod_id',$prod_id)->exists()){
                return response()->json(['status' => $prod_check->name.'Product already in cart', 'isError' => 'true']);

            }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $prod_id;
                $cartItem->prod_qty = $prod_qty;
                $cartItem->user_id = Auth::id();
                $cartItem->save();

                return response()->json(['status' => $prod_check->name.' Added to cart']);                    
            }

        }else{
            return response()->json(['status' => 'Sorry, Product no longer available', 'isError' => 'true']);
        }
    }

    function update(Request $request){
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if(Cart::where('user_id',Auth::id())->where('prod_id',$prod_id)->exists()){
            $cartItem = Cart::where('user_id',Auth::id())->where('prod_id',$prod_id)->first();
            $cartItem->prod_qty = $prod_qty;
            $cartItem->update();
            return response()->json(['status' => $cartItem->product->name.' Updated the cart']);
        }else{
            return response()->json(['status' => 'Product not in cart', 'isError' => 'true']);
        }

    }

    function delete(Request $request){
        $prod_id = $request->input('prod_id');
        if(Cart::where('user_id',Auth::id())->where('prod_id',$prod_id)->exists()){
            $cartItem = Cart::where('user_id',Auth::id())->where('prod_id',$prod_id)->first();
            $cartItem->delete();
            return response()->json(['status' => $cartItem->product->name.' Removed from cart']);
        }else{
            return response()->json(['status' => 'Product not in cart', 'isError' => 'true']);
        }

    }

}
