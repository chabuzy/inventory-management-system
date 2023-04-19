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
                                <li class="breadcrumb-item active" aria-current="page"> Supplier Data Table</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Manage Supplier</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('purchase.add') }}">Add Supplier</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Supplier DataTable </h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>full name</th>
                                        <th>Email</th>
                                      <th>Mobile No</th>
                                      <th>address</th>
                                      <th>Company</th>
                                      <th>actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                   @foreach($suppliers as $key => $item)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                       <td> {{ $item->name }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->mobile_no }} </td>
                                       <td> {{ $item->address }} </td>
                                       <td> {{ $item->comp }} </td>
                                       
                                        <td><a href="{{ route('supplier.edit',$item->id) }}" class="btn btn-outline-info" title="edit Data"><i class="bx bx-edit-alt me-0"></i></a>
                                       <a href="{{ route('supplier.delete',$item->id) }}" class="btn btn-outline-danger " title="Delete Data" id="delete"><i class="bx bx-trash-alt"></i></a>
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