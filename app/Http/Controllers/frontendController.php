<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $trending_products = Product::where('trending', '1')->take(10)->get();
        return view('frontend.index', compact('trending_products'));
    }
}
