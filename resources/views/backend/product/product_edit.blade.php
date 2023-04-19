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
    <div class="breadcrumb-title pe-3">Add Product </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
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
                <form method="post" action="{{ route('product.update') }}" id="myForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0"> Product Name </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control"  />
                                 @error('name')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>

                         <div class="mb-3 select2-sm">
                                        <h6 class="mb-0"> Supplier Name</h6>
                                        <div class="input-group">
                                            <select name="supplier_id" class="multiple-select form-select" data-placeholder="Choose anything" multiple="multiple">
                                           
                                           <option selected="">Open this select menu</option>
                                            @foreach($supplier as $supp)
                                            <option value="{{ $supp->id }}" {{ $supp->id == $product->supplier_id ? 'selected' : '' }}   >{{ $supp->name }}</option>
                                           @endforeach
                                            </select>
                                            <button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
                                            </button>
                                        </div>
                                    </div>
                                 <div class="mb-3 select2-sm" >
										
                                        <h6 class="mb-0"> Unit Name</h6>
										<div class="input-group">
											<select name="unit_id" class="single-select form-select">
                                           
											<option selected="">Open this select menu</option>
                                        @foreach($unit as $uni)
                                        <option value="{{ $uni->id }}" {{ $uni->id == $product->unit_id ? 'selected' : '' }}                         >{{ $uni->name }}</option>
                                       @endforeach
											</select>
											<button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
											</button>
										</div>
									</div>

                                    <div class="mb-3 select2-sm" >
										
                                        <h6 class="mb-0"> Category Name</h6>
										<div class="input-group">
											<select name="category_id" class="single-select form-select">
                                          <option selected="">Open this select menu</option>
                                           @foreach($category as $cat)
                                           <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                          @endforeach
											</select>
											<button class="btn btn-outline-secondary" type="button"><i class='bx bx-search'></i>
											</button>
										</div>
									</div>
                       
                        
                                  
                                              
                       <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Update Product" />
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 supplier_id: {
                    required : true,
                },
                 unit_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Your Product Name',
                },
                supplier_id: {
                    required : 'Please Select One Supplier',
                },
                unit_id: {
                    required : 'Please Select One Unit',
                },
                category_id: {
                    required : 'Please Select One Category',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection
