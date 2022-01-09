

 @extends('admin.sidebar')
 @inject('brands','App\Models\Brand')
 @section('main-content')

   <div class="mx-auto" style="width: 700px;">
     <div class="card shadow">
         <div class="card-header">
           Edit Product
         </div>
         <div class="card-body ">
             <form action="{{route('products.update',$product->id)}}" method="POST">
                 @method('PUT')
                 @csrf
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="price" value="{{$product->price}}">
                    </div>
                  </div>
                  <select name="cars" class="custom-select mb-3">
                    <option selected>Select Brand</option>
                    <option value="volvo">Volvo</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                  </select>

               </form>
         </div>
       </div>
   </div>


 </div>
 @endsection






