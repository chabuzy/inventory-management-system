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
    <div class="breadcrumb-title pe-3">Add Invoice </div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
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
               
                  <div class="row"> 
                        
                        <div class="col-md-6">
                             <label class="form-label">Invoice No</label>
                            
                            <div class="col-mb-3 text-secondary">
                                <input type="text" name="invoice_no" id="invoice_no" value="{{$invoice_no}}" readonly style="background-color:#ddd" class="form-control"  />
                                 @error('invoice_no')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Date</label>
                            <div class="col-mb-3 text-secondary">
                                <input type="date" name="date" id="date" value="{{$date}}" class="form-control"  />
                                 @error('date')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                         <div class="col-md-6 select2-sm">
                            <label class="form-label">Category Name</label>
                             <div class="input-group">
                             <select name="category_id" id="category_id" class="form-select" >
                             <option selected="">Open this select menu</option>
                                    @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}
                                          @endforeach
                              </select>
                                            
                             </div>
                         </div>                       

									<div class="col-md-6 select2-sm" >
										 <label class="form-label">Product Name</label>
                                       	<div class="input-group">
											<select name="product_id" id="product_id" class="single-select form-select">
                                           	<option selected="">Open this select menu</option>
                                               
											</select>
											
										</div>
									</div>

                         <div class="col-md-6">
                             <label class="form-label">Stock(Pic/Kg)</label>
                            
                            <div class="col-mb-3 text-secondary">
                                <input type="text" name="current_stock_qty" id="current_stock_qty"  readonly style="background-color:#ddd" class="form-control"  />
                                 @error('current_stock_qty')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>

                            <div class="col-md-6">
                            <div class="col-sm-3"></div>
                            <label class="form-label"></label>
                            <div class="col-sm-9 text-secondary">
                         <i class="btn btn-outline-info px-4 radius-30 bx bxs-plus-square addeventmore">Add More</i>
                        </div>
                        </div>                          
                    </div><!-- // end row -->
                </div><!-- // end card -->

                  <!--  ---------------------------------- -->

            <div class="card-body">

                     <form method="post" action="{{route('invoice.store')}}" >
                            @csrf
                         <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                             <tr>      
                                 <th>Category</th> 
                                <th>Product Name </th>
                                <th width="7%">PSC/KG</th>
                                 <th width="10%">Unit Price </th> 
                                 <th width="15%">Total Price</th>
                                 <th width="7%">Action</th>
                             </tr>
                                </thead>

                                <tbody id="addRow" class="addRow">

                               </tbody>

                              <tbody>
                              		<tr>
                              	 <td colspan="4"> Discount</td>
                              		<td>
                              			 <input type="text" name="discount_amount" value="0" id="discount_amount" class="form-control estimated_amount"  readonly  style="background-color: #ddd;" />
                              		</td>
                              		<td></td>
                              	</tr>

                              	<tr>
                              	 <td colspan="4"> Grand Total</td>
                              		<td>
                              			 <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount"  readonly  style="background-color: #ddd;" />
                              		</td>
                              		<td></td>
                              	</tr>
                              </tbody>
                          </table><br>
                       

                           
                         <div class="row mb-3">
                            <div class="col-sm-6">
                                <h6 class="mb-0">Description </h6>
                            </div>
                            <div class="form-group col-sm-9 text-secondary">
                                <textarea id="description" name="description"  placeholder="Write My Description Here"></textarea>
                                 @error('name')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <br>

                        <div class="row">
                        	<div class="col-md-6">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Paid Status  </h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <select name="paid_status"  id="paid_status" class="form-select" aria-label="Default select example">
                                     <option selected="">Open this select menu</option>
                                      <option value="full_paid">Full Paid</option>
                                      <option value="full_due">Full Due</option>
                                       <option value="partial_paid">Partial Paid</option>
                                      
                                 </select>
                            </div>
                            <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                        </div> 

                         <div class="col-md-6 select2-sm">
                              <h6 class="mb-0"> Customer Name</h6>
                              <div class="input-group">
                                    <select name="customer_id" id="customer_id" class=" form-select">       
                                  <option selected="">Open this select Customer</option>
                                           @foreach($costomer as $cust)
                                 <option value="{{ $cust->id }}">{{ $cust->name }}</option>
                                          @endforeach
                                    <option value="0">New Customer </option>
                                  </select>
                                            
                              </div>
                          </div>
                        </div>
                        <br>

                        	<!-- Hide Add Customer Form -->
                        <div class="row new_customer" style="display:none">
                         <div class="row mb-3">
                            <div class="col-sm-9 text-secondary">
                            <input type="text" name="name" id="name" placeholder="Enter Customer Name" class="form-control"  />
                                                                      
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-9 text-secondary">
                            <input type="text" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" class="form-control"  />
                                                                      
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-9 text-secondary">
                            <input type="email" name="email" id="email" placeholder="Enter Customer Email" class="form-control"  />
                                                                      
                            </div>
                        </div>
                </div>
                         <!-- End Hide Add Customer Form -->

        
                <div class="form-group">
                 <button type="submit" class="btn btn-primary px-4" id="storeButton"> Invoice Store </button>
                </div>

              </form>
         </div> <!-- End Card -body -->



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>




<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
       

    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>

     <td>
        <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value=""> 
    </td>

    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
    </td>

      <td>
        <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly> 
    </td>

     <td>
        
        <i class="btn btn-warning px-5 radius-30 bx bx-trash me-0 removeeventmore"></i>
    </td>

    </tr>

</script>

<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"> </script>

<script>
		tinymce.init({
		  selector: '#mytextarea'
		});
</script>
	

	<script type="text/javascript">
    $(function(){
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{ route('check-product-stock') }}",
                type: "GET",
                data:{product_id:product_id},
                success:function(data){                   
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });
</script>

	<script type="text/javascript">
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category') }}",
                type: "GET",
                data:{supplier_id:supplier_id},
                success:function(data){
                    var html = '<option value="">Select Category</option>';
                    $.each(data,function(key,v){
                        html += '<option value=" '+v.category_id+' "> '+v.category.name+'</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

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
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(invoice_no == ''){
                $.notify("invoice No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }                  
                  if(category_id == ''){
                $.notify("Category is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(product_id == ''){
                $.notify("Product Field is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                 var source = $("#document-template").html();
                 var tamplate = Handlebars.compile(source);

                  var data = {
                    date:date,
                    invoice_no:invoice_no,
                    category_id:category_id,
                    category_name:category_name,
                    product_id:product_id,
                    product_name:product_name
                 };
                 var html = tamplate(data);
                 $("#addRow").append(html); 
        });

         $(document).on("click",".removeeventmore",function(event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('keyup click','.unit_price,.selling_qty', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.selling_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.selling_price").val(total);
            $('#discount_amount').trigger('keyup');
              });

             $(document).on('keyup','#discount_amount',function(){ 
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice 
        function totalAmountPrice(){
            var sum = 0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);


                }
            });

             var discount_amount = parseFloat($('#discount_amount').val());
            if(!isNaN(discount_amount) && discount_amount.length != 0){
                    sum -= parseFloat(discount_amount);
                }
            $('#estimated_amount').val(sum);
        }  


    });
</script>

<script type="text/javascript">
    $(document).on('change','#paid_status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });

     $(document).on('change','#customer_id', function(){
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.new_customer').show();
        }else{
            $('.new_customer').hide();
        }
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
