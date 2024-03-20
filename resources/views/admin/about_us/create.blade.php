@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create About Us Page</h1>
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
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                
                                <input type="hidden" name="id" value="{{(isset($about->id)) ? $about->id : ''}}">
                               
                                <input type="text" name="title" id="title" value="{{(isset($about->title)) ? $about->title : ''}}" class="form-control" placeholder="Title">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile">
                                <p></p>
                                @if(isset($about->image))
                                <p>current image</p>
                                <img class="img-fluid" height="200" width="200" src="{{env('APP_URL').'/images/about_us/'.$about->image}}" alt="">
                                @endif
                              </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote">{{(isset($about->description)) ? $about->description : ''}}</textarea>	
                                <p></p>
                            </div>
                        </div>
                       
                        						
                    </div>
                </div>							
            </div>
            <div class="card">
                <div class="card-header"><h6>Our Values Section</h6></div>
                <div class="card-body">								
                    <div class="row">
                       
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="company_philosofy">Company Philosofy</label>
                                <textarea name="company_philosofy" id="company_philosofy" cols="30" rows="10" class="form-control">{{(isset($about->company_philosofy)) ? $about->company_philosofy : ''}}</textarea>	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="our_values">Our Values</label>
                                <textarea name="our_values" id="our_values" cols="30" rows="10" class="form-control">{{(isset($about->our_values)) ? $about->our_values : ''}}</textarea>	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="quality">Quality</label>
                                <textarea name="quality" id="quality" cols="30" rows="10" class="form-control">{{(isset($about->quality)) ? $about->quality : ''}}</textarea>	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="how_we_work">How we Work</label>
                                <textarea name="how_we_work" id="how_we_work" cols="30" rows="10" class="form-control">{{(isset($about->how_we_work)) ? $about->how_we_work : ''}}</textarea>	
                                <p></p>
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
            url:'{{route("about.store")}}',
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
                if(errors['title']){
                    $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['title'])
                } else{
                    $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }

                if(errors['description']){
                    $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description'])
                }else{
                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['image']){
                    $('#formFile').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['image'])
                }else{
                    $('#formFile').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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