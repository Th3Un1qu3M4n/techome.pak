@extends('layouts.frontend')

@section('title', 'Shop')

@section('custom-css')
    <style>
        .card img{
            height: 40vh;
            object-fit: contain;
            width: 100%;
        }
        .card-body {
            border-top: 2px solid rgba(207, 207, 207,0.5);
        }
        .short_desc{
            min-height: 10vh;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
    
@endsection

@section('content')
    <section class="links container">
        @include('layouts.inc.breadcrumb')
    </section>
    
    <section class="product py-1">

        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2>
                                 {{$product->name}}
                                 @if ($product->trending == '1')
                                    <label class="float-end badge bg-danger">Trending</label>
                                @endif
                            </h2>
                            
                            <hr>
                            <label class="fw-bold">Price: Rs. {{$product->price}}</label>
                            <p class="short_desc">{{$product->short_desc}}</p>
                            <hr>
                            @if ($product->quantity > 0)
                                <label class="badge bg-success">In Stock</label>
                            @else
                                <label class="badge bg-danger">Out of Stock</label>
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-2 ">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">+</span>
                                        <input type="number" class="form-control" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <span class="input-group-text">-</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-danger">Add to card</button>
                                </div>
                            </div>
                                
                              

                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="card mt-3">
                <h5 class="card-header">
                    Product Description
                </h5>
                <div class="card-body">
                    {{$product->desc}}
                    

                </div>
            </div>
        </div>
        
        {{-- <div class="container">
            <h2 class="py-2"> {{$category->name}}</h2>
            <div class="row">
                
                    
                        <div class="product-container  col-12">
                            <div class="card m-2">
                                <a  class="text-reset text-decoration-none" href="{{url('shop/'.$category->slug.'/'.$product->id)}}">
                                <div class="card-body mt-2">
                                    
                                    <h5>{{$product->name}}</h5>
                                    <span>{{$product->short_desc}}</span>
                                    <div class="price">Rs.{{$product->price}}</div>
                                    
                                </div>
                                </a>
                            </div>
                        </div>
                        
                    
                        
                    
                    
                
                
            </div>

        </div> --}}
    </section>
@endsection

@section('custom-scripts')
    <script>
        
    </script>
@endsection