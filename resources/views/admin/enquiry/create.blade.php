@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Enquiry</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('enquiry.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createProduct" id="createProduct" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input name="phone" id="phone" class="form-control" placeholder="Phone">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input name="email" id="email" class="form-control" placeholder="Email">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Product</label>
                                <select name="product_id" id="product_id" class="form-control">
                                    <option value="">Select Product</option>
                                    @foreach ($product as $item)
                                    <option value="{{$item->id}}" class="form-control">{{$item->title}}</option>
                                    @endforeach
                                </select>
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="country">Country</label>
                                <input type="text" name="country" id="country" class="form-control" placeholder="Country">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Company Name">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="note">Note</label>
                                <input type="text" name="note" id="note" class="form-control" placeholder="Note">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="cas_number">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="pending">Pending</option>
                                    <option value="processing">Processing</option>
                                    <option value="quotation">Quotation</option>
                                    <option value="closed">Closed</option>
                                </select>	
                                <p></p>
                            </div>
                        </div>
                        
                       
                        						
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
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
            url:'{{route("enquiry.store")}}',
            type:'post',
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Product Added successfully');
                    window.location.href = "{{route('enquiry.index')}}";

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
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

      

       
        
</script>

@endsection