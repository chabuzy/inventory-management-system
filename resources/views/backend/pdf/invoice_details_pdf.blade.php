@extends('admin.admin_master')
@section('admin')

<div class="page-wrapper">
		<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Applications</div>
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
				<div class="card">
					<div class="card-body">
						<div id="invoice">
							<div class="toolbar hidden-print">
								<div class="text-end">
									<button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
									<button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
								</div>
								<hr/>
							</div>
						<div class="invoice overflow-auto">
								<div style="min-width: 600px">
									<header>
										<div class="row">
											<div class="col">
												<a href="javascript:;">
													<img src="assets/images/logo-icon.png" width="80" alt="" />
												</a>
												<h6 class="mb-0">Invoice No {{ $payment['$invoice']['invoice_no'] }}</h6>
											</div>
											 
											<div class="col company-details">
												<h2 class="name">
								          	<a target="_blank" href="javascript:;">
									             Arboshiki
								                 	</a>
								                  </h2>
												<div>455 Foggy Heights, AZ 85004, US</div>
												<div>(123) 456-789</div>
												<div>company@example.com</div>
											</div>
										</div>
									</header>
									<main>
							</div>
									
								<div class="row contacts">
									<div class="row">
										<div class="col-md-6">

                           
                            <h6 class="mb-0"><strong> Daily Invoice Report
                           
                                <span class="btn btn-info"> {{date('d-m-y',strtotime($payment['invoice']['date']))}}</span>

                                  </strong> </h6>      
                            
                        </div>
				</div> <!-- end row --->

			<div class="row"> 
				<div class="card">	
					<div class="card-body">
						<div class="table-responsive">
							 <h6 class="mb-0"><strong> Daily Invoice Report</strong></h6>
							<table id="example2" class="table table-striped table-bordered">		
										
											<thead>
												<tr>
													
													<th class="text-left">Customer Name</th>
													<th class="text-right">Customer Mobile</th>
													<th class="text-right">Address</th>
													</tr>
											</thead>
											<tbody>
												
               
												<tr>
													
													<td class="text-left">
														{{ $item['payment']['customer']['name']  }}</td>
													<td>{{ $item['payment']['customer']['mobile_no']  }}</td>
													<td class="unit">{{ {{ $item['payment']['customer']['email']  }}}}</td>
													
												</tr>
																							
											</tbody>
											
										</table>


								</div>
							</div>
						</div>
					</div>


					<div class="row"> 
				<div class="card">	
					<div class="card-body">
						<div class="table-responsive">
							 <h6 class="mb-0"><strong> Daily Invoice Report</strong></h6>
							<table id="example2" class="table table-striped table-bordered">		
										
											<thead>
												<tr>
													<th class="text-left">#</th>
													<th class="text-left">Category</th>
													<th class="text-right">Product Name</th>
													<th class="text-right">Current Stock</th>
													<th class="text-left">Quantity</th>
													<th class="text-right">Unit price </th>
													<th class="text-right">Total Price </th>
													</tr>
											</thead>
											<tbody>
												
                            @php
        $total_sum = '0';
   $invoice_details = App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();     
        @endphp
        @foreach($invoice_details as $key => $details)
												<tr>
													<td class="no">{{ $key+1 }}</td>
													<td class="text-left">
														{{ $details['category']['name']  }}</td>
													<td>{{ $details['product']['name']  }}</td>
													<td class="unit">{{ {{ $details['product']['quantity']  }}}}</td>
													<td class="qty">{{ $details->selling_qty }}</td>
													<td class="qty">{{ $details->unit_price }}</td>
													<td class="qty">{{ $details->selling_price }}</td>
												</tr>
													
													 @php
                                           $total_sum += $details->selling_price;
                                           @endphp
                                           @endforeach										
											</tbody>
											<tfoot>
												<tr>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">SUBTOTAL</td>
													<td>${{ $total_sum }}</td>
												</tr>
												<tr>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">Discount Amount</td>
													<td>$${{ $payment->discount_amount }}</td>
												</tr>
												<tr>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">Paid Amount</td>
													<td>${{ $payment->paid_amount }}</td>
												</tr>
												
												<tr>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">Due Amount</td>
													<td>${{ $payment->due_amount }}</td>
												</tr>
												<tr>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">GRAND TOTAL</td>
													<td>${{ $payment->total_amount }}</td>
												</tr>
												<tr>
													<td colspan="5">Paid Summary</td>
												</tr>
												<tr>
													<td colspan="2">Date</td>
													<td colspan="3">Amount</td>
												</tr>
												@php
                              $payment_details = App\Models\PaymentDetail::where('invoice_id',$payment->invoice_id)->get();
                               @endphp

                                   @foreach($payment_details as $item)

                                   <tr>
                                   	<td colspan="3">{{ date('d-m-Y',strtotime($item->date)) }}</td>
									<td colspan="4">{{ $item->current_paid_amount }}</td>
                                   </tr>
                                   @endforeach
											</tfoot>
											
										</table>

												
								</div>
							</div>
						</div>
					</div>
										
									</main>
							
				</div>

								<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
								<div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection