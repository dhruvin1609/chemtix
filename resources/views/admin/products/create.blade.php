@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('products.downloadTemplate') }}" class="btn btn-info">Download template</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                    Upload Excel 
                </button>
                <a href="{{route('products.list')}}" class="btn btn-primary">Back</a>
            </div>
            
        </div>
    </div>
    <!-- /.container-fluid -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <form id="uploadCSV">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Upload Excel/CSV</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <label for="file" class="text-left">Upload CSV File</label>
                <div class="form-group">  
                   <input type="file" name="file" id="file" class="form-control">
                   <p></p>
                </div> 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </form>
    </div>
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
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                <p></p>
                              </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote"></textarea>	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Product Category</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}" class="form-control">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Product Code">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="chemical_name">Chemical Name</label>
                                <input type="text" name="chemical_name" id="chemical_name" class="form-control" placeholder="Chemical Name">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="synonyme">Synonyme</label>
                                <input type="text" name="synonyme" id="synonyme" class="form-control" placeholder="Synonyme">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="cas_number">CAS number</label>
                                <input type="text" name="cas_number" id="cas_number" class="form-control" placeholder="CAS">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="hsn_code">HSN Code</label>
                                <input type="text" name="hsn_code" id="hsn_code" class="form-control" placeholder="HSN code">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="molecular_formula">Molecular Formula</label>
                                <input type="text" name="molecular_formula" id="molecular_formula" class="form-control" placeholder="Molecular Formula">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="molecular_weight">Molecular Weight</label>
                                <input type="text" name="molecular_weight" id="molecular_weight" class="form-control" placeholder="Molecular Weight">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="specification">Specification</label>
                                <input type="text" name="specification" id="specification" class="form-control" placeholder="Specification">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="packing">Packing</label>
                                <input type="text" name="packing" id="packing" class="form-control" placeholder="Packing">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="availability">Availability</label>
                                <input type="text" name="availability" id="availability" class="form-control" placeholder="Availability">	
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
    });

    $('#uploadCSV').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("products.import")}}',
            type:'post',
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

                    toastr.success('Created successfully');
                    window.location.reload()

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['file']){
                    $('#file').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['file'])
                } else{
                    $('#file').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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