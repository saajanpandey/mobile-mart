

 @extends('admin.sidebar')
 @section('title')
     Edit Order Status
 @endsection
 @section('main-content')

   <div class="mx-auto" style="width: 700px;">
     <div class="card shadow">
         <div class="card-header">
           Edit Order Status
           <a href="{{route('order.index')}}"><button class="close" type="button">
            <span aria-hidden="true">×</span>
        </button></a>
         </div>
         <div class="card-body">
             <form  action="{{route('order.update',$order->id)}}" method="POST">
                 @method('PUT')
                 @csrf
                 <div class="form-group row">
                     <label  class="col-sm-2 col-form-label">Delivery Date</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control datetimepicker @error('delivery_date') is-invalid @enderror" name="delivery_date" value="{{$order->delivery_date??''}}" id="datetimepicker">
                       @error('delivery_date')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                      @enderror
                     </div>
                   </div>
                   <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Order Status</label>
                    <div class="col-sm-10">
                        <select class="custom-select form-control @error('order_status') is-invalid @enderror" id="inputGroupSelect01" name="order_status">
                            <option>Select Status</option>
                            <option value="1" @if($order->order_status==1 ) selected @endif>Customer Order</option>
                            <option value="2" @if($order->order_status==2 ) selected @endif>On Way To Deliver</option>
                            <option value="3"@if($order->order_status==3 ) selected @endif>Delivered</option>
                            <option value="4"@if($order->order_status==4 ) selected @endif>Product Returned</option>
                            <option value="5"@if($order->order_status==5) selected @endif>Re Delivery</option>
                          </select>
                      @error('order_status')
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






