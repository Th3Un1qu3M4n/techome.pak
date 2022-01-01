@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h3>Edit Product <small class="text-muted"> #{{$product->id}} </small></h3> 
                </div>
                <div class="col-md-3 col-sm-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/products')}}"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp; Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{url('/edit-product/'.$product->id)}}" method="POST">
                @method('PUT')
                <div class="row">
                    
                    <div class="col-md-6 ">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label class="mx-3">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="slug" class="mx-3">Slug</label>
                            <input type="text" name="slug" id="slug"  class="form-control" value="{{$category->slug}}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="description" class="mx-3">Description</label>
                            <input name="description" id="description" class="form-control" value="{{$category->description}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-6">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status" {{$category->status == '1'? 'checked' : ''}} >
                        </div>
                        <div class="col-6">
                            <label for="popular">Popular</label>
                            <input type="checkbox" name="popular" id="popular" {{$category->popular == '1'? 'checked' : ''}}>
                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                    </div> --}}
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-title" class="mx-3">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"  class="form-control" value="{{$category->meta_title}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-keywords" class="mx-3">Meta Keywords</label>
                            <input name="meta_keywords" id="meta_keywords" class="form-control" value="{{$category->meta_keywords}}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-desc" class="mx-3">Meta Description</label>
                            <input name="meta_desc" id="meta_desc" rows="2" class="form-control" value="{{$category->meta_desc}}">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        
                        <div class="col-md-2 col-offset-2 mb-2">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="col-md-4 mb-2">
                            <img class="m-auto border rounded" src="{{asset('assets/uploads/category/'.$category->image)}}" alt="category-img" style="max-height:150px;">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
    
@endsection