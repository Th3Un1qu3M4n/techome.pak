<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    //
    function index(){
        
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders', compact('orders'));
    }
}
