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
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Add Customer</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('product.add') }}">Customer List</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Customer DataTable </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Customer Name</th> 
                                        <th>Invoice No </th>
                                        <th>Date </th>
                                        <th>Desctipion</th>  
                                        <th>Amount</th>
                                        <th>Status</th>
                                      <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                  @foreach($allData as $key => $item)
                                    <tr>
                                      <td> {{ $key+1}} </td>
                                      <td> {{ $item['payment']['customer']['name'] }} </td> 
                                      <td> #{{ $item->invoice_no }} </td> 
                                      <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> <td>  {{ $item->description }} </td> 
                                     <td>  $ {{ $item['payment']['total_amount'] }} </td>

                                        <td> @if($item->status == '0')
                                         <span class="btn btn-warning">Pending</span>
                                         @elseif($item->status == '1')
                                         <span class="btn btn-success">Approved</span>
                                         @endif </td>

                                        
                                       <td>
                                       	 @if($item->status == '0')
                                        <a href="{{ route('invoice.approve',$item->id) }}" class="btn btn-outline-info" title="approve Data"><i class="lni lni-checkmark-circle">Approved Data</i></a>

                                       <a href="{{ route('invoice.delete',$item->id) }}" class="btn btn-outline-danger " title="Delete Data" id="delete"><i class="bx bx-trash-alt">Delete Data</i></a>
                                         @endif
                                    </td>
                                  
                                    </tr>
                                    @endforeach
                                                     
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>full name</th>
                                        <th>Email</th>
                                      <th>Mobile No</th>
                                      <th>address</th>
                                      <th>company Name</th>
                                      <th>customer Image</th>
                                      <th>Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script src="{{ asset('backend/assets/js/code.js') }}"></script>

       

@endsection