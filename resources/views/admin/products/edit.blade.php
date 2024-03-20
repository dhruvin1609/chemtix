@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('products.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form name="updateProduct" id="updateProduct" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" value="{{$product->title}}" class="form-control" placeholder="Title">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                <p></p>
                                <p>current image</p>
                                <img class="img-fluid" height="200" width="200" src="{{env('APP_URL').'/images/product/'.$product->image}}" alt="">
                              </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote">{{$product->description}}</textarea>	
                                <p></p>
                                

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Product Category</option>
                                    @foreach ($category as $item)
                                    <option {{($product->category_id == $item->id) ? 'selected' : ''}} value="{{$item->id}}" class="form-control">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="product_code">Product Code</label>
                                <input type="text" name="product_code" id="product_code" class="form-control" value="{{$product->product_code}}" placeholder="Product Code">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="chemical_name">Chemical Name</label>
                                <input type="text" name="chemical_name" id="chemical_name" class="form-control" value="{{$product->chemical_name}}" placeholder="Chemical Name">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="synonyme">Synonyme</label>
                                <input type="text" name="synonyme" id="synonyme" class="form-control" value="{{$product->synonyme}}" placeholder="Synonyme">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="cas_number">CAS number</label>
                                <input type="text" name="cas_number" id="cas_number" class="form-control" value="{{$product->cas_number}}" placeholder="CAS">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="hsn_code">HSN Code</label>
                                <input type="text" name="hsn_code" id="hsn_code" class="form-control" value="{{$product->hsn_code}}" placeholder="HSN code">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="molecular_formula">Molecular Formula</label>
                                <input type="text" name="molecular_formula" id="molecular_formula" value="{{$product->molecular_formula}}"  class="form-control" placeholder="Molecular Formula">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="molecular_weight">Molecular Weight</label>
                                <input type="text" name="molecular_weight" id="molecular_weight" value="{{$product->molecular_weight}}" class="form-control" placeholder="Molecular Weight">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="specification">Specification</label>
                                <input type="text" name="specification" id="specification" value="{{$product->specification}}" class="form-control" placeholder="Specification">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="packing">Packing</label>
                                <input type="text" name="packing" id="packing" value="{{$product->packing}}" class="form-control" placeholder="Packing">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="availability">Availability</label>
                                <input type="text" name="availability" id="availability" value="{{$product->availability}}" class="form-control" placeholder="Availability">	
                                <p></p>
                            </div>
                        </div>
                        						
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('products.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#updateProduct').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("products.update",$product->id)}}',
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

                    toastr.success('Product Updated successfully');
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