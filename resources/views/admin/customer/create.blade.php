@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Customer</h1>
            </div>
            <div class="col-sm-6 text-right">
                <form class="uploadCSV" id="uploadCSV">
                    <!-- Button trigger modal -->
                    
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Upload Excel/CSV</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <label for="file" class="text-left">Upload CSV File</label>
                                <div class="form-group">  
                                   <input type="file" name="file" id="file" class="form-control">
                                   <p></p>
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
                <a href="{{ asset('csv/customer_csv.csv') }}" class="btn btn-info">Download template</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">
                        Upload Excel 
                    </button>
                <a href="{{route('supplier.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createCustomer" id="createCustomer" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Supplier Name">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_type">Customer type</label>
                                <select name="customer_type" id="customer_type" class="select2 form-control">
                                    <option value="manufacturers">Manufacturers</option>
                                    <option value="formulation">Formulation</option>
                                    <option value="supplier">Supplier</option>
                                    <option value="import_export_company">IMPORT & EXPORT company</option>
                                    <option value="trading_company">Trading Company</option>
                                </select>
                                <p></p>
                            </div>
                        </div>
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_city">City</label>
                                <input name="customer_city" id="customer_city" class="form-control" placeholder="City">
                                <p></p>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_address">Address</label>
                                <textarea name="customer_address" id="customer_address" class="form-control" cols="30" rows="10" placeholder="Address"></textarea>
                                <p></p>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_state">State</label>
                                <input name="customer_state" id="customer_state" class="form-control" placeholder="State">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="customer_country">Country</label>
                                <input name="customer_country" id="customer_country" class="form-control" placeholder="Country">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="customer_phone">Phone number</label>
                                <input name="customer_phone" id="customer_phone" class="form-control" placeholder="Phone number">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="customer_phone_alter">Alternate Phone number</label>
                                <input name="customer_phone_alter" id="customer_phone_alter" class="form-control" placeholder="Alternate Phone number">
                                <p></p>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_fax">Fax Number</label>
                                <input name="customer_fax" id="customer_fax" class="form-control" placeholder="Fax Number">
                                <p></p>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_email">Email</label>
                                <input name="customer_email" id="customer_email" class="form-control" placeholder="Email">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_website">Website</label>
                                <input name="customer_website" id="customer_website" class="form-control" placeholder="Website">
                                <p></p>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_gst_no">Supplier GST Number</label>
                                <input name="customer_gst_no" id="customer_gst_no" class="form-control" placeholder="GST Number">
                                <p></p>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_msme">Supplier MSME</label>
                                <input name="customer_msme" id="customer_msme" class="form-control" placeholder="MSME">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_pan_no">Supplier PAN Number</label>
                                <input name="customer_pan_no" id="customer_pan_no" class="form-control" placeholder="PAN Number">
                                <p></p>
                            </div>
                            
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_drug_lic_no">Supplier Drug Licence Number</label>
                                <input name="customer_drug_lic_no" id="customer_drug_lic_no" class="form-control" placeholder="Drug licence">
                                <p></p>
                            </div>
                        </div>                 						
                    </div>
                </div>							
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Contact Person Detail</h5>
                </div>
                <div class="card-body">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_name">Name</label>
                            <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Name">	
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_name">Phone Number</label>
                            <input type="text" name="contact_phone" id="contact_phone" class="form-control" placeholder="Phone Number">	
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_name">Designation</label>
                            <input type="text" name="contact_designation" id="contact_designation" class="form-control" placeholder="Designation">	
                            <p></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="supplier_name">Email</label>
                            <input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Email">	
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('supplier.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#createCustomer').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("customer.store")}}',
            type:'post',
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Customer Added successfully');
                    window.location.href = "{{route('customer.list')}}";

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['customer_name']){
                    $('#customer_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_name'])
                } else{
                    $('#customer_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['customer_type']){
                    $('#customer_type').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_type'])
                }else{
                    $('#customer_type').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                
                if(errors['customer_city']){
                    $('#customer_city').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_city'])
                }else{
                    $('#customer_city').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_address']){
                    $('#customer_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_address'])
                }else{
                    $('#customer_address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_state']){
                    $('#customer_state').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_state'])
                }else{
                    $('#customer_state').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_country']){
                    $('#customer_country').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_country'])
                }else{
                    $('#customer_country').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_phone']){
                    $('#customer_phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_phone'])
                }else{
                    $('#customer_phone').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_email']){
                    $('#customer_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_email'])
                }else{
                    $('#customer_email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                
                if(errors['contact_name']){
                    $('#contact_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['contact_name'])
                }else{
                    $('#contact_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['contact_phone']){
                    $('#contact_phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['contact_phone'])
                }else{
                    $('#contact_phone').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['contact_designation']){
                    $('#contact_designation').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['contact_designation'])
                }else{
                    $('#contact_designation').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['contact_email']){
                    $('#contact_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['contact_email'])
                }else{
                    $('#contact_email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_gst_no']){
                    $('#customer_gst_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_gst_no'])
                }else{
                    $('#customer_gst_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_drug_lic_no']){
                    $('#customer_drug_lic_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_drug_lic_no'])
                }else{
                    $('#customer_drug_lic_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_msme']){
                    $('#customer_msme').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_msme'])
                }else{
                    $('#customer_msme').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['customer_pan_no']){
                    $('#customer_pan_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['customer_pan_no'])
                }else{
                    $('#customer_pan_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

    $('#uploadCSV').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("customer.import")}}',
            type:'post',
            enctype: 'multipart/form-data',
            type:'post',
            processData: false,
            contentType: false,
            cache: false,
            data: data,
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Created successfully');
                    window.location.reload()

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['file']){
                    $('#file').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['file'])
                } else{
                    $('#file').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })
   
      

       
        
</script>

@endsection