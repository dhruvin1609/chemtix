@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Suppliers</h1>
                </div>
                
                <div class="col-sm-6 text-right">
                   
                    <a href="{{route('supplier_product.list')}}" class="btn btn-info" style="background-color:#0F478D ">Add Supplier Product</a>
                    <a href="{{route('supplier.create')}}" class="btn btn-primary">New Supplier</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            
            <div class="card" style="padding: 30px;">
                {{-- <pre>{{$product}}</pre> --}}
                
                
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap dataTable">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier ID</th>
                                <th>Supplier State</th>
                                <th>Supplier Phone</th>
                                <th>Supplier Email</th>
                                <th>Supplier GST</th>
                                <th>Supplier MSME</th>
                                <th>Supplier Drug Licence Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($supplier->isNotEmpty())
                                @foreach ($supplier as $item)
                                <tr>
                                    <td>{{$item->supplier_name}}</td>
                                    <td>{{$item->supplier_id}}</td>
                                    <td>{{$item->supplier_state}}</td>
                                    <td>{{$item->supplier_phone}}</td>
                                    <td>{{$item->supplier_email}}</td>
                                    <td>{{$item->supplier_gst_no}}</td>
                                    <td>{{$item->supplier_msme}}</td>
                                    <td>{{$item->supplier_drug_lic_no}}</td>
                                    <td>
                                        <a href="{{route('supplier.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                        <button onclick="deleteProduct({{$item->id}})" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5">Records Not Found </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>										
                </div>
                <div class="card-footer clearfix">
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  
@endsection

@section('customJs')

<script>
   function deleteProduct(id){
        var url = `{{ route("supplier.delete","ID") }}`
        var newUrl = url.replace("ID",id);

        if(confirm("Are you Sure You want to delete ?")){
            $.ajax({
            url:newUrl,
            type:'delete',
            data:{},
            dataType:'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success : function (res){
                if(res.status){
                    window.location.href = "{{ route('supplier.list') }}"
                    toastr.success('Supplier Deleted successfully');
                }
            }

            })
        }
       
       
    }

    $(".change_status").change(function(){
        var status = $(this).val();
        var enquiryId = $(this).closest('tr').data('enquiry-id');
        $.ajax({
            url:'{{ route("enquiry.status", ":id") }}'.replace(':id', enquiryId),
            data:$(this).serializeArray(),
            type:'post',
            dataType:'json',
            success: function(res){
                if(res.status == true){
                    window.location.reload();
                    toastr.success('Status Changed');
                }else{
                    toastr.error('Something Went Wrong');
                }
            },
            error:function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

   
   
  
</script>

@endsection