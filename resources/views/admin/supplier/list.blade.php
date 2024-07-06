@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Suppliers</h1>
                </div>

                <div class="col-sm-6 text-right">

                    <a href="{{ route('supplier_product.list') }}" class="btn btn-info" style="background-color:#0F478D ">Add
                        Supplier Product</a>
                    <a href="{{ route('supplier.create') }}" class="btn btn-primary">New Supplier</a>
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
                                <th>Supplier ID</th>
                                <th>Supplier State</th>
                                <th>Supplier Phone</th>
                                <th>Supplier Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($supplier->isNotEmpty())
                                @foreach ($supplier as $item)
                                    <tr>
                                        <td>{{ $item->supplier_name }}</td>
                                        <td>{{ $item->supplier_id }}</td>
                                        <td>{{ $item->supplier_state }}</td>
                                        <td>{{ $item->supplier_phone }}</td>
                                        <td>{{ $item->supplier_email }}</td>
                                        <td>
                                            <a href="{{ route('supplier.edit', $item->id) }}"><button
                                                    class="btn btn-primary">Edit</button></a>
                                            <button onclick="deleteProduct({{ $item->id }})"
                                                class="btn btn-danger">Delete</button>
                                            <button class="btn btn-success supplier-product"
                                                data-id="{{ $item->id }}">View Product</button>
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

    <div class="modal fade" id="viewProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewProductLabel">Supplier Products</h1>
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
        var productUrl = "{{ route('supplier.get', ':id') }}";

        function deleteProduct(id) {
            var url = `{{ route('supplier.delete', 'ID') }}`
            var newUrl = url.replace("ID", id);

            if (confirm("Are you Sure You want to delete ?")) {
                $.ajax({
                    url: newUrl,
                    type: 'delete',
                    data: {},
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.status) {
                            window.location.href = "{{ route('supplier.list') }}"
                            toastr.success('Supplier Deleted successfully');
                        }
                    }

                })
            }


        }
        $(function() {
            $(document).on('click', '.supplier-product', function(e) {
                e.preventDefault();
                var url = productUrl.replace(":id", $(this).data('id'));
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
            });
            $(".change_status").change(function() {
                var status = $(this).val();
                var enquiryId = $(this).closest('tr').data('enquiry-id');
                $.ajax({
                    url: '{{ route('enquiry.status', ':id') }}'.replace(':id', enquiryId),
                    data: $(this).serializeArray(),
                    type: 'post',
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == true) {
                            window.location.reload();
                            toastr.success('Status Changed');
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
    </script>
@endsection
