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
                <div class="breadcrumb-title pe-3">Add Purchase </div>
                  <div class="ps-3">
                    <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                          <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                          </li>
                            <li class="breadcrumb-item active" aria-current="page">Purchase</li>
                          </ol>
                     </nav>
                   </div>
               <div class="ms-auto">

                <div class="btn-group">
                 <button type="button" class="btn btn-primary">Manage Purchase</button>
                  <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">   <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                 <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">   <a class="dropdown-item" href="{{ route('purchase.all') }}">Purchase List</a>
                                             
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
                      
                        <div class="col-md-4">
                            <label class="form-label">Purchase date</label>
                            <div class="col-mb-3 text-secondary">
                                <input type="date" name="date" id="date" class="form-control "  />
                                 @error('date')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Puchase No</label>
                           
                            <div class="col-mb-3 text-secondary">
                                <input type="text" name="purchase_no" id="purchase_no" class="form-control"  />
                                 @error('purchase_no')
                                 <span class="text-danger"> {{ $message }} </span>
                                        
                                 @enderror
                                      
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Supplier Name</label>
                           
                            <div class="col-mb-3 text-secondary">
                                <select name="supplier_id" id="supplier_id" class="form-select" >
                                           
                                            <option selected="">Open this select menu</option>
                                           @foreach($supplier as $supp)
                                           <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                          @endforeach
                                            </select>
                                      
                            </div>
                        </div>

                         
                       <div class="col-md-4">
                            <label class="form-label">Category Name</label>
                           
                            <div class="col-mb-3 text-secondary">
                                <select name="category_id" id="category_id" class="form-select">   
                                       <option selected="">Open this select menu</option>
                                        

                                       </select>
                                      
                            </div>
                        </div>
                         <div class="col-md-4">
                            <label class="form-label">Product Name</label>
                           
                            <div class="col-mb-3 text-secondary">
                                <select name="product_id" id="product_id" class="form-select">
                                     <option selected="">Open this select menu</option>
                                          
                                       </select>
                                      
                            </div>
                        </div>                   
                            <div class="col-md-4">
                            <div class="col-sm-3"></div>
                            <label class="form-label"></label>
                            <div class="col-sm-9 text-secondary">
                                
                                 <i class="btn btn-primary px-4 radius-30 bx bxs-plus-square addeventmore">Add More</i>
                                  </div>
                        </div>
                        
                    </div><!-- // end row -->
                   </div><!-- // end card -->
                   <div class="card-body">
                    <form method="post" action="{{route('purchase.store')}}" >
                            @csrf
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Category</th> 
                                        <th>Product Name </th>
                                        <th>PSC/KG</th>
                                        <th>Unit Price</th> 
                                        <th>Description</th> 
                                        <th>Total Price</th>
                                         <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody id="addRow" class="addRow">

                               </tbody>

                              <tbody>

                                <tr>
                                    <td colspan="5"></td>
                                    <td>
                                         <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount"  readonly  style="background-color: #ddd;" />
                                    </td>
                                    <td></td>
                                </tr>
                              </tbody>
                          </table>
                          <br>
                  <div class="form-group">
                <button type="submit" class="btn btn-info" id="storeButton"> Purchase Store</button>
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




<script id="document-template" type="text/x-handlebars-template">

<tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">

    <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{ category_name }}
    </td>

     <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{ product_name }}
    </td>

     <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value=""> 
    </td>

    <td>
        <input type="number" class="form-control unit_price text-right" name="unit_price[]" value=""> 
    </td>

 <td>
        <input type="text" class="form-control" name="description[]"> 
    </td>

     <td>
        <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly> 
    </td>

     <td>
        <i class="btn btn-danger px-5 radius-30 bx bx-trash me-0 removeeventmore"></i>
    </td>  
    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("click",".addeventmore", function(){
            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id  = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if(date == ''){
                $.notify("Date is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(purchase_no == ''){
                $.notify("Purchase No is Required" ,  {globalPosition: 'top right', className:'error' });
                return false;
                 }
                  if(supplier_id == ''){
                $.notify("Supplier is Required" ,  {globalPosition: 'top right', className:'error' });
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
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
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

        $(document).on('keyup click','.unit_price,.buying_qty', function(){
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice 
        function totalAmountPrice(){
            var sum = 0;
            $(".buying_price").each(function(){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }  


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



@endsection
