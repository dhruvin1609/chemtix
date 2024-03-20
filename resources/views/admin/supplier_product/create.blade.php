@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Supplier Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ asset('csv/supplier_product_csv.csv') }}" class="btn btn-info">Download template</a>
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
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                        Upload Excel 
                    </button> 
                <a href="{{route('supplier_product.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createSupplierProductForm" id="createSupplierProductForm" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_product">Supplier Product</label>
                                <select name="product_id" id="product_id" class="form-control select2">
                                    <option value="">Select a product</option>
                                    @if (!empty($product))
                                    @foreach ($product as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                        
                                    @endif
                            </select>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cas_number">CAS Number</label>
                                <input type="text" readonly="true" name="cas_number" id="cas_number" class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_id">Supplier Name</label>
                                <select name="supplier_id" id="supplier_id" class="form-control select2">
                                    <option value="">Select Supplier Name</option>
                                    @if(!empty($supplier))                                    
                                    @foreach ($supplier as $item)
                                        <option value="{{$item->id}}">{{$item->supplier_name}}</option>
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
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('supplier_product.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#createSupplierProductForm').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("supplier_product.store")}}',
            type:'post',           
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Added successfully');
                    window.location.href = "{{route('supplier_product.list')}}";

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

      $('#uploadCSV').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("supplier_product.import")}}',
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