@extends('admin.layouts.app')

@section('content')
<style>
    .phone_code{
        width: 100%;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Supplier</h1>
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
                <a href="{{ asset('csv/supplier_csv.csv') }}" class="btn btn-info">Download template</a>
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
        <form action="" name="createSupplier" id="createSupplier" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_name">Supplier Name</label>
                                <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="Supplier Name">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Supplier type</label>
                                <select name="supplier_type" id="supplier_type" class="select2 form-control">
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
                                <label for="supplier_id">Supplier ID</label>
                                <input name="supplier_id" id="supplier_id" class="form-control" placeholder="Supplier ID">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_city">City</label>
                                <input name="supplier_city" id="supplier_city" class="form-control" placeholder="City">
                                <p></p>
                            </div>
                        </div>    
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_address">Address</label>
                                <textarea name="supplier_address" id="supplier_address" class="form-control" cols="30" rows="10" placeholder="Address"></textarea>
                                <p></p>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_state">State</label>
                                <input name="supplier_state" id="supplier_state" class="form-control" placeholder="State">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="supplier_country">Country</label>
                                <input name="supplier_country" id="supplier_country" class="form-control" placeholder="Country">
                                <p></p>
                            </div>
                            <div class="mb-3 phone_code">
                                <label for="supplier_phone">Phone number</label>
                                <div class="w-100">
                                    <input name="supplier_phone" id="supplier_phone" class="form-control w-100" placeholder="Phone number">
                                </div>
                                <p></p>
                            </div>
                            <div class="mb-3 phone_code">
                                <label for="supplier_phone_alter">Alternate Phone number</label>
                                <div class="w-100">
                                    <input name="supplier_phone_alter" id="supplier_phone_alter" class="form-control w-100" placeholder="Alternate Phone number">
                                </div>
                                <p></p>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_fax">Fax Number</label>
                                <input name="supplier_fax" id="supplier_fax" class="form-control" placeholder="Fax Number">
                                <p></p>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_email">Email</label>
                                <input name="supplier_email" id="supplier_email" class="form-control" placeholder="Email">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_website">Website</label>
                                <input name="supplier_website" id="supplier_website" class="form-control" placeholder="Website">
                                <p></p>
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_gst_no">Supplier GST Number</label>
                                <input name="supplier_gst_no" id="supplier_gst_no" class="form-control" placeholder="GST Number">
                                <p></p>
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_msme">Supplier MSME</label>
                                <input name="supplier_msme" id="supplier_msme" class="form-control" placeholder="MSME">
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_pan_no">Supplier PAN Number</label>
                                <input name="supplier_pan_no" id="supplier_pan_no" class="form-control" placeholder="PAN Number">
                                <p></p>
                            </div>
                            
                        </div>  
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_drug_lic_no">Supplier Drug Licence Number</label>
                                <input name="supplier_drug_lic_no" id="supplier_drug_lic_no" class="form-control" placeholder="Drug licence">
                                <p></p>
                            </div>
                        </div>                 						
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="supplier_drug_lic_no_2">Supplier Drug Licence Number</label>
                                <input name="supplier_drug_lic_no_2" id="supplier_drug_lic_no_2" class="form-control" placeholder="Drug licence">
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
    $(function(){
        var phone_number = window.intlTelInput(
                document.querySelector("#supplier_phone_alter"), {
                    separateDialCode: true,
                    preferredCountries: ["in"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                }
            );
        var supplier_phone_number = window.intlTelInput(
                document.querySelector("#supplier_phone"), {
                    separateDialCode: true,
                    preferredCountries: ["in"],
                    hiddenInput: "full",
                    utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
                }
            );
    })
    $('#createSupplier').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("supplier.store")}}',
            type:'post',
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    toastr.success('Supplier Added successfully');
                    window.location.href = "{{route('supplier.list')}}";

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['supplier_name']){
                    $('#supplier_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_name'])
                } else{
                    $('#supplier_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['supplier_type']){
                    $('#supplier_type').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_type'])
                }else{
                    $('#supplier_type').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_id']){
                    $('#supplier_id').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_id'])
                }else{
                    $('#supplier_id').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_city']){
                    $('#supplier_city').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_city'])
                }else{
                    $('#supplier_city').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_address']){
                    $('#supplier_address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_address'])
                }else{
                    $('#supplier_address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_state']){
                    $('#supplier_state').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_state'])
                }else{
                    $('#supplier_state').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_country']){
                    $('#supplier_country').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_country'])
                }else{
                    $('#supplier_country').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_phone']){
                    $('#supplier_phone').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_phone'])
                }else{
                    $('#supplier_phone').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_email']){
                    $('#supplier_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_email'])
                }else{
                    $('#supplier_email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_website']){
                    $('#supplier_website').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_website'])
                }else{
                    $('#supplier_website').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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
                if(errors['supplier_gst_no']){
                    $('#supplier_gst_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_gst_no'])
                }else{
                    $('#supplier_gst_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_drug_lic_no']){
                    $('#supplier_drug_lic_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_drug_lic_no'])
                }else{
                    $('#supplier_drug_lic_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_msme']){
                    $('#supplier_msme').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_msme'])
                }else{
                    $('#supplier_msme').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['supplier_pan_no']){
                    $('#supplier_pan_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['supplier_pan_no'])
                }else{
                    $('#supplier_pan_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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
            url:'{{route("supplier.import")}}',
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