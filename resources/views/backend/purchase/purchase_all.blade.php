@extends('admin.admin_master')
@section('admin')

<!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->


                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Purchase Tables</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"> Purchase Data Table</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Manage Purchase</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('purchase.add') }}">Add Purchase</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Product DataTable </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Purhase No</th> 
                                        <th>Date </th>
                                        <th>Supplier</th>
                                        <th>Category</th> 
                                        <th>Qty</th> 
                                        <th>Product Name</th>
                                        <th>Status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                     	@foreach($allData as $key => $item)
                                    <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $item->purchase_no }} </td> 
                                    <td> {{ date('d-m-Y',strtotime($item->date)) }} </td> 
                                      
                                     <td> {{ $item['supplier']['name'] }} </td> 
                                     <td> {{ $item['category']['name'] }} </td> 
                                     <td> {{ $item->buying_qty }} </td> 
                                     <td> {{ $item['product']['name'] }} </td>  


                                     <td>
                                     @if($item->status == '0')
                                      <span class="btn btn-warning">Pending</span>

                                          @elseif($item->status == '1')
                                          <span class ="btn btn-success">Approved</span>
                                          @endif
                                       </td> 
                                      <td>
                                       @if($item->status == '0')
                                     <a href="{{ route('purchase.delete',$item->id) }}" class="btn btn-outline-danger " title="Delete Data" id="delete"><i class="bx bx-trash-alt"></i></a>
                                     @endif
                                    </td>
                                    </tr>
                                    @endforeach
                                                     
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th> 
                                        <th>Supplier Name </th>
                                        <th>Unit</th>
                                        <th>Category</th> 
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