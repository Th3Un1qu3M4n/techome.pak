@extends('layouts.admin')
@php
    $status = array("Processing", "En route", "Delivered");
@endphp

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h3>Update Order <small class="text-muted"> #{{$order->id}} </small></h3> 
                </div>
                <div class="col-md-3 col-sm-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/dashboard/categories')}}"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp; Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('/dashboard/orders/edit-order/'.$order->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    
                    <div class="col-md-6 ">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label class="mx-3">First Name</label>
                            <input type="text" name="fname" id="name" class="form-control" value="{{$order->fname}}" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="lname" class="mx-3">Last Name</label>
                            <input type="text" name="lname" id="slug"  class="form-control" value="{{$order->lname}}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="description" class="mx-3">Email</label>
                            <input type="email" name="email" id="description" class="form-control" value="{{$order->email}}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="description" class="mx-3">Phone No.</label>
                            <input type="tel" name="pnumber" id="description" class="form-control" value="{{$order->pnumber}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="description" class="mx-3">Address 1</label>
                            <input type="text" name="address1" id="description" class="form-control" value="{{$order->address1}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="description" class="mx-3">Address 2</label>
                            <input type="text" name="address2" id="description" class="form-control" value="{{$order->address2}}" >
                        </div>
                    </div>

                    <div class="row my-2">
                        <div class="col-md-4  my-2">
                            <div class="input-group input-group-outline my-3 align-items-center">
                                <label for="country" class="mx-3">Country</label>
                                <select id="country" name="country" class="form-control" autocomplete="off">
                                    <option value="Pakistan" selected> Pakistan </option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-4 form-group my-2">
                            <div class="input-group input-group-outline my-3 align-items-center">
                                <label for="description" class="mx-3">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Islamabad" value="{{$order->city}}" required>
                            </div>
                        </div>

                        <div class="col-md-4 form-group my-2">
                            <div class="input-group input-group-outline my-3 align-items-center">
                                <label for="postcode" class="mx-3">Postcode</label>
                                <input type="text" name="postcode" class="form-control" id="postcode" placeholder="postcode" value="{{$order->postcode}}" required>
                            </div>
                        </div>                        
                    </div>  
                    <hr>
                    <div class="col-md-4 form-group my-2">
                        <label for="method" class="form-check-label">Payment Method</label><br>
                        <input type="radio" name="method" class="form-check-input" id="cod" name="payment-method" checked required>
                        <label for="method" class="form-check-label">Cash on Delivery</label>
                    </div>
                    
                    <div class="col-md-4  my-2">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="status" class="mx-3">Status</label>
                            <select id="status" name="status" class="form-control" autocomplete="off">
                                @for ($i = 0; $i < count($status); $i++)
                                    <option value="{{$i}}" {{$i==$order->status? 'selected': ''}} > {{$status[$i]}} </option>                                    
                                @endfor
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4 my-2">
                        <button type="submit" class="float-end btn btn-danger">Update</button>
                    </div>
                    
                </div>

                                               
                
            </form>

            <hr>
            <div class="col-sm-6">
                <h6>Purchased Items</h6>
                @foreach ($order->orderitems as $item)
                    <div class="row">
                        <div class="col-6 fw-bold item-name float-start">{{$item->product->name}}</div>
                        <div class="col-2 item-quantity float-end text-muted">x{{$item->qty}}</div>
                        <div class="col-3 item-price float-end text-muted">Rs. {{number_format($item->product->price)}}</div>
                        {{-- <div class="col-3 item-quantity float-end text-align-right text-muted">Rs. {{$item->prod_qty*$item->product->price}}</div> --}}
                    </div>                                          
                @endforeach
            </div>
        </div>
        <div class="card-footer">
            <label class="fw-bolder float-end fs-5">Total Amount: Rs. {{number_format($order->totalprice)}}</label>
        </div>
    </div>
    
@endsection