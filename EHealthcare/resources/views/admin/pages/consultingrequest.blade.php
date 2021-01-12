@extends('admin.layouts.master')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
   <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
   <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

@endsection

@section('content')

<div class="container-fluid mt-6">
    @if (session('success'))
  
  <div class="alert alert-success">
      {{session('success')}}
  </div>
  @endif
    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Pending List</h3>
                
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
                  <th scope="col">Patient Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Time</th>
                  <th scope="col">status</th>
                 
                  <th scope="col">action</th>
                </tr>
              </thead>
            
              <tbody>
                  @foreach ($a as $a)
                      
                  
                <tr>
                  <th scope="row">
                  {{$a->doctorname}}
                  </th>
                  <td>
                    {{$a->patientname}}
                  </td>
                  <td>
                    {{$a->date}}
                  </td>
                  <td>
                    {{$a->time}}
                  </td>
                  <td>
                    {{$a->status}}
                  </td>
                  <td>
                    <a href="{{route('admin.consultingrequestsaccept',$a->id)}}" class="btn btn-sm btn-primary">accept</a>
                    <a href="{{route('admin.consultingrequestsaccept',$a->id)}}" class="btn btn-sm btn-danger">reject</a>
                    
                  </td>
                </tr>
                @endforeach
            
              </tbody>
            </table>
            <div class="col-md-4 text-right"> <button id="exporttable" class="btn btn-primary">Export</button> </div>
          </div>
        </div>
      </div>
    </div>
</div>
<script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569818907/jquery.table2excel.min.js"></script>
<script>
    $(function() {
$("#exporttable").click(function(e){
var table = $("#myTable");
if(table && table.length){
$(table).table2excel({
exclude: ".noExl",
name: "Excel Document Name",
filename: "BBBootstrap" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
fileext: ".xls",
exclude_img: true,
exclude_links: true,
exclude_inputs: true,
preserveColors: false
});
}
});

});
</script>
    
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