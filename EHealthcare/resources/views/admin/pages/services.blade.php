@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
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
                <h3 class="mb-0">Service List</h3>
                <h1></h1>
              </div>
              <div class="col text-right">
              <a href="{{route('admin.createservices')}}" class="btn btn-sm btn-primary">Add Service</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table id="myTable" class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Service name</th>
                  <th scope="col">Price</th>
                 
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              
              <tbody>
                @foreach ($service as $s)
                    
              
                <tr>
                  <th scope="row">
                    {{$s->name}}
                  </th>
                  <td>
                   {{$s->price}}
                  </td>
                
                 
                  <td>
                    <a href="#!" class="btn btn-sm btn-primary">edit</a>
                    <a href="{{route('admin.deleteservice',$s->id)}}" class="btn btn-sm btn-danger">delete</a>
                 
                  </td>
                  
                </tr>
                @endforeach
             
            
              </tbody>
            </table>
          </div>
        </div>
      </div>
          <!-- Card footer -->
          <div class="card-footer py-4">
            <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
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