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
                <h6 class="mb-0 text-uppercase">Customer DataTable </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table id="example2" class="table table-striped table-bordered">
                           
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                      <th>Mobile No</th>
                                      <th>address</th>
                                      <th>Company Name</th>
                                      <th>Customer Image</th>
                                      <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                   @foreach($customers as $key => $item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                       <td> {{ $item->name }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->mobile_no }} </td>
                                       <td> {{ $item->address }} </td>
                                       <td> {{ $item->comp }} </td>
                                        <td> <img src="{{ asset( $item->customer_image ) }}" style="width:60px; height:50px"> </td>
                                       <td>
                                        <a href="{{ route('customer.edit',$item->id) }}" class="btn btn-outline-info" title="edit Data"><i class="bx bx-edit-alt me-0"></i></a>
                                       <a href="{{ route('customer.delete',$item->id) }}" class="btn btn-outline-danger " title="Delete Data" id="delete"><i class="bx bx-trash-alt"></i></a>
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