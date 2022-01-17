@extends('layouts.frontend')

@section('title', 'Write Review')

@section('custom-css')
    <style>

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
        @php
            $totalPrice = 0;
        @endphp
        <div class="container">
            <div class="card shadow-sm product-data">
                <form action="" method="post">
                    <div class="card-header">{{$product->name}}</div>
                    <div class="card-body">
                        <h3>Write Your Review:</h3>
                        @csrf
                        <input type="hidden" name="prod_id" id="prod_id">
                        <input type="text" class="form-control" id="user_review" name="user_review" placeholder="What you liked or disliked about the product" required>
                    </div>
                    <div class="card-footer">
                             <button type="submit" class="btn btn-danger">Submit review</button>                   
                    </div>
                </form>
            </div>

        </div>
        
        
    </section>
@endsection

@section('custom-scripts')
@endsection