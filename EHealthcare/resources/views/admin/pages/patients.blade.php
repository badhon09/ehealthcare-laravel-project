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
              <h3 class="mb-0">Patients List</h3>
            </div>
            <div class="col text-right">
            <a href="{{route('admin.createpatients')}}" class="btn btn-sm btn-primary">Add Patients</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="myTable" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">username</th>
                <th scope="col">photo</th>
                <th scope="col">contact no</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach ($patients as $p)
                  
              
              <tr>
                <th scope="row">
                  {{$p->name}}
                </th>
                <td>
                  {{$p->email}}
                </td>
                <td>
                {{$p->username}}
                </td>
                <td>
                  <img src="{{asset('images/'.$p->photo)}}" width="80" alt="">
                </td>
                <td>
                  {{$p->contactno}}
                </td>
                <td>
                  <a href="{{route('admin.editpatient',$p->id)}}" class="btn btn-sm btn-primary">edit</a>
                 

            
                  <a href="{{route('admin.deletepatient',$p->id)}}" class="btn btn-sm btn-danger">delete</a>
               
                </td>
              </tr>
              @endforeach
          
          
            </tbody>
          </table>
        </div>
      </div>
    </div>
        <!-- Card footer -->
 
  <!-- Dark table -->
  <div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        
        
      </div>
    </div>
  </div>

 
@endsection


@push('scripts')
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
