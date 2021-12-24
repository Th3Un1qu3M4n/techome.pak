@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            Add Category Page
        </div>
        <div class="card-body">
            <form action="{{url('/insert-category')}}" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug">
                    </div>
                    
                    <div class="col-md-6">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" id="status">
                    </div>
                    <div class="col-md-6">
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular" id="popular">
                    </div>
                    <div class="col-md-6">
                        <label for="meta-title">Meta Title</label>
                        <input type="text" name="meta-title" id="meta-title">
                    </div>
                    <div class="col-md-6">
                        <label for="meta-desc">Meta Description</label>
                        <textarea name="meta-desc" id="meta-desc" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="meta-keywords">Meta Keywords</label>
                        <textarea name="meta-keywords" id="meta-keywords" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    
@endsection