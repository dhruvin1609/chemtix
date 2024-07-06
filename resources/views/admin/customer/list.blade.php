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
                                    <td>
                                        <a href="{{route('customer.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                        <button onclick="deleteCustomer({{$item->id}})" class="btn btn-danger">Delete</button>
                                        <button class="btn btn-success customer-product" data-id="{{ $item->id }}">View Products</button>
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

    <div class="modal fade" id="viewProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewProductLabel">Customer Products</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewProductBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
@endsection

@section('customJs')

<script>
    var customerUrl = "{{ route('customer.get',':id') }}";
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
    $(function(){
        $(document).on('click','.customer-product',function(e){
            e.preventDefault();
            var url = customerUrl.replace(":id", $(this).data('id'));
            console.log(url);
                $.ajax({
                    url: url,
                    data: $(this).serializeArray(),
                    type: 'post',
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == true) {
                            $("#viewProductBody").html(res.data);
                            $("#viewProduct").modal('show');
                        } else {
                            toastr.error('Something Went Wrong');
                        }
                    },
                    error: function(jqXHR, err) {
                        console.log('Something went wrong')
                    }
                })
        })
    })
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