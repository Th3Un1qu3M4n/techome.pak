<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){    
        return view('admin.product.index');
    }

    public function getProducts(){
        $products = Product::all();
        $categories = Category::all();
        
        return response()->json([
                'status'=>200,
                'products'=>$products,
                'categories'=>$categories,
        ]);
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

        return redirect('/dashboard/products')->with('status', 'Product Added Successfully');
    }

    public function edit($id){

        $product = Product::find($id);
        $categories = Category::all();
        
        // return response()->json([
        //         'status'=>200,
        //         'product'=>$product,
        //         'categories'=>$categories,
        // ]);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        
        if ($request->hasFile('image')){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path) && $product->image != 'placeholder.png'){
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().".".$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
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
        
        $product->update();
        return redirect('/dashboard/products')->with('status', 'Product Updated Successfully!');
        // return response()->json([
        //     'status'=>200,
        //     'message'=>"Product updated successfully",
        // ]);   

    }

    public function delete($id){
        $product = Product::find($id);
        if($product->image != 'placeholder.png'){
            $path = 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return response()->json([
            'status'=>202,
            'message'=>"Product Deleted successfully",
        ]);
           
        
    }

}
