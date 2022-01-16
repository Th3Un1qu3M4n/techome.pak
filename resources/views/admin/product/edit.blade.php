@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-7">
                    <h3>Edit Product <small class="text-muted"> #{{$product->id}} </small></h3> 
                </div>
                <div class="col-md-3 col-sm-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/dashboard/products')}}"><i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp; Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{url('/dashboard/products/edit-product/'.$product->id)}}" method="POST">
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
                            <select id="category" name="cat_id" class="form-control" autocomplete="off">
                                <option value=""> Select a Category </option>
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}" {{$item->id == $product->cat_id ? 'selected=selected' : ''}}> {{$item->name}} </option>                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="short_desc" class="mx-3">Short Description</label>
                            <input name="short_desc" id="short_desc" class="form-control" value="{{$product->short_desc}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="desc" class="mx-3">Long Description</label>
                            <input name="desc" id="desc" class="form-control" value="{{$product->desc}}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-6">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status" {{$product->status == '1'? 'checked' : ''}} >
                        </div>
                        <div class="col-6">
                            <label for="popular">Trending</label>
                            <input type="checkbox" name="trending" id="tredning" {{$product->trending == '1'? 'checked' : ''}}>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="price" class="mx-2">Price</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="quantity" class="mx-2">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{$product->quantity}}" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                    </div> --}}
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-title" class="mx-3">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"  class="form-control" value="{{$product->meta_title}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-keywords" class="mx-3">Meta Keywords</label>
                            <input name="meta_keywords" id="meta_keywords" class="form-control" value="{{$product->meta_keywords}}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-desc" class="mx-3">Meta Description</label>
                            <input name="meta_desc" id="meta_desc" rows="2" class="form-control" value="{{$product->meta_desc}}">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        
                        <div class="col-md-2 col-offset-2 mb-2">
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="col-md-4 mb-2">
                            <img class="m-auto border rounded" src="{{asset('assets/uploads/product/'.$product->image)}}" alt="product-img" style="max-height:150px;">
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

@section('scripts')
    <script>
        tinymce.init({
        selector: '#short_desc', 
        plugins: 'code lists',
        toolbar: false,
        menubar: false,
        width: '100%',
        min_height: '10'
        });

        tinymce.init({
            selector: '#desc',
            plugins: 'code lists autoresize',
            toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
            width: '100%',
            min_height: '400'
        });

        // $(document).ready(function () {

        //     var shortDesc = tinyMCE.get('short_desc');
        //     var desc = tinyMCE.get('desc');

        //     var shortData = "{{$product->short_desc}}";
        //     var Data = '{{$product->desc}}';
        //     shortDesc.setProgressState(1);
        //     desc.setProgressState(1); 
        //     window.setTimeout(function() {
        //         shortDesc.setProgressState(0); 
        //         desc.setProgressState(0); 
        //         shortDesc.setContent(shortData);
        //         desc.setContent(Data);
        //     }, 1000);
            
        // });

    </script>
    
@endsection