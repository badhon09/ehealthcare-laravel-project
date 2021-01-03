@extends('admin.layouts.master')

@section('content')
<div class="container-fluid mt-6">

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
            <h3 class="mb-0">Patients Form </h3>
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
                   
                    @foreach($errors->all() as $err)
                    <div class="alert alert-warning">
                       {{$err}}
                    </div>
                    @endforeach

                  </div>
                </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Username</label>
                  <input type="text" name="username"  class="form-control" placeholder="Username" >
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Email address</label>
                  <input type="email" name="email"  class="form-control">
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
             
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Upload Picture</label>
                  <input type="file" name="image"   class="form-control" >
                </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Address</label>
                    <input type="text" name="address"  class="form-control" placeholder="Address" >
                  </div>
                </div>
              
             
              <div class="col-lg-6">
                <label class="form-control-label" for="input-last-name">Date of Birth</label>
              <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input name="dob" class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2020">
                </div>
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
          <hr class="my-4" />
          <!-- Health Info -->
          <h6 class="heading-small text-muted mb-4">Health Information</h6>
          <hr class="my-4" />
          <div class="pl-lg-4">
              <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">BMI</label>
                      <input type="text" name="bmi"  class="form-control" placeholder="BMI" >
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">weight</label>
                      <input type="text" name="weight"  class="form-control" placeholder="weight" >
                    </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Blood Pressure</label>
                        <input type="text" name="bp"  class="form-control" placeholder="blood pressure" >
                      </div>
                      </div>
                      <div class="col-lg-3">
                          <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Blood Group</label>
                            <input type="text" name="bg"  class="form-control" placeholder="blood Group" >
                          </div>
                          </div>
                          <div class="col-lg-3">
                              <div class="form-group">
                                <label class="form-control-label" for="input-last-name">Cal</label>
                                <input type="text" name="cal"  class="form-control" placeholder="cal" >
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