<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        

        return view('admin.product.index', compact('products'));
    }
    public function add(){
        $categories = Category::all();
        return view('admin.product.add', compact('categories'));
    }
    public function insert(Request $request){
        $product = new Product();
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
        }
        else{
            $product->image = "placeholder.png";
        }
        $product->cat_id = $request->input('cat_id');
        $product->name = $request->input('name');
        $product->short_desc = $request->input('short_desc');
        $product->desc = $request->input('desc');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_desc = $request->input('meta_desc');
        $product->meta_keywords = $request->input('meta_keywords');
        
        $product->save();

        return redirect('/products')->with('status', 'Product Added Successfully');
    }

}
