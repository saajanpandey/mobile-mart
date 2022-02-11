@extends('admin.sidebar')
@section('title')
    Order Status
@endsection
@section('main-content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Order Status</h4>
            <div style="margin-right:10px;">
            <form action="{{route('order.search')}}" method="GET">
                <input type="text" name="datefilter"/>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
            <a href="{{route('order.download')}}" class="btn btn-primary btn-circle .btn-sm ">
                <i class="fa fa-download"></i>
             </a>
             Download Report
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Products</th>
                            <th>Total Price(NPR)</th>
                            <th>Order Date</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th>Delivery Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Mobile Number</th>
                            <th>Products</th>
                            <th>Total Price(NPR)</th>
                            <th>Order Date</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th>Delivery Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->user->first_name.$order->user->last_name??'-'}}</td>
                            <td>{{$order->address??'-'}}</td>
                            <td>{{$order->cellphone_number??'-'}}</td>
                            <td>
                                @foreach ($order->products as $product)
                                    {{$product->name??'-'}}
                                @endforeach
                            </td>
                            <td>{{$order->price??'-'}}</td>
                            <td>{{\Carbon\Carbon::parse($order->order_date)->format('Y-m-d')??'-'}}</td>
                            <td>
                                {{Config::get('constants.PAYMENT_METHOD')[$order->payment_method]}}
                            </td>
                            <td>
                              {{Config::get('constants.DELIVERY_STATUS')[$order->order_status]}}
                            </td>
                            <td>
                                {{$order->delivery_date??'-'}}
                            </td>
                            <td>
                                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-circle mb-2">
                                    <i class="fas fa-pen"></i>
                                </a>
                                {{-- <a href="{{route('order.destroy',$order->id)}}" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a> --}}

                                <a href="{{route('order.show',$order->id)}}" class="btn btn-secondary btn-circle">
                                    <i class="fa fa-eye"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(function() {

      $('input[name="datefilter"]').daterangepicker({
          autoUpdateInput: false,
          locale: {
              cancelLabel: 'Clear'
          }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

    });
    </script>
@endsection

