<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        $trending_products = Product::where('trending', '1')->take(10)->get();
        return view('frontend.index', compact('trending_products'));
    }

    public function shop(){
        $trending_categories = Category::where('popular', '1')->take(10)->get();
        return view('frontend.shop', compact('trending_categories'));
    }

    public function viewCategory($slug){
        if (Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            
            $products = Product::where('cat_id', $category->id)->where('status','1')->get();
            
            return view('frontend.category', compact('products', 'category'));
        }else{
            return redirect('/')->with('status','Category dont exists');
        }
    }

    public function viewProduct($slug, $prod_id){
        if (Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            
            if(Product::where('id', $prod_id)->where('status','1')->exists()){
                $product = Product::where('id', $prod_id)->where('status','1')->first();
                return view('frontend.product', compact('product', 'category'));
            }
            return redirect('/')->with('status','Product not Available');
        }else{
            return redirect('/')->with('status','Category dont exists');
        }
    }
}
