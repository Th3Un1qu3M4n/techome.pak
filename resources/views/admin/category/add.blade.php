@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h3>Add Category</h3>
                </div>
                <div class="col-md-3 col-sm-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/dashboard/categories')}}"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp; Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{url('/dashboard/categories/insert-category')}}" method="post">
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        {{-- <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required> --}}
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug"  class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3">
                            <label for="description" class="form-label">Description</label>
                            <input name="description" id="description" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-6">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status" >
                        </div>
                        <div class="col-6">
                            <label for="popular">Popular</label>
                            <input type="checkbox" name="popular" id="popular">
                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                    </div> --}}
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="meta-title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"  class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label for="meta-keywords" class="form-label">Meta Keywords</label>
                            <input name="meta_keywords" id="meta_keywords" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="input-group input-group-outline my-3">
                            <label for="meta-desc" class="form-label">Meta Description</label>
                            <input name="meta_desc" id="meta_desc" rows="2" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        {{-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> --}}
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                    @csrf
                </div>
            </form>
        </div>
    </div>
    
@endsection