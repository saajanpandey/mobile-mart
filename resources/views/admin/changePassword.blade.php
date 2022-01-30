@extends('admin.sidebar')
@section('title')
Edit Profile
@endsection
@section('main-content')
<div class="mx-auto" style="width: 700px;">
    <div class="card shadow">
        <div class="card-header">
          Change Password
          <a href="{{route('admin.dash')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
        </div>
        <div class="card-body">
            <form class="form-inline" action="{{route('admin.password')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" >
                      @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" >
                      @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" >
                      @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Reset Password</button>
              </form>
        </div>
      </div>
  </div>


</div>
@endsection
