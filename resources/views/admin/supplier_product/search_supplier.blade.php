@extends('admin.layouts.app')

@section('content')
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">


<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Search Supplier</h1>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        @if(!empty($data))
        <div class="card">
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap" id="supplierTable">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Supplier Type</th>
                            <th>Supplier Country</th>
                            <th>Supplier State</th>
                            <th>Supplier Phone</th>
                            <th>Supplier Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->getSupplierName->supplier_name}}</td>
                                <td>{{$item->getSupplierName->supplier_type}}</td>
                                <td>{{$item->getSupplierName->supplier_country}}</td>
                                <td>{{$item->getSupplierName->supplier_state}}</td>
                                <td>{{$item->getSupplierName->supplier_phone}}</td>
                                <td>{{$item->getSupplierName->supplier_email}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>										
            </div>
        </div>
        @else
        <h3>Data not found for this supplier</h3>
        @endif
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->

@endsection

@section('customJs')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#supplierTable').DataTable();
    });
</script>
@endsection
