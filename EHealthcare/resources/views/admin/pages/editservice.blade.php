@extends('admin.layouts.master')

@section('content')

<div class="col-xl-8 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">add a Service </h3>
          </div>
          <div class="col-4 text-right">
            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          @csrf
          
          <!-- Address -->
      
          <!-- Description -->
          <h6 class="heading-small text-muted mb-4">Service Name</h6>
          <div class="pl-lg-4">
            
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name"> name</label>
                <input type="text" name="name"  class="form-control" placeholder="Service name" >
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name">Fee</label>
                <input type="text" name="fee"  class="form-control" placeholder="Fee" >
              </div>
              <div class="form-group">
                <label class="form-control-label">Add Photo</label>
                <input name="image"type="file" class="form-control" >
              </div>
          </div>
          <input type="submit" name="submit" class="btn btn-lg btn-neutral mr-auto">
        </form>
      </div>
    </div>
  </div>
</div>



@endsection