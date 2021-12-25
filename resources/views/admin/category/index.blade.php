@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h3>Category Page</h3>
                </div>
                <div class="col-md-3 col-sm-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/add-category')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp; New Category</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                        <thead class="bg-gradient-primary pt-4 pb-3">
                            <tr class="text-white">
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="category img" style="height: 150px; width:150px;"></td>
                                <td><button class="btn btn-primary">EDIT</button> <button class="btn btn-danger">DELETE</button></td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection