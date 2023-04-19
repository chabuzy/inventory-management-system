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
    <div class="breadcrumb-title pe-3">Daily Invoice Report </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Daily Invoice Report</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Manage Invoice</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="{{ route('invoice.add') }}">Invoice List</a>
               
                              
            </div>
        </div>
    </div>
</div>
<!--end breadcrumb-->

<div class="container">
    <div class="main-body">
    	
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    	<form method="GET" action="{{ route('daily.purchase.pdf') }}" target="_blank" id="myForm">
                  <div class="row">   
                        <div class="col-md-6">
                            <label class="form-label">Start Date</label>
                            <div class="col-mb-3 form-group text-secondary">
                                <input type="date" name="start_date" id="start_date" placeholder="YY-MM-DD"  class="form-control"  />
                                 @error('start_date')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                         
                         <div class="col-md-6">
                            <label class="form-label">End Date</label>
                            <div class="col-mb-3 form-group text-secondary">
                                <input type="date" name="end_date" id="end_date" placeholder="YY-MM-DD"  class="form-control"  />
                                 @error('start_date')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>        
                            <div class="col-md-6">
                            <div class="col-sm-3"></div>
                            <label class="form-label"></label>
                            <div class="col-sm-9 text-secondary" >
                          <button type="submit" class="btn btn-info">Search</button>
                         </div>
                        </div>                          
                    </div><!-- // end row -->
                </form>
                </div><!-- // end card -->

               



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                start_date: {
                    required : true,
                }, 
                 end_date: {
                    required : true,
                },
                 
            },
            messages :{
                start_date: {
                    required : 'Please Select Start Date',
                },
                end_date: {
                    required : 'Please Select End Date',
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
