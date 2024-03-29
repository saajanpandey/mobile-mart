  @extends('admin.sidebar')
  @section('title')
  Create Product
  @endsection
  @section('main-content')

   <div class="mx-auto" style="width: 700px;">
     <div class="card shadow">
         <div class="card-header">
           Create Product
           <a href="{{route('products.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
         </div>
         <div class="card-body ">
             <form action="{{route('products.store')}}" method="POST" enctype='multipart/form-data'>
                 @csrf
                 <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" >
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                      @error('price')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Product Brand</label>
                    <div class="col-sm-10">
                        <select class="custom-select form-control @error('brand_id') is-invalid @enderror" id="inputGroupSelect01" name="brand_id">
                            <option>Select Brand</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                          </select>
                          @error ('brand_id')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label ">Product Description</label>
                    <div class="col-sm-10">
                      <textarea name="description" id="my-editor" cols="30" rows="10" class="my-editor @error('description') is-invalid @enderror"></textarea>
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Product Status</label>
                    <div class="col-sm-10">
                        <select class="custom-select form-control @error('status') is-invalid @enderror" id="inputGroupSelect01" name="status">
                            <option>Select Status</option>
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                          </select>
                          @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"/>
                        @error('image')
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
