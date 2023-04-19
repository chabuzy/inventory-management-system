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
    <div class="breadcrumb-title pe-3">Update Test Sub Category </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Test Sub Category</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>    <a class="dropdown-item" href="javascript:;">Separated link</a>
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
                        <form method="post" action="{{ route('update.testsubcategory') }}" enctype="multipart/form-data">
                            @csrf

                              <input type="hidden" name="id" value="{{ $test_categories->id }}">
                          <div class="mb-3">
                                        <label class="form-label">Select items</label>
                                        <div class="input-group">
                                            <select name="test_category_id" class="single-select form-select">
                                                <option selected="">Open this select menu</option>
                                                @foreach($categories as $tcat)
                                                <option value="{{$tcat->id}}" {{ $tcat->id == $test_categories->test_category_id ? 'selected' : '' }} >{{$tcat->test_category}}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                       
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Test Sub Category Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="test_sub_category_name" value="{{ $test_sub_categories->test_sub_category_name }}" class="form-control"  />
                                 @error('test_sub_category_name')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Price</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="price"  value="{{ $test_sub_categories->price }}" data-role="tagsinput" class="form-control"  />
                                 @error('price')
                                  <span class="text-danger"> {{ $message }} </span>
                                 @enderror
                            </div>
                        </div>
                                     
                       
                                              
                       <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Update TestSubCategory Data" />
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
