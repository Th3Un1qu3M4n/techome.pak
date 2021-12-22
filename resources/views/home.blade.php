@extends('master')
@section('title','Home Page')

@section('custom-style')
    <style>
        .section-products{
            margin-top: 2em;
            margin-bottom: 2em;
        }
    </style>
@endsection

@section('content')
    
<section class="section-products">
    <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="card">
                        <img src="{{$product->gallery}}" alt="{{$product->category}}" style="width:100%; height:250px;">
                        <h5>{{$product->name}}</h5>
                        <p class="price">Rs.{{$product->price}}</p>
                        <p class="card-description">{{$product->description}}</p>
                        <p><button>Add to Cart</button></p>
                    </div> 
                @endforeach
                                    
            </div>
    </div>
</section>
      
@endsection