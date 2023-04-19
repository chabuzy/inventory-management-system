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
                                <input type="submit" class="btn btn-info px-4 radius-30 fas fa-plus-circle addeventmore" value="Add More" />
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
    $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id = $(this).val();
            $.ajax({
                url:"{{ route('get-category1') }}",
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
