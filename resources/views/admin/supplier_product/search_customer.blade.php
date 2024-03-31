@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Search Customer</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="" class="btn btn-primary">Back</a>
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
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Type</th>
                            <th>Customer Country</th>
                            <th>Customer State</th>
                            <th>Customer Phone</th>
                            <th>Customer Email</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item->getCustomerName->customer_name}}</td>
                                <td>{{$item->getCustomerName->customer_type}}</td>
                                <td>{{$item->getCustomerName->customer_country}}</td>
                                <td>{{$item->getCustomerName->customer_state}}</td>
                                <td>{{$item->getCustomerName->customer_phone}}</td>
                                <td>{{$item->getCustomerName->customer_email}}</td>
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


@endsection