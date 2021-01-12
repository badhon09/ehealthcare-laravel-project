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
              <h3 class="mb-0">Doctors Form </h3>
             
            </div>
            <div class="col-4 text-right">
             
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data" action="{{route('admin.updatedoctor',$doctor[0]->user_id)}}">
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
                    <span id="user-email-availability-status" style="    font-size: 15px;
                padding-top: 14px;
                padding-right: 5px;
                color: #8376ca;"></span> 
                    <label class="form-control-label" for="input-username">Username</label>
                    <input type="text" name="username" id="email1" onkeyup="checkemailAvailability()" class="form-control" value="{{$doctor[0]->username}}" >
                    
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" name="email" value="{{$doctor[0]->email}}"  class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-first-name">Full name</label>
                    <input type="text" name="fullname"  class="form-control" value="{{$doctor[0]->name}}" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Password</label>
                    <input type="text" name="password"  class="form-control" value="{{$doctor[0]->password}}" >
                  </div>
                </div>
               
                
                <div class="col-lg-6">
                  <div class="form-group"
                    <label class="form-control-label" for="input-last-name">Qualifications</label>
                    <input type="text" name="qualification"  class="form-control" value="{{$doctor[0]->qualification}}" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-last-name">Contact</label>
                    <input type="text" name="contactno"  class="form-control" value="{{$doctor[0]->contactno}}" >
                  </div>
                </div>
                <div class="col-lg-6">
                  <label class="form-control-label" for="input-last-name">Date of Birth</label>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                      </div>
                      <input name="dob" class="form-control datepicker" placeholder="Select date" type="text" value="{{$doctor[0]->dob}}">
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Fee</label>
                  <input type="text" name="fee"  class="form-control" value="{{$doctor[0]->fee}}" >
                </div>
              </div>
              </div>
            </div>
            <hr class="my-4" />
            <!-- Address -->
        
            <!-- Description -->
            <h6 class="heading-small text-muted mb-4">About</h6>
            <div class="pl-lg-4">
              <div class="form-group">
                <label class="form-control-label">About</label>
                <textarea rows="4" name="about" class="form-control" value="{{$doctor[0]->about}}"></textarea>
              </div>
            </div>
            <input id="account" type="submit" placeholder="add" name="submit" class="btn btn-lg btn-success offset-11">
          </form>
        </div>
      </div>
    </div>
  </div>
 
</div>
</div>
  @endsection

  @push('scripts')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
     
    </script>
   
@endpush