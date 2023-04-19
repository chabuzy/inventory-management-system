@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->


                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Tables</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Customer Credit Data Table</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="col-lg-3 col-xl-2">
                                        <a href="{{ route('customer.add') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i> Credit Customer</a>
                                    </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Credit Customer</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('credit.customer') }}" target="_blank"> Credit Customer </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Customer Invoice  ( Invoice No: #{{ $payment['invoice']['invoice_no'] }} ) </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table id="example2" class="table table-striped table-bordered">
                           
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Customer Name</th>
                                        <th>Customer Mobile</th>
                                       <th>address</th>
                                      
                                    </tr>
                                </thead>

                                <tbody>
                                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                  
                                    <tr>
                                        
                                       <td> {{ $payment['customer']['name'] }}</td>
                                        <td> {{ $payment['customer']['mobile_no']}} </td>
                                        <td> {{  $payment['customer']['email'] }} </td>
                                       
                                    </tr>
                                       
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>

                               <h6 class="mb-0 text-uppercase">Customer Invoice  ( Invoice No: #{{ $payment['invoice']['invoice_no'] }} ) </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                 <form method="post" action="{{ route('customer.update.invoice',$payment->invoice_id)}}">
                        @csrf  
                        <div>
                        <div class="table-responsive">
                            
                            <table id="example2" class="table table-striped table-bordered">
                           
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                       <th>Current Stock</th>
                                      <th>Quantity</th>
                                       <th>Unit Price</th>
                                      <th>Total Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                  <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                  @php
                     $total_sum = '0';
            $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();
            @endphp
                  @foreach($invoice_details as $key => $details)
                                    <tr>
                                        
                                       <td> {{ $key+1 }}</td>
                                        <td> {{ $details['category']['name'] }} </td>
                                        <td> {{   $details['product']['name'] }} </td>
                                        <td> {{ $details['product']['quantity'] }}</td>
                                        <td> {{ $details->selling_qty}} </td>
                                        <td> {{  $details->unit_price }} </td>
                                        <td> {{  $details->selling_price }} </td>
                                       
                                    </tr>
                                      @php
                       $total_sum += $details->selling_price;
                               @endphp
                            @endforeach
                                   <tr>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td class="text-center"> Subtotal</td>
                                   	<td class="text-center"> ${{ $total_sum }}</td>
                                   </tr> 

                                   <tr>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td class="text-center"> Discount Amount</td>
                                   	<td class="text-center"> ${{ $payment->discount_amount }}</td>
                                   </tr>
                                   <tr>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td class="text-center"> Paid Amount</td>
                                   	<td class="text-center"> ${{ $payment->paid_amount }}</td>
                                   </tr>
                                    <tr>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td class="text-center"> Due Amount</td>
                                   	<td class="text-center"> ${{ $payment->due_amount }}</td>
                                   </tr>

                                    <tr>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td></td>
                                   	<td class="text-center">Grand Amount</td>
                                   	<td class="text-center"> ${{ $payment->total_amount }}</td>
                                   </tr>

                                </tbody>
                                
                            </table>
                        </div>
             <div class="row">


                        <div class="form-group col-md-4 ">
                            <label class="form-label">Paid Status</label>
                           
                            <div class="col-mb-3 text-secondary">
                                <select name="paid_status" id="paid_status" class="form-select" >
                                           
                                            <option selected="">select status</option>
                                            <option value="full_paid">Full Paid </option> 
                                           <option value="partial_paid">Partial Paid </option>
                                          
                                         </select>

                                       <input type="text" name="paid_amount" id="paid_amount" placeholder="Enter Paid Amount " class="form-control paid_amount "  style="display:none;" />

                                      
                            </div>
                        </div>
             	 <div class=" form-group col-md-4">
                            <label class="form-label"> date</label>
                            <div class="col-mb-3 text-secondary">
                                <input type="date" name="date" id="date" class="form-control "  />
                                                                       
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"></label>
                           
                            <div class="col-mb-3 text-secondary">
                                <button type="submit" class="btn btn-info"> Invoice Update</button>
                                      
                            </div>
                        </div>

             </div> <!--end row-->

          </div>
                   </form>
                    </div>
                </div>
            </div>
        </div>
        
   <script type="text/javascript">
    $(document).on('change','#paid_status', function(){
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    }); 
</script>

@endsection