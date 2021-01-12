@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
@endsection

@section('content')

<div class="container-fluid mt-6">
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Payment List</h3>
                
              </div>
              <div class="col text-right">
                <a href="#!" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table id="myTable" class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Doctor name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Payment Gateway</th>
                  <th scope="col">payment date</th>
                  <th scope="col">payment status</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
            
              <tbody>
                  @foreach ($p as $p)
                      
                
                <tr>
                  <th scope="row">
                  {{$p->doctorname}}
                  </th>
                  <td>
                    {{$p->amount}}
                  </td>
                  <td>
                    {{$p->gateway}}
                  </td>
                  <td>
                    {{$p->date}}
                  </td>
                  <td>
                    {{$p->status}}
                  </td>
                  <td>
                    <a href="{{route('admin.paymentprint',$p->id)}}" class="btn btn-sm btn-primary">Print Invoice</a>
                    
                  </td>
                </tr>
                @endforeach
            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
    
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.jss"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
      $(document).ready( function () {
    $('#myTable').DataTable( {
      
      
         
             
    } );
} );
    </script>
@endpush