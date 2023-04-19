@extends('admin.admin_master')
@section('admin')

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
                                <li class="breadcrumb-item active" aria-current="page"> Customer Data Table</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="col-lg-3 col-xl-2">
                                        <a href="{{ route('customer.add') }}" class="btn btn-primary mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Add New Customer</a>
                                    </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Add Customer</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('customer.add') }}">Add Customer </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->                       
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
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
			 <h3 class="text-center"><strong>Supplier Name : </strong> {{ $allData['0']['supplier']['name'] }} </h3>
				<div class="table-responsive">
																			
								<thead>
									<tr>
										<th>#</th>
										<th class="text-left">Supplier Name</th>
										<th class="text-right">Unit</th>
										<th class="text-right">Category</th>
										<th class="text-right">Product Name</th>
										<th class="text-right">Stock</th>
									</tr>
								</thead>
								<tbody>
									 @foreach($allData as $key => $item)
									<tr>
										<td class="no">{{ $key+1}}</td>
										<td class="text-left">
											<h3>
										{{ $item['supplier']['name'] }}
										
										</h3></td>
													<td class="unit">{{ $item['unit']['name'] }}</td>
													<td class="text-left">{{ $item['category']['name'] }}100</td>
													<td class="text-left">{{ $item->name }}</td>
													<td class="no">{{ $item->quantity }}</td>
												</tr>
												@endforeach 
												
											</tbody>
											
										</table>
										
										
										<div class="notices">
											<div>NOTICE:</div>
											<div class="notice">@php
                                       $date = new DateTime('now', new DateTimeZone('Asia/Dhaka')); 
                                          @endphp         
                                   <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>   
                                   </div>
										
									</div>
										
								</div>
								</div>
									</main>
									
								<!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
								<div></div>
							</div>
											
					</div>
				 
				</div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="{{ asset('backend/assets/js/code.js') }}"></script>

        <script type="text/javascript">
            
            $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 


    });

  });
        </script>

@endsection