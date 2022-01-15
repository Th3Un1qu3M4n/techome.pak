@extends('layouts.admin')

@section('content')
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10 col-7">
                    <h2>Products Page</h2>
                </div>
                <div class="col-sm-2 col-5">
                    <a class="btn bg-gradient-dark mb-0" href="{{url('/dashboard/products/add-product')}}"><i class="material-icons text-sm">add</i>&nbsp;&nbsp; New</a>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
  <!-- Modal -->
  <div class="modal fade" id="editProdModal" tabindex="-1" role="dialog" aria-labelledby="editProdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="editProdModalLabel">Edit Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="editProductForm" enctype="multipart/form-data" action="{{url('/dashboard/products/edit-product/')}}" method="POST">
        <div class="modal-body">
                @method('PUT')
                <div class="row">
                    
                    <div class="col-md-6 ">
                        <input type="hidden" id="editId">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label class="mx-3">Name</label>
                            <input type="text" name="name" id="editName" class="form-control" value="" required>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <select id="editCategory" name="cat_id" class="form-control" autocomplete="off">
                                <option value=""> Select a Category </option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="short_desc" class="mx-3">Short Description</label>
                            <input name="editshort_desc" id="editShort_desc" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="desc" class="mx-3">Long Description</label>
                            <input name="editdesc" id="editDesc" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-6">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="editStatus">
                        </div>
                        <div class="col-6">
                            <label for="popular">Trending</label>
                            <input type="checkbox" name="trending" id="editTrending">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="price" class="mx-2">Price</label>
                            <input type="number" name="price" id="editPrice" class="form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="quantity" class="mx-2">Quantity</label>
                            <input type="number" name="quantity" id="editQuantity" class="form-control" value="" required>
                        </div>
                    </div>
                    {{-- <div class="col-md-6 form-group">
                    </div> --}}
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-title" class="mx-3">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title"  class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-keywords" class="mx-3">Meta Keywords</label>
                            <input name="meta_keywords" id="meta_keywords" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <div class="input-group input-group-outline my-3 align-items-center">
                            <label for="meta-desc" class="mx-3">Meta Description</label>
                            <input name="meta_desc" id="meta_desc" rows="2" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        
                        <div class="col-md-4 col-offset-2 mb-2">
                            <input type="file" name="image" id="editImage" class="form-control">
                        </div>
                        <div class="col-md-6 mb-2">
                            <img class="m-auto border rounded" src="" alt="editProduct-img" id="editProduct-img" style="max-height:150px;">
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                    @csrf
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Submit</button>
                {{-- <button type="button" class="btn bg-gradient-primary updateChangesBtn">Save changes</button> --}}
            </div>
        </form>
      </div>
    </div>
  </div>
  
  

@endsection

@section('scripts')

