

 @extends('admin.sidebar')
 @section('title')
     Edit Product
 @endsection
 @section('main-content')

   <div class="mx-auto" style="width: 700px;">
     <div class="card shadow">
         <div class="card-header">
           Edit Product
           <a href="{{route('products.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
         </div>
         <div class="card-body ">
             <form action="{{route('products.update',$product->id)}}" method="POST" enctype='multipart/form-data'>
                 @method('PUT')
                 @csrf
                 <div class="form-group row">
                    <label  class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{$product->name}}">
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
                      <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price}}">
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
                        <select class="form-control @error('brand_id') is-invalid @enderror" name="brand_id">
                            <option>Select Brand</option>
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id || $brand->id == $product->brand_id) selected @endif>{{ $brand->name }}</option>
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
                    <label  class="col-sm-2 col-form-label">Product Description</label>
                    <div class="col-sm-10">
                      <textarea name="description" id="my-editor" cols="30" rows="10"  class=" my-editor @error('description') is-invalid @enderror">{{$product->description}}</textarea>
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
                            <option value="1" @if($product->status==1 ) selected @endif>Enable</option>
                            <option value="0"@if($product->status==0 ) selected @endif>Disable</option>
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
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$product->image}}"/>
                        @error('image')
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






