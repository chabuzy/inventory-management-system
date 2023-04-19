@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Add Patients Form </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> Patients Information</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="container">
    <div class="main-body">
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('store.customer') }}" enctype="multipart/form-data">
                            @csrf

                                               
                              <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="name" class="form-control"  />
                                 @error('name')
                                 <span class="text-danger"> {{ $message }} </span>
                                   		
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" name="email"   class="form-control"  />
                                 @error('email')
                                  <span class="text-danger"> {{ $message }} </span>
                                 @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile No </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="number" name="mobile_no"   class="form-control"  />
                                 @error('mobile_no')
                                  <span class="text-danger"> {{ $message }} </span>
                                 @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="address"   class="form-control"  />
                                 @error('address')
                                  <span class="text-danger"> {{ $message }} </span>
                                 @enderror
                            </div>
                        </div>
                         
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <select name="sex"  class="form-select" aria-label="Default select example">
                                     <option selected="">Open this select menu</option>
                                      <option value="male" {{old('sex')=='male' ? 'selected' : ''}} >Male</option>
                                      <option value="female" {{old('sex')=='female' ? 'selected' : ''}}>Female</option>
                                      
                                 </select>
                            </div>
                        </div> 
                       
                        
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> Patients Photos</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="file" name="customer_image" id="image" class="form-control" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">

                                <img id="ShowImage" src="{{ url('uploads/no_image.jpg') }}" alt="Admin"class="rounded-circle p-1 bg-primary" width="110">

                            </div>
                        </div>
                                              
                       <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Insert Patients Data" />
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>

<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"> </script>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>




@endsection
