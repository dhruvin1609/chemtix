@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Search Supplier</h1>
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
        @if(!empty($data))
        <div class="card">
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Supplier Type</th>
                            <th>Supplier Country</th>
                            <th>Supplier State</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->getSupplierName->supplier_name}}</td>
                                <td>{{$item->getSupplierName->supplier_type}}</td>
                                <td>{{$item->getSupplierName->supplier_country}}</td>
                                <td>{{$item->getSupplierName->supplier_state}}</td>
                                <td>{{$item->getSupplierName->supplier_phone}}</td>
                                <td>{{$item->getSupplierName->supplier_email}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>										
            </div>
        </div>
        @else
        <h3>Data not found for this supplier</h3>
        @endif
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    // $('#searchCustomer').submit(function(event){
    //     event.preventDefault();
    //     var form = $(this)[0];
    //     var data = new FormData(form);
    //    var element = $(this);
    //    $("button[type=submit]").prop('disabled',true)
    //     $.ajax({
    //         url:'{{route("customer.get")}}',
    //         type:'post',
    //         data: element.serializeArray(),
    //         dataType:'json',
    //         success : function(res){
    //             $("button[type=submit]").prop('disabled',false)
    //             if(res['status']  == true) {

    //                 window.location.reload();

    //                 // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
    //                 // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

    //             }else{
    //                 toastr.error('Something went wrong');
    //                 var errors = res['errors'];
    //             if(errors['title']){
    //                 $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['title'])
    //             } else{
    //                 $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
    //             }

    //             if(errors['description']){
    //                 $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description'])
    //             }else{
    //                 $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
    //             }
    //             if(errors['image']){
    //                 $('#formFile').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['image'])
    //             }else{
    //                 $('#formFile').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
    //             }
    //             }
                
    //         },
    //         error : function(jqXHR,err){
    //             console.log('Something went wrong')
    //         }
    //     })
    // })

      

       
        
</script>

@endsection