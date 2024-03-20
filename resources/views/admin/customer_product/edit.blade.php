@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Customer Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('customer_product.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="updateCustomerProductForm" id="updateCustomerProductForm" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_product">Customer Product</label>
                                <select name="product_id" id="product_id" class="form-control select2">
                                    <option value="">Select a product</option>
                                    @if (!empty($product))
                                    @foreach ($product as $item)
                                    <option {{($customer_product->product_id == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                        
                                    @endif
                            </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cas_number">CAS Number</label>
                                <input type="text" value="{{$customer_product->cas_number}}" readonly="true" name="cas_number" id="cas_number" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_id">Customer Name</label>
                                <select name="supplier_id" id="supplier_id" class="form-control select2">
                                    <option value="">Select Customer Name</option>
                                    @if(!empty($customer))                                    
                                    @foreach ($customer as $item)
                                        <option {{($customer_product->supplier_id == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->customer_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p></p>
                            </div>
                        </div>
                       
                        						
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('customer_product.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#updateCustomerProductForm').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("customer_product.update",$customer_product->id)}}',
            type:'post',           
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Added successfully');
                    window.location.href = "{{route('customer_product.list')}}";

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['product_id']){
                    $('#product_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['product_id'])
                } else{
                    $('#product_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['cas_number']){
                    $('#cas_number').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['cas_number'])
                }else{
                    $('#cas_number').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_id']){
                    $('#supplier_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_id'])
                }else{
                    $('#supplier_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

      $("#product_id").change(function(){
        var product_id = $(this).val();
        $.ajax({
            url:'{{route("getCasNumber")}}',
            type:'get',
            data:{product_id: product_id},
            dataType:'json',
            success:function(res){
                $('#cas_number').val(res.casNumber);
            },
            error:function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
      })

       
        
</script>

@endsection