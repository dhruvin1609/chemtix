@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Suppliers Product</h1>
                </div>
                
                <div class="col-sm-6 text-right">             
                    <a href="{{route('supplier_product.create')}}" class="btn btn-primary">New Supplier Product</a>
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
                                <th>Supplier Product</th>
                                <th>Product CAS number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if(!empty($supplier_product))
                          @foreach ($supplier_product as $item)
                          <tr>
                            {{-- <td>{!! ($item->getCategory ? $item->getCategory->name : '<p class="text-danger">Category is deleted please delete this product or change category</p>') !!}</td> --}}

                            <td>{!!  ($item->getSupplierName ? $item->getSupplierName->supplier_name : '<p class="text-danger">Supplier is deleted please delete this supplier product</p>')  !!}</td>
                            <td>{!! ($item->getproduct ? $item->getproduct->title : '<p class="text-danger">Product is deleted please delete this supplier product</p>') !!}</td>
                            <td>{{$item->cas_number}}</td>
                            
                            <td>
                                <a href="{{route('supplier_product.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
                                <button onclick="deleteSupplierProduct({{$item->id}})" class="btn btn-danger">Delete</button>
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
   function deleteSupplierProduct(id){
        var url = `{{ route("supplier_product.delete","ID") }}`
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
                    toastr.success('Supplier Product Deleted successfully');
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