  @extends('admin.sidebar')
  @section('title')
Create Brand
  @endsection
  @section('main-content')
  <div class="mx-auto" style="width: 700px;">
    <div class="card shadow">
        <div class="card-header">
          Create Brand
          <a href="{{route('brands.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
        </div>
        <div class="card-body">
            <form class="form-inline" action="{{route('brands.store')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
        </div>
      </div>
  </div>


</div>
@endsection
