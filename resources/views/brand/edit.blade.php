@extends('admin.sidebar')
@section('title')
Edit Brand
 @endsection
@section('main-content')

  <div class="d-flex justify-content-center">
    <div class="card shadow">
        <div class="card-header">
          Edit Brand
          <a href="{{route('brands.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
        </div>
        <div class="card-body">
            <form class="form-inline" action="{{route('brands.update',$brand->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$brand->name}}">
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
      </div>
  </div>


</div>
@endsection






