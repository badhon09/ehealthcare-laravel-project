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
              <h3 class="mb-0">Doctors List</h3>
            </div>

            <form method="POST" action="">
              <input type="text" class="form-control" id="search" placeholder="Search" type="text">
              <button id="ajaxSearch" type="submit" class="btn  btn-success mt-2 btn-sm btn-style-one">Search</button>
          
            </div>
          </div>
          
           
      </form>



            <div class="col text-right">
            <a href="{{route('admin.createdoctors')}}" class="btn btn-sm btn-primary">Add Doctors</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="myTablex" class="dont-show table align-items-center table-flush">
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
              @foreach ($doctors as $d)
                  
              
              <tr>
                <th scope="row">
              {{$d->name}}
                </th>
                <td>
             {{$d->email}}
                </td>
                <td>
                {{$d->username}}
                </td>
                <td>
                  <img src="{{asset('images/'.$d->photo)}}" width="80" alt="">
                </td>
                <td>
               {{$d->contactno}}
                </td>
                <td>
                  <a href="{{route('admin.editdoctor',$d->id)}}" class="btn btn-sm btn-primary">edit</a>
                 

            
                  <a href="{{route('admin.deletedoctor',$d->id)}}" class="btn btn-sm btn-danger">delete</a>
               
                </td>
              </tr>
              @endforeach
          
            </tbody>
          </table>

          <div class="show" style="display: none;"> 
            <table  class="table  align-items-center table-flush" >
              <thead class="thead-light">
                <tr>
                  <th scope="col">Doctor name</th>
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
                 <span id="fullname"></span>
                  </th>
                  <td>
                    <span id="email"></span>
                  </td>
                  <td>
                    <span id="username"></span>
                  </td>
                  <td>
                    <span id="fullname"></span>
                  </td>
                  <td>
                    <span id="contactno"></span>
                  </td>
                  <td>
                    <a href="#!" class="btn btn-sm btn-primary">edit</a>
                    <a href="/admin/doctors/delete/" class="btn btn-sm btn-danger">delete</a>
                 
                  </td>
                </tr>
             
              </tbody>
            </table>
          </div>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#ajaxSearch").click((e) => {
            e.preventDefault();
            var search = $("#search").val();
            //$(this).closest('myTable').remove();
            console.log(search);
            $.ajax({
                url: "/admin/doctors/search_doctor",
                data: { search: search },
               dataType: 'json',
                success: function(doc){
                    var results = doc;
                    console.log("$ -> results", results[0].name)
                    document.querySelector('.dont-show').style.display = "none";
                    //document.querySelector('.product__item').style.display = "flex";
                    document.querySelector('.show').style.display = "flex";
                    $("#fullname").html(results[0].name);
                    $("#email").html(results[0].email);
                    $("#username").html(results[0].username);
                    $("#contactno").html(results[0].contactno);
                   // $("#image").html(results[0].image);
                }, error: function(err) {
                    alert(err);
                }
            });
            
            
        });
    });
</script>

 
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