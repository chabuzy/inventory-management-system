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
                  
                </div>
                <!--end breadcrumb-->

    @php
    $payment = App\Models\Payment::where('invoice_id',$invoice->id)->first();
    @endphp  
                 <div class="row">                
                <h6 class="mb-0 text-uppercase">Invoice No: #{{ $invoice->invoice_no }} - {{ date('d-m-Y',strtotime($invoice->date)) }} </h6>
                <hr/>
                  <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Pending invoice List</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">    <a class="dropdown-item" href="{{ route('invoice.pending.list') }}">Pending Invoice List</a>
                                
                            </div>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  
                            <tbody>
                                   
                            
                 <tr>
                <td><p> Customer Info </p></td>
                <td><p> Name: <strong> {{ $payment['customer']['name']  }} </strong> </p></td>
                <td><p> Mobile: <strong> {{ $payment['customer']['mobile_no']  }} </strong> </p></td>
               <td><p> Email: <strong> {{ $payment['customer']['email']  }} </strong> </p></td>                
            </tr>

             <tr>
             <td></td>
              <td colspan="3"><p> Description : <strong> {{ $invoice->description  }} </strong> </p></td>
             </tr>
                                                     
                </tbody>
                               
         </table>
 <form method="post" action="{{ route('approval.store',$invoice->id) }}">
      @csrf                       

        <table id="example" class="table table-striped table-bordered" style="width:100%">
         <thead>
            <tr>
                
                    <th class="text-center">S/N</th>
                    <th class="text-center">Category</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center" style="background-color: #8B008B">Current Stock</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Unit Price </th>
                    <th class="text-center">Total Price</th>
            </tr>
        </thead>
        <tbody>
        @php
        $total_sum = '0';
        @endphp
                                    
      @foreach($invoice['invoice_details'] as $key => $details)
         <tr>

           <input type="hidden" name="category_id[]" value="{{ $details->category_id }}">
            <input type="hidden" name="product_id[]" value="{{ $details->product_id }}">
            <input type="hidden" name="selling_qty[{{$details->id}}]" value="{{ $details->selling_qty }}">
          
           <td class="text-center">{{ $key+1 }}</td>
            <td class="text-center">{{ $details['category']['name'] }}</td>
            <td class="text-center">{{ $details['product']['name'] }}</td>
            <td class="text-center" style="background-color: #8B008B">{{ $details['product']['quantity'] }}
            <td class="text-center">{{ $details->selling_qty }}</td>
            <td class="text-center">{{ $details->unit_price }}</td>
            <td class="text-center">{{ $details->selling_price }}</td>
                                  
          </tr>
           @php
        $total_sum += $details->selling_price;
        @endphp
          @endforeach

           <tr>
            <td colspan="6"> Sub Total </td>
             <td > {{ $total_sum }} </td>
        </tr>
         <tr>
            <td colspan="6"> Discount </td>
             <td > {{ $payment->discount_amount }} </td>
        </tr>

         <tr>
            <td colspan="6"> Paid Amount </td>
             <td >{{ $payment->paid_amount }} </td>
        </tr>

         <tr>
            <td colspan="6"> Due Amount </td>
             <td > {{ $payment->due_amount }} </td>
        </tr>

        <tr>
            <td colspan="6"> Grand Amount </td>
             <td >{{ $payment->total_amount }}</td>
        </tr>
                                                     
      </tbody>
     </table>
      <button type="submit" class="btn btn-info">Invoice Approve </button>
 </form> 
                        </div>
                    </div>
                </div>
                 </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script sr="{{ asset('backend/assets/js/code.js') }}"></script>

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
                  }); 


    });

  });
        </script>

@endsection