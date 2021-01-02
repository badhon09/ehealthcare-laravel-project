@extends('admin.layouts.master')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
     
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white">Hello {{Auth::user()->name}}</h1>
       
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <img src="../assets/img/theme/img-1-1000x600.jpg"  class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="{{asset('images/'.Auth::user()->photo)}}" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center">
            
              </div>
            </div>
          </div>
          <div class="text-center">
            <h5 class="h3">
              {{Auth::user()->name}}<span class="font-weight-light"></span>
            </h5>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{Auth::user()->email}}
            </div>
          
            <div>
              <i class="ni education_hat mr-2"></i>Contact No:{{Auth::user()->contactno}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Edit profile </h3>
            </div>
            <div class="col-4 text-right">
              <a href="#!" class="btn btn-sm btn-primary">Settings</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart">
            <h6 class="heading-small text-muted mb-4">User information</h6>
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                   

</div>
<div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" placeholder="Username" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" value="{{Auth::user()->email}}" name="email"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Full name</label>
                    <input type="text" name="fullname" value="{{Auth::user()->name}}" class="form-control" placeholder="Full name" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Password</label>
                    <input type="text" name="password" value="{{Auth::user()->password}}"  class="form-control" placeholder="Password" >
                  </div>
                </div>
               
                
                
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Contact</label>
                    <input type="text" name="contactno" value="{{Auth::user()->contactno}}"  class="form-control" placeholder="Phone Number" >
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
  <!-- Footer -->
  
</div>
</div>



@endsection