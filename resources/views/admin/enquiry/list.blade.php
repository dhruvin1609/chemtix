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
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>view enquiry</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($enquiry->isNotEmpty())
                                @foreach ($enquiry as $item)
                                <tr data-enquiry-id="{{ $item->id }}">
                                    <td>{{$item->name}}</td>
                                    <td>{{Str::limit($item->phone,5,'...')}}</td>
                                    <td>{{Str::limit($item->email, 10, '...')}}</td>
                                    <td>{!! ($item->getproduct ? $item->getproduct->title : '<p class="text-danger">Product is deleted</p>') !!}</td>
                                    <td>{{$item->cas_number}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>{{$item->company_name}}</td>                                      
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
                                    <td><a href="javascript:void(0)" class="view_inquiry" data-id="{{ $item->id }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
          
        <div class="modal fade" id="viewEnquiry" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="viewEnquiryLabel">Enquiry Details</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewEnquiryBody">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
  
@endsection

@section('customJs')
<script>
    var viewUrl = "{{ route('enquiry.view',':id') }}"
</script>

<script>
    $(function(){
        
        $(document).on('click',".view_inquiry",function(e){
            e.preventDefault();
            // debugger
            let id = $(this).data('id');
            $.ajax({
            url:viewUrl.replace(':id',id),
            type:'GET',
            dataType:'json',
            success: function(res){
                if(res.status){
                    console.log('res',res.data);
                    $("#viewEnquiryBody").html(res.data);
                    $("#viewEnquiry").modal('show');
                }
                
            },
            error:function(jqXHR,err){
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