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
                     <input type="radio" name="supplier_product_wise" value="supplier_wise" class="search_value"> &nbsp;&nbsp;
                      <strong> Product Wise Report </strong>
                    <input type="radio" name="supplier_product_wise" value="product_wise" class="search_value">
                                   
                      </div>
                 </div>
                                   
             </div><!-- // end row  -->
          <!--  /// Supplier Wise  -->
             <div class="show_supplier" style="display:none">    	
                <form method="post" action="{{ route('supplier.wise.pdf') }}" id="myForm" target="_blank">
                            
                        <div class="row">                     
                         <div class="col-md-8 form-group select2-sm">
                                        <h6 class="mb-0"> Supplier Name</h6>
                                        <div class="input-group">
                                            <select name="supplier_id" class="form-select">
                                           
                                          <option value="">Select Supplier</option>
                                       @foreach($supppliers as $supp)
                                       <option value="{{ $supp->id }}">{{ $supp->name }}</option>
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
              <div class="show_product" style="display:none;">
              	<form method="GET" action="{{ route('product.wise.pdf') }}" id="myForm" target="_blank" >
              	<div class="row"> 
              	<div class="col-md-4 select2-sm" >
		           <h6 class="mb-0"> Category Name</h6>
						<div class="input-group">
						<select name="category_id" id="category_id"  class="single-select form-select">     
						<option selected="">Open this select menu</option>
                                @foreach($category as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                  @endforeach         
						</select>
											
						</div>
					</div>

                 <div class="col-md-4 select2-sm" >
		           <h6 class="mb-0"> Product Name</h6>
			         <div class="input-group">
					<select name="product_id" id="product_id" class="single-select form-select">
                      <option selected="">Open this select menu</option>           
										
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
    $(function(){
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{ route('get-product') }}",
                type: "GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.id+' "> '+v.name+'</option>';
                    });
                    $('#product_id').html(html);
                }
            })
        });
    });

</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'supplier_wise') {
            $('.show_supplier').show();
        }else{
            $('.show_supplier').hide();
        }
    }); 

</script>


<script type="text/javascript">
    $(document).on('change','.search_value', function(){
        var search_value = $(this).val();
        if (search_value == 'product_wise') {
            $('.show_product').show();
        }else{
            $('.show_product').hide();
        }
    }); 

</script>



 <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                supplier_id: {
                    required : true,
                }, 
                  
            },
            messages :{
                supplier_id: {
                    required : 'Please Select Supplier ',
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
