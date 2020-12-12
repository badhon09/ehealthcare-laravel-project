@extends('admin.layouts.master')

@section('content')


<div class="container-fluid mt-6">
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Doctors List</h3>
            </div>
            <div class="col text-right">
            <a href="{{route('admin.createdoctors')}}" class="btn btn-sm btn-primary">Add Doctors</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
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
              <tr>
                <th scope="row">
              
                </th>
                <td>
             
                </td>
                <td>
                
                </td>
                <td>
                  
                </td>
                <td>
               
                </td>
                <td>
                  <a href="/admin/patients/edit/" class="btn btn-sm btn-primary">edit</a>
                 

            
                  <a href="/admin/patients/delete/" class="btn btn-sm btn-danger">delete</a>
               
                </td>
              </tr>
          
          
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
      </div>
    </div>
  </div>
  <!-- Dark table -->
  <div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        
        
      </div>
    </div>
  </div>

 
@endsection

