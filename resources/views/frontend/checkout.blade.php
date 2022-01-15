@extends('layouts.frontend')

@section('title', 'Checkout')

@section('custom-css')
    <style>
        .item-name{
            display: list-item;          
            list-style-type: disc;       
            list-style-position: outside;
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
            cursor: pointer !important;
            user-select: none;
        }
    </style>
    
@endsection

@section('content')
    <section class="links container">
        @include('layouts.inc.breadcrumb')
    </section>
    
    <section class="cart py-1">

        <div class="container">
            <div class="row">
                <div class="col-md-7 my-1">
                    <div class="card shadow-sm user-info">
                        <div class="card-body">
                            <h4 class="text-muted">Billing Details</h4>
                                                    
                        <form method="POST">
                            <div class="row my-2 mt-4">
                                <div class="col-md-6 form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" id="firstname" value="{{Auth::user()->name}}" required>
                                </div>
            
                                <div class="col-md-6 form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                                </div>
                            </div>
            
            
                            <div class="form-group my-2">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" required>
                            </div>

                            <div class="form-group my-2">
                                    <label for="pNumber">Phone Number</label>
                                    <input type="tel" class="form-control" id="pNumber" pattern="^03\d{2}-\d{7}$" placeholder="0300-1234567" required>
                            </div>
            
                            <div class="form-group my-2">
                                <label for="adress">Address</label>
                                <input type="text" class="form-control" id="adress" placeholder="1234 Main Street" required>
                            </div>
            
                            <div class="form-group my-2">
                                <label for="address2">Address 2
                                    <span class="text-muted">(Optional)</span>
                                </label>
                                <input type="text" class="form-control" id="adress2" placeholder="Flat No">
                            </div>
            
                            <div class="row my-2">
                                <div class="col-md-4 form-group my-2">
                                    <label for="country">Country</label>
                                    <select type="text" class="form-control" id="country">
                                        <option value>Pakistan</option>
                                    </select>
                                </div>
            
                                <div class="col-md-4 form-group my-2">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" placeholder="Islamabad" required>
                                </div>
                                
                                <div class="col-md-4 form-group my-2">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" class="form-control" id="city" placeholder="44000" required>
                                </div>
                            </div>
            
                            <hr>
            
                            <h4 class="mb-4">Payment</h4>

                            <div class="form-check my-2">
                                <input type="radio" class="form-check-input" id="cod" name="payment-method" checked required>
                                <label for="credit" class="form-check-label">Cash on Delivery</label>
                            </div>
                            
                            <div class="form-check my-2">
                                <input type="radio" class="form-check-input" id="credit" name="payment-method" disabled>
                                <label for="credit" class="form-check-label">Credit Card</label>
                            </div>
            
                            <div class="form-check my-2">
                                <input type="radio" class="form-check-input" id="debit" name="payment-method" disabled>
                                <label for="debit" class="form-check-label">Debit Card</label>
                            </div>
            
                                
                            
            
                                <hr class="mb-4">
                            
                                <a href="{{url('/cart')}}" class="btn btn-dark float-start">
                                    Back to Cart
                                </a>
                                <button class="btn btn-primary bt-lg btn-block float-end" type="submit">Confirm Order</button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 my-1">
                    <div class="card shadow-sm order-info">
                        <div class="card-body">
                            <h4 class="text-muted" >Order Details <span class="badge rounded-pill bg-danger float-end">{{count($cartItems)}}<span></h4>

                            <div class="container container-fluid cart-items mt-4">
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($cartItems as $item)
                                    <div class="row">
                                        <div class="col-7 item-name float-start">{{$item->product->name}}</div>
                                        <div class="col-2 item-quantity float-end text-muted">x{{$item->prod_qty}}</div>
                                        <div class="col-3 item-quantity float-end text-muted">Rs. {{number_format($item->product->price)}}</div>
                                        {{-- <div class="col-3 item-quantity float-end text-align-right text-muted">Rs. {{$item->prod_qty*$item->product->price}}</div> --}}
                                    </div>
                                    @php
                                        $totalPrice += $item->prod_qty*$item->product->price;
                                    @endphp
                                                                        
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="h5 float-end">
                                Total Bill: Rs. {{number_format($totalPrice)}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card shadow-sm product-data">
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead class="pt-4 pb-3">
                                    <tr class="text-center opacity-8">
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($cartItems as $item)
                                        <tr class="text-center align-middle cart-item">
                                            <td>{{$item->product->name}}</td>
                                            <input type="hidden" class="item_prod_id" value="{{$item->prod_id}}">
                                            <td  style="min-width:120px">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text dcr-btn change-qty"> - </span>
                                                    <input type="number" class="form-control qty-input" value="{{$item->prod_qty}}" style="text-align:center;" disabled>
                                                    <span class="input-group-text inc-btn change-qty"> + </span>
                                                </div>
                                            </td>
                                            <td id="item-cost">Rs. {{$item->product->price*$item->prod_qty}}</td>
                                            <td><img src="{{asset('assets/uploads/product/'.$item->product->image)}}" alt="product img" style="height: 50px; width:50px; object-fit:contain;"></td>
                                            <td>
                                                 <button class="btn btn-danger removeBtn"  value="{{$item->prod_id}}" ><span class="fa fa-trash"></span> REMOVE</button>
                                            </td>
                                        </tr>
                                        @php
                                            $totalPrice += $item->product->price*$item->prod_qty;
                                        @endphp                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>                 
                </div>
                <div class="card-footer">
                        <h6>
                            Total Price: {{$totalPrice}}
                            <button class="float-end btn btn-dark text-white fw-bold">Proceed to Checkout</button>
                        </h6>
                </div>
            </div> --}}

        </div>
        
        
    </section>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            
            $('.inc-btn').click(function (e) { 
                e.preventDefault();

                

                var text_value = $(this).closest('.cart-item').find('.qty-input').val();
                var value = parseInt(text_value, 10);
                value = isNaN(value) ? 1 : value;
                if(value < 10){
                    value++;
                    $(this).closest('.cart-item').find('.qty-input').val(value);
                }                
            });

            $('.dcr-btn').click(function (e) { 
                e.preventDefault();

                

                var text_value = $(this).closest('.cart-item').find('.qty-input').val();
                var value = parseInt(text_value, 10);
                value = isNaN(value) ? 1 : value;
                if(value > 1){
                    value--;
                    $(this).closest('.cart-item').find('.qty-input').val(value);
                }                
            });

            $('.removeBtn').click(function(e) {
                var del_id = $(this).val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                Swal.fire({
                    icon: 'question',
                    title: 'Confirm to delete?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "cart/delete-item",
                                data: {
                                    'prod_id':del_id
                                },
                                success: function (response) {
                                    Swal.fire({
                                        icon: response.isError == 'true' ? 'warning' : 'success',
                                        title: 'Done',
                                        text: response.status
                                    }).then((result) => {
                                        window.location.reload();
                                    });
                                }
                            });
                        }
                });
                
            });

            $('.change-qty').click(function (e) { 
                e.preventDefault();
                var prod_qty = $(this).closest('.cart-item').find('.qty-input').val();
                var prod_id = $(this).closest('.cart-item').find('.item_prod_id').val();
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        type: "POST",
                        url: "cart/update",
                        data: {
                            'prod_id':prod_id,
                            'prod_qty':prod_qty,

                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                
            });
        });

        
    </script>
@endsection