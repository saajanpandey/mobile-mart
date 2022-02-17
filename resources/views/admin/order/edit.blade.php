

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
                    <label  class="col-sm-2 col-form-label">Order Status</label>
                    <div class="col-sm-10">
                      <select class="custom-select form-control @error('order_status') is-invalid @enderror" id="orderStatus" name="order_status">
                            <option>Select Status</option>
                            @foreach (Config::get('constants.DELIVERY_STATUS') as $key=>$value))
                            <option value="{{ $key }}" @if(old('order_status') == $key || $key == $order->order_status) selected @endif>{{ $value }}</option>
                            @endforeach
                          </select>
                      @error('order_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row d-none deliveryDate">
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
                  <div class="form-group row d-none returnedDate">
                    <label  class="col-sm-2 col-form-label">Returned Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control datetimepicker @error('returned_date') is-invalid @enderror" name="returned_date" value="{{$order->returned_date??''}}" id="datetimepicker">
                      @error('returned_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                  <div class="form-group row d-none redeliveryDate">
                    <label  class="col-sm-2 col-form-label">Redelivery Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control datetimepicker @error('redelivery_date') is-invalid @enderror" name="redelivery_date" value="{{$order->redelivery_date??''}}" id="datetimepicker">
                      @error('redelivery_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>

                  <div class="form-group row d-none cancelDate">
                    <label  class="col-sm-2 col-form-label">Cancelation Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control datetimepicker @error('cancelation_date') is-invalid @enderror" name="cancelation_date" value="{{$order->cancelation_date??''}}" id="datetimepicker">
                      @error('redelivery_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                    </div>
                  </div>
                 <button type="submit" class="btn btn-primary">Change Order Status</button>
               </form>
         </div>
       </div>
   </div>


 </div>
 @endsection
 @section('scripts')
 <script>
    $(function(){
        function changedStatus()
        {
            let selectedStatus =$('#orderStatus').val();
            console.log(selectedStatus);
            if(selectedStatus==1)
            {
                $('.deliveryDate').addClass('d-none');
                $('.returnedDate').addClass('d-none');
                $('.redeliveryDate').addClass('d-none');
                $('.cancelDate').addClass('d-none');
            }
            if(selectedStatus==2)
            {
                $('.deliveryDate').addClass('d-none');
                $('.returnedDate').addClass('d-none');
                $('.redeliveryDate').addClass('d-none');
                $('.cancelDate').addClass('d-none');

            }if(selectedStatus==3)
            {
                $('.deliveryDate').removeClass('d-none');
                $('.returnedDate').addClass('d-none');
                $('.redeliveryDate').addClass('d-none');
                $('.cancelDate').addClass('d-none');

            }if(selectedStatus==4)
            {
                $('.deliveryDate').addClass('d-none');
                $('.returnedDate').removeClass('d-none');
                $('.redeliveryDate').addClass('d-none');
                $('.cancelDate').addClass('d-none');


            }if(selectedStatus==5)
            {
                $('.deliveryDate').addClass('d-none');
                $('.returnedDate').addClass('d-none');
                $('.redeliveryDate').removeClass('d-none');
                $('.cancelDate').addClass('d-none');
            }
            if(selectedStatus==6)
            {
                $('.deliveryDate').addClass('d-none');
                $('.returnedDate').addClass('d-none');
                $('.redeliveryDate').addClass('d-none');
                $('.cancelDate').removeClass('d-none');
            }
        }
        $(document).on('change', '#orderStatus', function() {
            changedStatus()
        });
    });
</script>
 @endsection






