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
											</div>
											 <h6 class="mb-0">Invoice No {{ $invoice->invoice_no }}</h6>
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
										@php
             $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
              @endphp 
										<div class="row contacts">
											<div class="col invoice-to">
												<div class="text-gray-light">INVOICE TO:{{ $invoice->invoice_no }}</div>
												<h2 class="to">{{ $payment['customer']['name'] }}</h2>
												<div class="address">{{ $invoice->description  }}</div>
												<div class="email"><a href="mailto:john@example.com">{{ $payment['customer']['email']  }}</a>
												</div>
												<div class="address">{{ $payment['customer']['mobile_no']  }}</div>
												
											</div>
											<div class="col invoice-details">
												<h1 class="invoice-id">INVOICE {{ $invoice->invoice_no }}</h1>
												<div class="date"><strong>Date of Invoice: {{ date('d-m-Y',strtotime($invoice->date))}}</strong></div>
												<div class="date">Due Date: 30/10/2018</div>
											</div>

										<table>
											<thead>
												<tr>
													<th>#</th>
													<th class="text-left">DESCRIPTION</th>
													<th class="text-right">Category</th>
													<th class="text-right">Product Name</th>
													<th class="text-right">Current Stock</th>
													<th class="text-right">Quantity</th>
													<th class="text-right">Unit Price</th>
													<th class="text-right">Total Price</th>
												</tr>
											</thead>
											<tbody>
												@php
                 $total_sum = '0';
                   @endphp
                 @foreach($invoice['invoice_details'] as $key => $details)
												<tr>
													<td class="no">{{ $key+1 }}</td>
													<td class="text-left">
														{{ $invoice->description  }}</td>
													<td>{{ $details['category']['name'] }}</td>
													<td class="unit">{{ $details['product']['name'] }}</td>
													<td class="qty">{{ $details['product']['quantity'] }}</td>
													<td class="total">{{ $details->selling_qty }}</td>
													<td class="unit">{{ $details->unit_price }}</td>
													
													<td class="total">${{ $details->selling_price }}</td>
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
													<td colspan="2">Discount Amount 25%</td>
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
													<td colspan="2">Paid Amount</td>
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
											</tfoot>
										</table>
										<div class="thanks">Thank you!</div>
										<div class="notices">
											<div>NOTICE:</div>
											<div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
										</div>
									</main>
									<footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
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