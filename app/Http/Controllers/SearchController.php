<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function search(Request $request){
        $query = $request->get('term');
        $products=Product::where('name','LIKE','%'.$query."%")->where('status','1')->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'value' => $product->name,
                'id' => $product->id
            ];
        }

        if(count($data)){
            return $data;
        }else{
            return ['value'=>'No Result Found', 'id'=>''];
        }
    }
    public function searching(Request $request){
        $query = $request->get('seach_product');
        $products=Product::where('name','LIKE','%'.$query."%")->where('status','1')->get();

        return view('frontend.search', compact('products', 'query'));

    }
}

    