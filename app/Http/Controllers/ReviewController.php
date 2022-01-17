<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    function add($id){
        $product = Product::where('id',$id)->where('status',1)->first();

        if($product){
            $verifyPurchased = Order::where('orders.user_id', Auth::id())->join('orders_items', 'orders.id', 'orders_items.order_id')->where('orders_items.prod_id',$product->id)->get();
            if(count($verifyPurchased)>0){
                return view('frontend.reviews', compact('product', 'verifyPurchased'));
            }else{
                return redirect()->back()->with('status', 'Please purchase to give review');
            }
        }else{
            return redirect()->back()->with('status', 'some error occured');
        }

    }

    function submit(Request $request, $id){
        $product = Product::where('id',$id)->where('status',1)->first();

        if($product){
            $verifyPurchased = Order::where('orders.user_id', Auth::id())->join('orders_items', 'orders.id', 'orders_items.order_id')->where('orders_items.prod_id',$product->id)->get();
            if(count($verifyPurchased)>0){
                $review = new Review();
                $review->user_id = Auth::id();
                $review->prod_id = $product->id;
                $review->user_review = $request->input('user_review');
                $review->save();

                return redirect('/shop/'.$product->category->slug.'/'.$product->id)->with('status','Review Added');
            }else{
                return redirect('/')->with('status', 'Please purchase to give review');
            }
        }else{
            return redirect('/')->with('status', 'some error occured');
        }
    }
}
