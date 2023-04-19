@extends('admin.admin_master')
@section('admin')

<link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />

<!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->


                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Invoice Tables</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Invoice Data Table</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Manage Invoice</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('invoice.add') }}">Add Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Invoice DataTable </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                       <th>Customer Name</th> 
                                       <th>Invoice No </th>
                                       <th>Date </th>
                                       <th>Desctipion</th>   
                                      <th>Amount</th>
                                      <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                   	@foreach($allData as $key => $item)
                                   <tr>
                                       <td> {{ $key+1}} </td>
                                       <td> {{ $item['payment']['customer']['name'] }} </td> <td> #{{ $item->invoice_no }} </td> 
                                       <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 
                       

                                        <td>  {{ $item->description }} </td> 

                                       <td>  $ {{ $item['payment']['total_amount'] }} </td>

                                       <td><a href="{{ route('print.invoice',$item->id) }}" class="btn btn-outline-danger" title="print Data"><i class="lni lni-printer">Print</i></a>
                                       	<a href="{{ route('print.invoice1',$item->id) }}" class="btn btn-outline-danger" title="print Data"><i class="lni lni-printer">Print</i></a></td>
                                    </tr>
                                    @endforeach
                                                     
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                       <th>Customer Name</th> 
                                       <th>Invoice No </th>
                                       <th>Date </th>
                                       <th>Desctipion</th> 
                                      <th>Amount</th>
                                      <th>Action</th>
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
         <script src="{{asset('backend/assets/js/index.js')}}"></script>
       <script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

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
