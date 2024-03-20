@extends('admin.layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Industry Served</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('served.list')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <form action="" name="createIndustryServed" id="createIndustryServed" method="POST">
            <div class="card">
                <div class="card-body">								
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title"  class="form-control" placeholder="Title">	
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>	
                                <p></p>
                            </div>
                        </div>
                       
                        						
                    </div>
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{route('served.list')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </form>
        
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
  
@endsection

@section('customJs')
<script>
    $('#createIndustryServed').submit(function(event){
        event.preventDefault();
        var form = $(this)[0];
        var data = new FormData(form);
       var element = $(this);
       $("button[type=submit]").prop('disabled',true)
        $.ajax({
            url:'{{route("served.store")}}',
           
            type:'post',
            data: element.serializeArray(),
            dataType:'json',
            success : function(res){
                $("button[type=submit]").prop('disabled',false)
                if(res['status']  == true) {

                    window.location.href = "{{route('served.list')}}";
                    toastr.success('Created successfully');

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
                }
                
            },
            error : function(jqXHR,err){
                console.log('Something went wrong')
            }
        })
    })

      

       
        
</script>

@endsection