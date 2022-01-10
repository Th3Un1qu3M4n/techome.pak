@extends('layouts.admin')

@section('content')
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10 col-7">
                    <h2>Category Page</h2>
                </div>
                <div class="col-sm-2 col-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/dashboard/categories/add-category')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp; New</a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="card">
        <div class="card-header p-0 position-relative mt-n4 mx-5 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white ps-3">Categories Table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="pt-4 pb-3">
                        <tr class="text-center opacity-8">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="text-center">
                                <td >{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="category img" style="height: 150px; width:150px;"></td>
                                <td><a class="btn btn-primary" href="{{url('/dashboard/categories/edit-category/'.$category->id)}}">EDIT</a> <a class="btn btn-danger" href="{{url('/dashboard/categories/delete-category/'.$category->id)}}">DELETE</a></td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection