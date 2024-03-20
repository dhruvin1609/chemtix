@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Search Supplier by Company name</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="{{route('supplier.get')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">								
                    <select name="customer_name" id="customer_name" class="form-control select2">
                        <option value="">Select a company name</option>
                        @if(!empty($data))
                        @foreach ($data as $item)
                        <option value="{{$item->id}}">{{$item->supplier_name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{route('slider.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>

        @if(!empty($product))
        <div class="card">
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>CAS Number</th>
                            <th>Category</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                            @foreach ($product as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->cas_number}}</td>
                                <td>{{$item->getCategory->name}}</td>  
                            </tr>
                            @endforeach
                    </tbody>
                </table>										
            </div>
        </div>
        @endif
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#searchCustomer').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("customer.get")}}',
            type:'post',
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    window.location.reload();

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
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

      

       
        
</script>

@endsection