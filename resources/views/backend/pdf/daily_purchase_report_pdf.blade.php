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

                            
                            <h6 class="mb-0"><strong> Daily Purchase Report
                           
                                <span class="btn btn-info"> {{date('d-m-y',strtotime($start_date))}}</span>

                                 <span class="btn btn-info"> {{date('d-m-y',strtotime($end_date))}}</span>
                                 </strong> </h6>      
                            
                        </div>
											</div> <!-- end row --->

			<div class="row"> 
				<div class="card">	
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered">		
										
											<thead>
												<tr>
													<th class="text-left">#S/N</th>
													<th class="text-left">Purchase No</th>
													<th class="text-right">Date</th>
													<th class="text-right">Product Name</th>
													<th class="text-right">Quantity</th>
													<th class="text-right">Unit Price</th>
													<th class="text-right">Total Price</th>
													
												</tr>
											</thead>
											<tbody>
												@php
                                 $total_sum = '0';
                                   @endphp
                                 @foreach($allData as $key => $item)
												<tr>
													<td class="text-left">
														{{  $key+1 }}</td>
													
													<td class="text-left">
														{{ $item->purchase_no  }}</td>
													<td class="unit">{{  date('d-m-Y',strtotime($item->date)) }}</td>
													<td>{{ $item['product']['name'] }}</td>
													<td class="qty">{{ $item->buying_qty }} {{ $item['product']['unit']['name']  }}</td>
													<td class="total">{{ $item->unit_price }}</td>
													<td class="total">{{ $item->buying_price }}</td>

												</tr>
												@php
                    $total_sum += $item->buying_price;
                       @endphp
                     @endforeach
												
											</tbody>
											<tfoot>
												<tr>
													
													<td ></td>
													<td ></td>
													<td ></td>
													<td ></td>
													<td colspan="2"></td>
													<td colspan="2">GRAND TOTAL</td>
													<td>${{ $total_sum }}</td>
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
							</div>
						</div>
					</div>
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