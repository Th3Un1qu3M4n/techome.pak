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

        .input-group-text{
            cursor: pointer;
            user-select: none;
        }
    </style>
    
@endsection

@section('content')
    <section class="links container">
        @include('layouts.inc.breadcrumb')
    </section>
    
    <section class="product py-1">

        <div class="container">
            <div class="card shadow-sm product-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="">
                        </div>
                        <div class="col-md-7">
                            <h2> 
                                <input type="hidden" value="{{$product->id}}" class="prod_id">
                                 {{$product->name}}
                                 @if ($product->trending == '1')
                                    <label class="float-end badge bg-danger">Trending</label>
                                @endif
                            </h2>
                            
                            <hr>
                            <label class="fw-bold">Price: Rs. {{$product->price}}</label>
                            <span class="short_desc">{!!$product->short_desc!!}</span>
                            <hr>
                            @if ($product->quantity > 0)
                                <label class="badge bg-success">In Stock</label>
                            @else
                                <label class="badge bg-danger">Out of Stock</label>
                            @endif
                            <div class="row mt-2">
                                <div class="col-sm-4 col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text dcr-btn"> - </span>
                                        <input type="number" class="form-control qty-input" value="1" style="text-align:center;" disabled>
                                        <span class="input-group-text inc-btn"> + </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <button class="btn btn-danger addToCart-btn">Add to card</button>
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
                    {!! $product->desc !!}
                    

                </div>
            </div>
        </div>
        
        
    </section>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {

            $('.addToCart-btn').click(function (e) { 
                e.preventDefault();

                var product_id =$(this).closest('.product-data').find('.prod_id').val();
                var product_qty =$(this).closest('.product-data').find('.qty-input').val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "/add-to-cart",
                    data: {
                        'prod_id':product_id,
                        'prod_qty':product_qty,
                    },
                    success: function (response) {
                        // console.log(response);
                        // alert(response.status);
                        Swal.fire({
                            icon: response.isError == 'true' ? 'warning' : 'success',
                            title: 'Done',
                            text: response.status
                        })
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        if(errorThrown == 'Unauthorized'){
                            alert("Login to add to cart");
                        }
                    }
                });
                
            });
            
            $('.inc-btn').click(function (e) { 
                e.preventDefault();

                

                var text_value = $('.qty-input').val();
                var value = parseInt(text_value, 10);
                value = isNaN(value) ? 1 : value;
                if(value < 10){
                    value++;
                    $('.qty-input').val(value);
                }                
            });

            $('.dcr-btn').click(function (e) { 
                e.preventDefault();

                

                var text_value = $('.qty-input').val();
                var value = parseInt(text_value, 10);
                value = isNaN(value) ? 1 : value;
                if(value > 1){
                    value--;
                    $('.qty-input').val(value);
                }                
            });

        });
        
    </script>
@endsection