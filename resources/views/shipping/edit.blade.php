@extends('admin.sidebar')
@section('title')
    Edit Shipping Charge
@endsection
@section('main-content')

 <div class="mx-auto" style="width: 700px;">
   <div class="card shadow">
       <div class="card-header">
         Update Shipping Charge
         <a href="{{route('shipping.index')}}"><button class="close" type="button">
          <span aria-hidden="true">×</span>
      </button></a>
       </div>
       <div class="card-body ">
           <form action="{{route('shipping.update',$shipping->id)}}" method="POST" enctype='multipart/form-data'>
            @method("PUT")
               @csrf
               <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Shipping Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$shipping->name}}">
                    @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                   @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Shipping Price</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$shipping->price}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Remarks</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('remarks') is-invalid @enderror" name="remarks" value="{{$shipping->remarks}}">
                    @error('remarks')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
       </div>
     </div>
 </div>


</div>
@endsection
