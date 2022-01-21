@inject('histories','App\Http\Controllers\UserHistoryController')
@extends('frontend.layout')
@section('title')
    My History
@endsection
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>MY HISTORY</h3>
            <ul>
                <li><a href="{{route("first.page")}}">Home</a></li>
                <li class="active">My History</li>
            </ul>
        </div>
    </div>
</div>
{{-- @foreach ($histories->getHistoryByUser(Auth::user()->id) as $history)

    @endforeach --}}
    <div class="checkout-area pb-80 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <form  action="{{route('order.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">My history</a></h5>
                                </div>
                                <div id="payment-6" class="panel-collapse collapse show">
                                    <div class="panel-body">
                                        <div class="order-review-wrapper">
                                            <div class="order-review">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="width-1">Product Name</th>
                                                                <th class="width-2">Total Price</th>
                                                                <th class="width-3">Ordered Date</th>
                                                                <th class="width-4">Delivery Date</th>
                                                                <th class="width-5">Returned Date</th>
                                                                <th class="width-6">Redelivery Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($histories->getHistoryByUser(Auth::user()->id) as $history)

                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        @foreach ($history->order->products as $product)
                                                                        <p>{{$product->name??''}}</p>
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-price">
                                                                        <p>{{$history->order->price??'--'}}</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>{{$history->order->order_date??'--'}}</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>{{$history->order->delivery_date??'--'}}</p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <p>{{$history->order->returned_date??'--'}}</p>
                                                                    </div>
                                                                </td><td>
                                                                    <div class="o-pro-qty">
                                                                        <p>{{$history->redelivery_date??'--'}}</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
