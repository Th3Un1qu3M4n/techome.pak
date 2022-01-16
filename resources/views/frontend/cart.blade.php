@extends('layouts.frontend')

@section('title', 'Cart')

@section('custom-css')
    <style>
        .cart-item td{
            min-width:120px;
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
            <div class="card shadow-sm product-data">
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
                                            <input type="hidden" class="item_prod_qty" value="{{$item->product->quantity}}">
                                            <td  style="min-width:120px">
                                                @if ($item->product->quantity >= $item->prod_qty)
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text dcr-btn change-qty"> - </span>
                                                        <input type="number" class="form-control qty-input" value="{{$item->prod_qty}}" style="text-align:center;" disabled>
                                                        <span class="input-group-text inc-btn change-qty"> + </span>
                                                    </div>
                                                    @php
                                                        $totalPrice += $item->product->price*$item->prod_qty;
                                                    @endphp
                                                @else
                                                    Out of Stock  <br><small> available: {{$item->product->quantity}}</small>                                                
                                                @endif
                                            </td>
                                            <td id="item-cost">Rs. {{$item->product->price*$item->prod_qty}}</td>
                                            <td><img src="{{asset('assets/uploads/product/'.$item->product->image)}}" alt="product img" style="height: 50px; width:50px; object-fit:contain;"></td>
                                            <td>
                                                 <button class="btn btn-danger removeBtn"  value="{{$item->prod_id}}" ><span class="fa fa-trash"></span> REMOVE</button>
                                            </td>
                                        </tr>
                                                                                
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>                 
                </div>
                <div class="card-footer">
                        <h6>
                            Total Price: {{number_format($totalPrice)}}
                            <a href="{{url('/cart/checkout')}}">
                                <button class="float-end btn btn-dark text-white fw-bold" {{count($cartItems)<1 ? 'disabled': ''}}>Proceed to Checkout</button>
                            </a>
                        </h6>
                </div>
            </div>

        </div>
        
        
    </section>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            
            $('.inc-btn').click(function (e) { 
                e.preventDefault();

                

                var text_value = $(this).closest('.cart-item').find('.qty-input').val();
                var availableProducts = $(this).closest('.cart-item').find('.item_prod_qty').val();
                var value = parseInt(text_value, 10);
                value = isNaN(value) ? 1 : value;
                if(value < 10 && value < availableProducts){
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