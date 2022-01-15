<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

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

                return response()->json(['status' => $prod_check->name.' Added to card']);                    
            }

        }else{
            return response()->json(['status' => 'Sorry, Product no longer available', 'isError' => 'true']);
        }


    }
}
