<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    //

    function index(){
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    function edit($id){
        $order = Order::where('id',$id)->first();
        return view('admin.orders.edit', compact('order'));
    }

    function update(Request $request,$id){
        $order = Order::where('id',$id)->first();

        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->pnumber = $request->input('pnumber');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->country = $request->input('country');
        $order->city = $request->input('city');
        $order->postcode = $request->input('postcode');
        $order->status = $request->input('status');
        $order->update();

        return redirect('/dashboard/orders')->with('status', 'Order updated Successfully!');
    }
}
