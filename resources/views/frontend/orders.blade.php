@extends('layouts.frontend')

@section('title', 'My Orders')

@section('custom-css')
    <style>
        
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
                    {{-- <div class="row"> --}}
                        @foreach ($orders as $order)
                        <div class="card shadow-sm orders-data mb-5">
                            <div class="card-body">
                                <div class="row">
                                        <div class="col-md-12">
                                            <h2> 
                                                <input type="hidden" value="{{$order->id}}" class="item_id">
                                                Order No: <span class="text-muted fs-6">#{{$order->trackingid}}</span>
                                                @if ($order->status == '0')
                                                    <label class="float-end badge bg-info">processing</label>
                                                @elseif ($order->status == '1')
                                                    <label class="float-end badge bg-primary">en route</label>
                                                    
                                                @else
                                                    <label class="float-end badge bg-success">delivered</label>
                                                    
                                                @endif
                                            </h2>
                                            
                                            <hr>
                                            <div class="col-sm-6">
                                                @foreach ($order->orderitems as $item)
                                                    <div class="row">
                                                        <div class="col-7 item-name float-start">{{$item->product->name}}</div>
                                                        <div class="col-2 item-quantity float-end text-muted">x{{$item->qty}}</div>
                                                        <div class="col-3 item-quantity float-end text-muted">Rs. {{number_format($item->product->price)}}</div>
                                                        {{-- <div class="col-3 item-quantity float-end text-align-right text-muted">Rs. {{$item->prod_qty*$item->product->price}}</div> --}}
                                                    </div>                                          
                                                @endforeach
                                            </div>
                                                                                        
                                        </div>
                                        
                                </div>
                                    
                                    
                            </div>
                            <div class="card-footer">
                                <label class="fw-bolder float-end lh-lg fs-5">Total Amount: Rs. {{number_format($order->totalprice)}}</label>
                            </div>
                        </div>
                        @endforeach
                        
                    {{-- </div> --}}

                    {{-- <div class="card">
                        <div class="card-body">
                            asfa
                        </div>
                        .card-footer
                    </div> --}}
                               
        </div>
        
        
    </section>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
        });
    </script>
@endsection