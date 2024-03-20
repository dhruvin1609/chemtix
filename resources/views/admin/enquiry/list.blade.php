@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Enquiry</h1>
                </div>
                
                <div class="col-sm-6 text-right">
                    <a href="{{route('enquiry.export')}}" class="btn btn-success">Download Excel</a>
                    <a href="{{route('enquiry.create')}}" class="btn btn-primary">New Enquiry</a>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>product</th>
                                <th>CAS Number</th>
                                <th>Country</th>
                                <th>Company Name</th>
                                <th>status</th>
                                <th>Action</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($enquiry->isNotEmpty())
                                @foreach ($enquiry as $item)
                                <tr data-enquiry-id="{{ $item->id }}">
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{!! ($item->getproduct ? $item->getproduct->title : '<p class="text-danger">Product is deleted</p>') !!}</td>
                                    <td>{{$item->cas_number}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>{{$item->company_name}}</td>
                                    <td>{{$item->status}}</td>
                                      
                                    <td>
                                        
                                        <select name="change_status" class="change_status">
                                            <option value="pending" {{ $item->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $item->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="quotation" {{ $item->status === 'quotation' ? 'selected' : '' }}>Quotation</option>
                                            <option value="closed" {{ $item->status === 'closed' ? 'selected' : '' }}>Closed</option>
                                        </select>
                                    
                                    </td> 
                                    <td>
                                        <form action="{{route('enquiry.remark',$item->id)}}" method="POST" >
                                            @csrf
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop-{{$item->id}}">
                                                Remarks
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop-{{$item->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel-{{$item->id}}">Add Remarks</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">  
                                                            <input type="text"
                                                            class="form-control" name="remarks" id="remarks" value="{{ $item->remarks ? $item->remarks : '' }}" aria-describedby="helpId" placeholder="">
                                                        </div> 
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            
                                        </form>
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
                    {{$enquiry->links('pagination::bootstrap-4')}}
                    {{-- <ul class="pagination pagination m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul> --}}
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
        var url = `{{ route("products.delete","ID") }}`
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
                    window.location.href = "{{ route('products.list') }}"
                    toastr.success('Product Deleted successfully');
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