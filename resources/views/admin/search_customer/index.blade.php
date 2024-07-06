
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap" id="customerTable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>CAS Number</th>
                            <th>Category</th> 
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($product as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->cas_number}}</td>
                                <td>{{$item->getCategory->name}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Products Found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>										
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
<script>
    $(function(){
        $('#customerTable').DataTable();
    })
</script>