<script>
    
    var img_path = "{{asset('assets/uploads/product/')}}";
    var editBaseLink = "{{url('/dashboard/products/edit-product/')}}";
    function extractContent(s) {
        var span = document.createElement('span');
        span.innerHTML = s;
        return span.textContent || span.innerText;
    };

    function getAllProducts(){
        $('tbody').html("");
        $.ajax({
            type: "get",
            url: "/dashboard/products/getProducts",
            dataType: "json",
            success: function (response) {
                
                $.each(response.products, function(key, product){
                    var cat_name = 'not found';
                    $.each(response.categories, function(key, category){
                        if (category.id == product.cat_id){
                            cat_name = category.name;
                            
                        }
                    });
                    
                    $('tbody').append('<tr class="text-center">\
                                <td >'+product.id+'</td>\
                                <td>'+product.name+'</td>\
                                <td>'+cat_name+'</td>\
                                <td>'+extractContent(product.desc).substring(0,30)+'...</td>\
                                <td><img src="'+img_path+'/'+product.image+'" alt="product img" style="height: 150px; width:150px; object-fit:contain;"></td>\
                                <td><button class="btn btn-primary editBtn" value="'+product.id+'" >EDIT</button>\
                                     <button class="btn btn-danger deleteBtn"  value="'+product.id+'" >DELETE</button>\
                                </td>\
                            </tr>'
                    )
                    
                })
                $.each(response.categories, function(key, cat){
                    $('#editCategory').append('<option value="'+cat.id+'"> '+cat.name+' </option>');
                });
                
            }
        });
    }

    getAllProducts();
    $(document).on('click', '.editBtn', function(e) {
        var prod_id = $(this).val();
        
        window.open(editBaseLink+"/"+prod_id, '_self');
    });

    // $(document).on('click', '.editBtn', function(e) {
    //     e.preventDefault();
    //     var prod_id = $(this).val();

    //     tinymce.init({
    //     selector: '#editShort_desc', 
    //     plugins: 'code lists',
    //     toolbar: false,
    //     menubar: false,
    //     width: '100%',
    //     height: '100',
    //     // setup: function (editor) {
    //     //     editor.on('change', function () {
    //     //         editor.save();
    //     //     });
    //     // }
    //     });

    //     tinymce.init({
    //         selector: '#editDesc',
    //         plugins: 'code lists',
    //         toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    //         width: '100%',
    //         height: '300',
    //         // setup: function (editor) {
    //         //     editor.on('change', function () {
    //         //         editor.save();
    //         //     });
    //         // }
    //     });
        
        
    //     $('#editProdModal').modal('show');
    //     $.ajax({
    //         type: "get",
    //         url: "/dashboard/products/edit-product/"+prod_id,
    //         success: function (response) {
    //             var prod = response.product;
    //             var shortDesc = tinyMCE.get('editShort_desc');
    //             var desc = tinyMCE.get('editDesc');

    
    //             shortDesc.setProgressState(1);
    //             desc.setProgressState(1); 
    //             window.setTimeout(function() {
    //                 shortDesc.setProgressState(0); 
    //                 desc.setProgressState(0); 
    //                 shortDesc.setContent(prod.short_desc);
    //                 desc.setContent(prod.desc);
    //             }, 1000);

    //             $('#editId').val(prod.id);
    //             $('#editName').val(prod.name);
    //             $("#editCategory").val(prod.cat_id);
    //             // $('#editShort_desc').val(prod.short_desc);
    //             // $('#editDesc').val(prod.desc);
    //             if(prod.status == '1'){
    //                 $('#editStatus').prop('checked', true);
    //             }
    //             if(prod.trending == '1'){
    //                 $('#editTrending').prop('checked', true);
    //             }
    //             $('#editPrice').val(prod.price);
    //             $('#editQuantity').val(prod.quantity);
    //             $('#meta_title').val(prod.meta_title);
    //             $('#meta_keywords').val(prod.meta_keywords);
    //             $('#meta_desc').val(prod.meta_desc);

    //             $('#editImage').val("");
                
    //             $('#editProduct-img').attr('src',img_path+'/'+prod.image);
                
    //         }
    //     });
    // });
    
    // $(document).on('submit', '#editProductForm', function(e) {
    //     // $('#textarea_id').tinymce().save();
    //     // alert("asfaf")
    //     e.preventDefault();
    //     // var shortData;
    //     // var Data;

    //     // window.onload = function(){
    //     var shortDesc = tinyMCE.get('editShort_desc');
    //     var desc = tinyMCE.get('editDesc');

    //     var shortData = shortDesc.getContent();
    //     var Data = desc.getContent();
    //     // }
    //     // // console.log(shortData);


    //     // // $('#editShort_desc').tinymce().save();
    //     // var editId = $('#editId').val();
    //     // console.log(editId);
    //     let editedformData = new FormData($('#editProductForm')[0]);

    //     // editedformData.set('short_desc', shortData);
    //     // editedformData.set('desc', Data);
    //     // console.log(editedformData);




    //     $.ajax({
    //         type: "POST",
    //         url: "/dashboard/products/edit-product/"+editId,
    //         data: editedformData,
    //         contentType: false,
    //         processData: false,
    //         success: function (response) {
                
    //             if(response.status == 200){
    //                 Swal.fire({
    //                     icon: 'success',
    //                     title: 'Done',
    //                     text: 'Updated!'
    //                 });
    //                 getAllProducts();
    //             }else{
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Failed',
    //                     text: 'Some Error Occured!'
    //                 });
    //             }
                

                
    //         }
    //     });
        
    //     $('#editProdModal').modal('hide');

        
    // });

    $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            var del_id = $(this).val();
            

            console.log(del_id);
            Swal.fire({
                icon: 'question',
                title: 'Confirm to delete?',
                showCancelButton: true,
                confirmButtonText: 'Delete'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "GET",
                            url: "/dashboard/products/delete-product/"+del_id,
                            success: function (response) {
                                // console.log(response);
                                // alert(response.status);
                                getAllProducts();
                                Swal.fire({
                                    icon: response.status == 204 ? 'warning' : 'success',
                                    title: 'Done',
                                    text: response.message
                                });
                                
                                
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                if(errorThrown == 'Unauthorized'){
                                    alert("Login as admin to delete");
                                }
                            }
                        });
                    }
            });

        });


</script>
    
@endsection
