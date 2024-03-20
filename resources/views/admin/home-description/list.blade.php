@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home Page Description</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('description.create')}}" class="btn btn-primary">New Description</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            
            <div class="card">
           
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>    
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if($description->isNotEmpty())
                                @foreach ($description as $item)
                                <tr>
                                    <td>{!! $item->description !!}</td>   
                                    <td>
                                        <a href="{{route('description.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
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
   function deleteSlider(id){
        var url = `{{ route("slider.delete","ID") }}`
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
                    toastr.success('Slider Deleted successfully');
                    window.location.href = "{{ route('slider.list') }}"
                }
            }

            })
        }
       
       
    }
</script>

@endsection