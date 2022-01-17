@extends('layouts.admin')

@section('content')
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10 col-7">
                    <h2>Orders Page</h2>
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
              <h6 class="text-white ps-3">Orders Table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="pt-4 pb-3">
                        <tr class="text-center opacity-8">
                            <th>Tracking #</th>
                            <th>Order Date</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="text-center">
                                <td >{{$order->trackingid}}</td>
                                <td>{{date('d-m-Y', strtotime($order->created_at))}}</td>
                                <td>Rs. {{$order->totalprice}}</td>
                                <td>
                                    @if ($order->status == '0')
                                        <label class="badge bg-info">processing</label>
                                    @elseif ($order->status == '1')
                                        <label class="badge bg-primary">en route</label>
                                        
                                    @else
                                        <label class="badge bg-success">delivered</label>
                                        
                                    @endif
                                </td>
                                <td><a class="btn btn-primary" href="{{url('/dashboard/orders/edit-order/'.$order->id)}}">UPDATE</a> <a class="btn btn-danger" href="{{url('/dashboard/orders/delete-order/'.$order->id)}}">DELETE</a></td>
                            </tr>                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection

@section('scripts')

<script>
    
    var editBaseLink = "{{url('/dashboard/orders/edit-orders/')}}";
    function extractContent(s) {
        var span = document.createElement('span');
        span.innerHTML = s;
        return span.textContent || span.innerText;
    };

    function getAllProducts(){
        $('tbody').html("");
        $.ajax({
            type: "get",
            url: "/dashboard/products/getOrders",
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

    getAllOrders();
    $(document).on('click', '.editBtn', function(e) {
        var prod_id = $(this).val();
        
        window.open(editBaseLink+"/"+prod_id, '_self');
    });


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
