<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
        $order = new Order();
        $time = time();

        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->pnumber = $request->input('pnumber');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->postcode = $request->input('postcode');
        $order->trackingid = 'techome-'.$time;
        $order->save();

        

        $cartItems = Cart::where('user_id', Auth::id())->get();

        foreach($cartItems as $item){
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->product->price,
            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->quantity = $prod->quantity-$item->prod_qty;
            $prod->update();
        }

        Cart::destroy($cartItems);

        return redirect('/')->with('status', 'Order Placed! Tracking id: '.$order->trackingid);
    }
}
