@extends('admin.layouts.master')

@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="display-2 text-white">Add Admins</h1>
         
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
       
        
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
         
              </div>
            </div>
           
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-10 order-xl-1 offset-1">
        <div class="card">
          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Admins Form </h3>
               
              </div>
              <div class="col-4 text-right">
               
              </div>
            </div>
          </div>
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
            	@csrf
              <h6 class="heading-small text-muted mb-4">User information</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                     



<div class="alert alert-warning col-md-12" role="alert">

</div>
          </div>
                  </div>
                  
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" name="email" placeholder="badhon@mail.com"  class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Full name</label>
                      <input type="text" name="fullname"  class="form-control" placeholder="Full name" >
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Password</label>
                      <input type="text" name="password"  class="form-control" placeholder="Password" >
                    </div>
                  </div>
                 
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Upload Picture</label>
                      <input type="file" name="image"   class="form-control" >
                    </div>
                  </div>
                  
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Contact</label>
                      <input type="text" name="contactno"  class="form-control" placeholder="Phone Number" >
                    </div>
                  </div>
                  
                </div>
              </div>
             
              <input type="submit" placeholder="add" name="submit" class="btn btn-lg btn-success offset-11">
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>



@endsection