@extends('admin.layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('products.create')}}" class="btn btn-primary">New Product</a>
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
                {{-- <pre>{{$product}}</pre> --}}
                <form action="" method="GET">
                    <div class="card-header">
                        <div class="card-title">
                            <button type="button" onclick="window.location.href='{{route('products.list')}}'" class="btn btn-default btn-sm">Reset</button>
                        </div>
                            <div class="card-tools">
                                <div class="input-group input-group" style="width: 250px;">
                                    <input type="text" value="{{Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search by CAS number">
                
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                      </button>
                                    </div>
                                  </div>
                            </div>
                            
                        </div>
                </form>
                <div class="card-body table-responsive p-0">								
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>CAS Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($product->isNotEmpty())
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{!! ($item->getCategory ? $item->getCategory->name : '<p class="text-danger">Category is deleted please delete this product or change category</p>') !!}</td>
                                    <td>{{$item->cas_number}}</td>  
                                    <td>
                                        <a href="{{route('products.edit',$item->id)}}"><button class="btn btn-primary">Edit</button></a>
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
                    {{ $product->links('pagination::bootstrap-4') }}
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
</script>

@endsection