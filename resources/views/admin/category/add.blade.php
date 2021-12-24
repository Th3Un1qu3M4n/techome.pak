@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Add Category Page
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{url('/insert-category')}}" method="post">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug"  class="form-control">
                    </div>
                    
                    <div class="col-md-12 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="row">
                        <div class="col-md-6">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status" >
                        </div>
                        <div class="col-md-6">
                            <label for="popular">Popular</label>
                            <input type="checkbox" name="popular" id="popular">
                        </div>
                    </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                    </div> --}}
                    <div class="col-md-6">
                        <label for="meta-title">Meta Title</label>
                        <input type="text" name="meta_title" id="meta_title"  class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="meta-keywords">Meta Keywords</label>
                        <textarea name="meta_keywords" id="meta_keywords" rows="1" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="meta-desc">Meta Description</label>
                        <textarea name="meta_desc" id="meta_desc" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
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