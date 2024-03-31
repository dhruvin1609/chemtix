@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{{ route('search.supplier.product',$product_id) }}}" id="view_supplier" class="btn btn-primary">View Supplier</a>
                    <a href="{{{ route('search.customer.product',$product_id) }}}" class="btn btn-success">View Customer</a>
                    <a href="" class="btn btn-primary">back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" class="form-control" disabled value="{{ $product_data->title }}" name="" id="" aria-describedby="helpId" />
                    </div>

                    <div class="mb-3">
                        <p>Image</p>
                        <img src="{{env('APP_URL').'/images/product/'.$product_data->image}}" alt="" class="img-fluid">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="" class="form-control" id="" cols="30" readonly rows="10">{!! $product_data->description !!}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" disabled value="{{ $product_data->getCategory->name }}" name="" id="" aria-describedby="helpId" />

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Chemical Name</label>
                        <input type="text" class="form-control" disabled value="{{ $product_data->chemical_name }}" name="" id="" aria-describedby="helpId" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CAS Number</label>
                        <input type="text" class="form-control" disabled value="{{ $product_data->cas_number }}" name="" id="" aria-describedby="helpId" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">HSN Code</label>
                        <input type="text" class="form-control" disabled value="{{ $product_data->hsn_code }}" name="" id="" aria-describedby="helpId" />
                    </div>

                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection

@section('customJs')

<script>
    
      $('#createProduct').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("products.store")}}',
            enctype: 'multipart/form-data',
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Product Added successfully');
                    window.location.href = "{{route('products.list')}}";

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['title']){
                    $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['title'])
                } else{
                    $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['description']){
                    $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description'])
                }else{
                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['image']){
                    $('#formFile').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['image'])
                }else{
                    $('#formFile').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['category_id']){
                    $('#category_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['category_id'])
                }else{
                    $('#category_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['product_code']){
                    $('#product_code').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['product_code'])
                }else{
                    $('#product_code').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['cas_number']){
                    $('#cas_number').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['cas_number'])
                }else{
                    $('#cas_number').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['hsn_code']){
                    $('#hsn_code').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['hsn_code'])
                }else{
                    $('#hsn_code').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })
</script>
@endsection
