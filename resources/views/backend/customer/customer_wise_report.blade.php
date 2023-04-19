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
                 <button type="button" class="btn btn-primary">Manage Product</button>
                  <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="{{ route('product.all') }}">Product List</a>
                                             
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

                    <div class="row">                     
                         <div class="col-md-12 ">
                          <div class="input-group">
                            <strong> Supplier Wise Report </strong>
                     <input type="radio" name="Customer Wise Credit Report" value="customer_wise_credit" class="search_value"> &nbsp;&nbsp;
                      <strong> Product Wise Report </strong>
                    <input type="radio" name="Customer Wise Paid Report" value="customer_wise_paid" class="search_value">
                                   
                      </div>
                 </div>
                                   
             </div><!-- // end row  -->
          <!--  /// Supplier Wise  -->
             <div class="show_credit" style="display:none">    	
                <form method="post" action="{{ route('customer.wise.credit.report') }}" id="myForm" target="_blank">
                            
                        <div class="row">                     
                         <div class="col-md-8 form-group select2-sm">
                                        <h6 class="mb-0"> Customer Name</h6>
                                        <div class="input-group">
                                            <select name="customer_id" class="form-select">
                                           
                                          <option value="">Select Customer</option>
                                       @foreach($customers as $cus)
                                     <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                                   @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-top: 28px;">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                           </div>
                                   </div>
                               </form>
                           </div>
                 <!--  /// End Supplier Wise  -->

             <!--  /// Product Wise  -->
              <div class="show_paid" style="display:none;">
              	<form method="GET" action="{{ route('customer.wise.paid.report') }}" id="myForm" target="_blank" >
              	<div class="row"> 
              	<div class="col-md-4 select2-sm" >
		           <h6 class="mb-0"> Customer Name</h6>
						<div class="input-group">
						<select name="customer_id" id="customer_id"  class="single-select form-select">     
						<option value="">Select Customer</option>
                                       @foreach($customers as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                                   @endforeach      
						</select>
											
						</div>
					</div>
           

                       <div class="col-md-4 " >
										
                                   <h6 class="mb-0"></h6>
							<div class="input-group">
						 <button type="submit" class="btn btn-primary">Search</button>

								</div>
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
</div>

<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_credit') {
            $('.show_credit').show();
        }else{
            $('.show_credit').hide();
        }
    }); 
</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'customer_wise_paid') {
            $('.show_paid').show();
        }else{
            $('.show_paid').hide();
        }
    }); 
</script>



@endsection
