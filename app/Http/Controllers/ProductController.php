<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    function homepage(){
        $products = Product::all();
        return View('home',['products'=>$products]);
    }
}
