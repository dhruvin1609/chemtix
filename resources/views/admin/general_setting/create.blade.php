@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Settings</h1>
            </div>
            <div class="col-sm-6 text-right">
                {{-- <a href="" class="btn btn-primary">Back</a> --}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createIndustry" id="createIndustry" method="POST">
            <div class="card">
                <div class="card-header"><h5>Company Information</h5></div>
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Company Name</label>
                                
                                <input type="hidden" name="id" value="{{(isset($setting->id)) ? $setting->id : ''}}">
                               
                                <input type="text" name="company_name" id="company_name" value="{{(isset($setting->company_name)) ? $setting->company_name : ''}}" class="form-control" placeholder="Company Name">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Contact Email</label>
                                <input type="text" name="company_email" id="company_email" value="{{(isset($setting->company_email)) ? $setting->company_email : ''}}" class="form-control" placeholder="Email">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" placeholder="Address" class="form-control">{{(isset($setting->address)) ? $setting->address : ''}}</textarea>	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Contact No.</label>
                                <input type="text" name="contact_no" id="contact_no" value="{{(isset($setting->contact_no)) ? $setting->contact_no : ''}}" class="form-control" placeholder="Contact Number">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="title">Alternate Contact No.</label>
                                <input type="text" name="contact_no_alt" id="contact_no_alt" value="{{(isset($setting->contact_no_alt)) ? $setting->contact_no_alt : ''}}" class="form-control" placeholder="Alternate Contact number">	
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="title">Google Map iframe</label>
                                <input type="text" name="google_iframe" id="google_iframe" value="{{(isset($setting->google_iframe)) ? $setting->google_iframe : ''}}" class="form-control" placeholder="Google Map Location">	
                                <p></p>
                            </div>
                        </div>
                        						
                    </div>
                </div>							
            </div>
            <div class="card">
                <div class="card-header"><h5>Social Media Links</h5></div>
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Facebook</label>       
                                <input type="text" name="facebook" id="facebook" value="{{(isset($setting->facebook)) ? $setting->facebook : ''}}" class="form-control" placeholder="Facebook page">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Instagram</label>
                                <input type="text" name="instagram" id="instagram" value="{{(isset($setting->instagram)) ? $setting->instagram : ''}}" class="form-control" placeholder="Instagram Handle">	
                                <p></p>
                            </div>
                        </div>
                      				
                    </div>
                </div>							
            </div>
            <div class="card">
                <div class="card-header"><h5>Logo</h5></div>
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Primary Logo</label>
                                <input class="form-control" name="primary_logo" type="file" id="primary_logo">
                                <p></p>
                                @if(isset($setting->primary_logo))
                                <p>current image</p>
                                <img class="img-fluid" height="200" width="200" src="{{env('APP_URL').'/images/setting/'.$setting->primary_logo}}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Favicon Icon</label>
                                <input class="form-control" name="favicon_icon" type="file" id="favicon_icon">
                                <p></p>
                                @if(isset($setting->favicon_icon))
                                <p>current image</p>
                                <img class="img-fluid" height="200" width="200" src="{{env('APP_URL').'/images/setting/'.$setting->favicon_icon}}" alt="">
                                @endif
                            </div>
                        </div>
                        
                      				
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- <a href="" class="btn btn-outline-dark ml-3">Cancel</a> --}}
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#createIndustry').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("setting.store")}}',
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

                    if(res.message == 'updated'){
                        toastr.success('Updated successfully');
                    }else{
                        toastr.success('Created successfully');
                    }

                    window.location.reload();

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                if(errors['company_name']){
                    $('#company_name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['company_name'])
                } else{
                    $('#company_name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['company_email']){
                    $('#company_email').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['company_email'])
                }else{
                    $('#company_email').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['address']){
                    $('#address').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['address'])
                }else{
                    $('#address').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['contact_no']){
                    $('#contact_no').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['contact_no'])
                }else{
                    $('#contact_no').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['facebook']){
                    $('#facebook').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['facebook'])
                }else{
                    $('#facebook').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['instagram']){
                    $('#instagram').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['instagram'])
                }else{
                    $('#instagram').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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