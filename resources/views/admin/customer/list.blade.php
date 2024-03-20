@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customers</h1>
                </div>
                
                <div class="col-sm-6 text-right">
                    
                    <a href="{{route('customer_product.list')}}" class="btn btn-info" style="background-color:#0F478D ">Add Customer Product</a>
                    <a href="{{route('customer.create')}}" class="btn btn-primary">New Customer</a>
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
                                <th>Customer Name</th>
                                <th>Customer State</th>
                                <th>Customer Phone</th>
                                <th>Customer Email</th>
                                <th>Customer GST</th>
                                <th>Customer MSME</th>
                                <th>Customer Drug Licence Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($customer->isNotEmpty())
                                @foreach ($customer as $item)
                                <tr>
                                    <td>{{$item->customer_name}}</td>
                                    <td>{{$item->customer_state}}</td>
                                    <td>{{$item->customer_phone}}</td>
                                    <td>{{$item->customer_email}}</td>
                                    <td>{{$item->customer_gst_no}}</td>
                                    <td>{{$item->customer_msme}}</td>
                                    <td>{{$item->customer_drug_lic_no}}</td>
                                    <td>
                                        <a href="{{route('customer.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                        <button onclick="deleteCustomer({{$item->id}})" class="btn btn-danger">Delete</button>
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
                    {{$customer->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  
@endsection

@section('customJs')

<script>
   function deleteCustomer(id){
        var url = `{{ route("customer.delete","ID") }}`
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
                    window.location.href = "{{ route('customer.list') }}"
                    toastr.success('Customer Deleted successfully');
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