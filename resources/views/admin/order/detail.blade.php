@extends('admin.sidebar')
@section('title')
    Order Detail
@endsection
@section('main-content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <h4 class="m-0 font-weight-bold text-primary mr-auto">Order Detail</h4>
            <a href="{{route('order.index')}}"><button class="close" type="button">
                <span aria-hidden="true">×</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>

                        <tr>
                            <th scope="col" width="25%">Field</th>
                            <th scope="col">Value</th>
                        </tr>
                        <tr>
                            <td>Customer Name</td>
                            <td>{{$order->user->first_name.$order->user->last_name??'-'}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$order->address??'-'}}</td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>{{$order->cellphone_number??'-'}}</td>
                        </tr>
                        <tr>
                            <td>Products</td>
                            <td> @foreach ($order->products as $product)
                                {{$product->name??'-'}}
                            @endforeach
                            </td>
                        </tr>
                            <tr>
                                <td>Total Price(NPR)</td>
                                <td>{{$order->price??'-'}}</td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td>{{\Carbon\Carbon::parse($order->order_date)->format('Y-m-d')??'-'}}</td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td>
                                    {{Config::get('constants.PAYMENT_METHOD')[$order->payment_method]}}
                                </td>
                            </tr>
                            <tr>
                                <td>Order Status</td>
                                <td>
                                    {{Config::get('constants.DELIVERY_STATUS')[$order->order_status]}}
                                  </td>
                            </tr>
                            <td>Delivery Date</td>
                            <td>
                                {{$order->delivery_date??'-'}}
                            </td>
                        </tr>
                        <tr>
                            <td>Returned Date</td>
                            <td>{{$order->returned_date??'-'}}</td>
                        </tr>
                        <tr>
                            <td>Redeliver Date</td>
                            <td>{{$order->redelivery_date??'-'}}</td>
                        </tr>
                        <tr>
                            <td>Cancelation Date</td>
                            <td>{{$order->cancelation_date??'-'}}</td>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
