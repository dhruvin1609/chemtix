@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer Product</h1>
                </div>    
                <div class="col-sm-6 text-right">          
                    <a href="{{route('customer_product.create')}}" class="btn btn-primary">New Customer Product</a>
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
                                <th>Customer Product</th>
                                <th>Product CAS number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                          @if(!empty($customer_product))
                          @foreach ($customer_product as $item)
                          <tr>
                            <td>{{ ($item->getCustomerName ? $item->getCustomerName->customer_name : '<p class="text-danger">Customer is deleted please delete this customer product</p>') }}</td>
                            <td>{{ ($item->getproduct ? $item->getproduct->title : '<p class="text-danger">Product is deleted please delete this customer product or change product</p>') }}</td>
                            <td>{{$item->cas_number}}</td>
                            
                            <td>
                                <a href="{{route('customer_product.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                <button onclick="deleteCustomerProduct({{$item->id}})" class="btn btn-danger">Delete</button>
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
   function deleteCustomerProduct(id){
        var url = `{{ route("customer_product.delete","ID") }}`
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
                    window.location.href = "{{ route('supplier_product.list') }}"
                    toastr.success('Customer Product Deleted successfully');
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