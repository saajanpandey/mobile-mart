

 @extends('admin.sidebar')
@section('main-content')

  <div class="d-flex justify-content-center">
    <div class="card shadow">
        <div class="card-header">
          Edit Brand
        </div>
        <div class="card-body">
            <form class="form-inline" action="{{route('brands.update',$brand->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="inputPassword6">Brand Name</label>
                  <input type="text"  class="form-control mx-sm-3" name="name" value="{{$brand->name}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
  </div>


</div>
@endsection






