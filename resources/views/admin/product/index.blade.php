@extends('layouts.admin')

@section('content')
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10 col-7">
                    <h2>Products Page</h2>
                </div>
                <div class="col-sm-2 col-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/add-product')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp; New</a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-5 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white ps-3">Products Table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="pt-4 pb-3">
                        <tr class="text-center opacity-8">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="text-center">
                                <td >{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->short_desc}}</td>
                                <td><img src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product img" style="height: 150px; width:150px;"></td>
                                <td><a class="btn btn-primary" href="{{url('/edit-product/'.$product->id)}}">EDIT</a> <a class="btn btn-danger" href="{{url('/delete-product/'.$product->id)}}">DELETE</a></td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection