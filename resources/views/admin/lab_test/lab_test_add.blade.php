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
    <div class="breadcrumb-title pe-3">Add Lab Test </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lab Test</li>
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
                <form method="post" action="{{ route('store.lab.test') }}" enctype="multipart/form-data">
                            @csrf

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> Title</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="title" class="form-control"  />
                                 @error('title')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                                 <div class="mb-3 select2-sm" >
										
                                        <h6 class="mb-0"> Test Category Name</h6>
										<div class="input-group">
											<select name="test_category_id" class="single-select form-select">
                                           
												@foreach($testcategories as $tcat)
												<option value="{{$tcat->id}}">{{$tcat->test_category_name}}</option>
												@endforeach
											</select>
											<button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
											</button>
										</div>
									</div>

                                     <div class="mb-3 select2-sm">
                                        <h6 class="mb-0"> Test SubCategory Name</h6>
                                        <div class="input-group">
                                            <select name="test_sub_category_id" class="multiple-select form-select" data-placeholder="Choose anything" multiple="multiple">
                                           
                                                @foreach($testsubcategories as $scat)
                                                <option value="{{$scat->id}}">{{$scat->test_sub_category_name}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                       
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">fullname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="fullname" class="form-control"  />
                                 @error('fullname')
                                 <span class="text-danger"> {{ $message }} </span>
                                   		
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="email" name="email" class="form-control"  />
                                 @error('email')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone No</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="phone" class="form-control"  />
                                 @error('phone')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="address" class="form-control"  />
                                 @error('address')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>

                         <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Occupation</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="occupation" class="form-control"  />
                                 @error('occupation')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                         <div class="row mb-3">                    
                            <div class="mb-3">
                                        <h6 class="mb-0">Date of Birth</h6>
                                        <input type="date" name="age" class="form-control">
                                </div>
                        </div>

                        

                        
                        <div class="mb-3">
                            
                               <h6 class="mb-0">Gender</h6>         
                             <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>

                           

                         <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Remark/Description</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                 <textarea id="mytextarea" name="short_description"></textarea>
                            </div>
                        </div>
                         
                          <div class="mb-3">
                                    <h6 class="mb-0">Test Result</h6>
                                     
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="test_result" id="inlineRadio1" value="positive">
                                <label class="form-check-label" for="inlineRadio1">Positive</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="test_result" id="inlineRadio2" value="negative">
                                    <label class="form-check-label" for="inlineRadio2">Negative</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="test_result" id="inlineRadio2" value="normal">
                                    <label class="form-check-label" for="inlineRadio2">Normal</label>
                                </div>
                                    </div>  

                            <div class="row mb-3">                    
                            <div class="mb-3">
                                        <h6 class="mb-0">Status</h6>
                                        <select name="status" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                                    <option selected>Open this select menu</option>
                                    <option value="completed" {{old('status')=='completed' ? 'selected' : ''}}>Completed</option>
                                    <option value="inprogress" {{old('status')=='inprogress' ? 'selected' : ''}}>In Progress</option>
                                    <option value="collected" {{old('status')=='collected' ? 'selected' : ''}}>Collected</option>
                                </select>
                                </div>
                        </div>                     
                                              
                       <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Insert Labtest Data" />
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

<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
	</script>
	<script>
		tinymce.init({
		  selector: '#mytextarea1'
		});
	</script>

<script>
    $('#fancy-file-upload').FancyFileUpload({
        params: {
            action: 'fileuploader'
        },
        maxfilesize: 1000000
    });
</script>

@endsection
