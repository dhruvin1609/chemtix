@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Description</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('description.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="descriptionForm" id="descriptionForm" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Title</label>
                                <input class="form-control" name="title" type="text" id="title" value="{{$data->title}}">
                              </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="formFile" value="{{$data->image}}">
                                <p>current image</p>
                                <img class="img-fluid" height="200" width="200" src="{{env('APP_URL').'/images/home_desc/'.$data->image}}" alt="">

                              </div>
                           
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="summernote">{{$data->description}}</textarea>	
                                <p></p>
                            </div>
                        </div>  						
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('description.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#descriptionForm').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("description.update",$data->id)}}',
            enctype: 'multipart/form-data',
            type:'post',
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    window.location.href = "{{route('description.list')}}";
                    toastr.success('Updated successfully');

                    // $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                    // $('#slug').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")

                }else{
                    toastr.error('Something went wrong');
                    var errors = res['errors'];
                

                if(errors['description']){
                    $('#description').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['description'])
                }else{
                    $('#description').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['title']){
                    $('#title').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['title'])
                }else{
                    $('#title').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
                }
                if(errors['image']){
                    $('#image').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors['image'])
                }else{
                    $('#image').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("")
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