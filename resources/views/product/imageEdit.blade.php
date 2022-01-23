

 @extends('admin.sidebar')
 @section('title')
     Edit Product Image
 @endsection
 @section('main-content')

   <div class="mx-auto" style="width: 700px;">
     <div class="card shadow">
         <div class="card-header">
           Edit Product Image
           <a href="{{route('products.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
         </div>
         <div class="card-body ">
             <form action="{{route('products.update.image',$product->id)}}" method="POST" enctype='multipart/form-data'>
                 @method('PUT')
                 @csrf
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
                  <button type="submit" class="btn btn-primary">Update Image</button>
               </form>
         </div>
       </div>
   </div>


 </div>
 @endsection






