@inject('carts','App\Http\Controllers\CartController' )
@inject('shipping', 'App\Http\Controllers\Admin\ShippingController')
@extends('frontend.layout')
@section('title')
    Checkout
@endsection
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>CHECKOUT</h3>
            <ul>
                <li><a href="{{route('first.page')}}">Home</a></li>
                <li class="active">CHECKOUT</li>
            </ul>
        </div>
    </div>
</div>
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
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">billing and checkout</a></h5>
                            </div>
                            <div id="payment-2" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>First Name</label>
                                                    <input type="text" value="{{Auth::user()->first_name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Last Name</label>
                                                    <input type="text" value="{{Auth::user()->last_name}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Email Address</label>
                                                    <input type="email" value="{{Auth::user()->email}}">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                                                    @error ('address')
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Phone Number</label>
                                                    <input type="text" name="cellphone_number"class="form-control @error('cellphone_number') is-invalid @enderror">
                                                    @error ('cellphone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                                  @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Payment Method</label>
                                                    <select class="custom-select form-control @error('payment_method') is-invalid @enderror" id="inputGroupSelect01" name="payment_method">
                                                        <option>Select Payment Method</option>
                                                        @foreach (Config::get('constants.PAYMENT_METHOD') as $key=>$value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                        @endforeach
                                                      </select>
                                                      @error ('payment_method')
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-6">Order Review</a></h5>
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
                                                            <th class="width-2">Price</th>
                                                            <th class="width-3">Qty</th>
                                                            <th class="width-4">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($carts->getCartByUser(Auth::user()->id) as $cart)
                                                        <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                                        <tr>
                                                            <td>
                                                                <div class="o-pro-dec">
                                                                    <p>{{$cart->product->name}}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="o-pro-price">
                                                                    <p>{{$cart->product->price}}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="o-pro-qty">
                                                                    <p>{{$cart->quantity}}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @php $totalPrice = ($cart->product->price)*$cart->quantity @endphp
                                                                <div class="o-pro-subtotal">
                                                                    <p>{{$totalPrice}}</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        @php
                                                         $sum=0;
                                                         foreach ($carts->getCartByUser(Auth::user()->id) as $cart) {
                                                             $sum += ($cart->product->price) * $cart->quantity;
                                                                    }
                                                        $charge =$shipping->getShipping()->price ?? 0;
                                                        $finalSum = $sum+ $charge;
                                                        @endphp
                                                        <tr>
                                                            <td colspan="3">Subtotal </td>
                                                            <td colspan="1">{{$sum}}</td>
                                                        </tr>
                                                        <tr class="tr-f">
                                                            <td colspan="3">Shipping & Handling (Flat Rate - Fixed)</td>
                                                            <td colspan="1">{{$charge}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">Grand Total</td>
                                                            <td colspan="1"><input type="hidden" readonly value="{{$finalSum}}" name="price" >{{$finalSum}}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="billing-back-btn">
                                                <span>
                                                    Forgot an Item?
                                                    <a href="{{route('frontend.shop')}}">Go to Shop</a>

                                                </span>
                                                <div class="billing-btn">
                                                    <button type="submit">Continue</button>
                                                </div>
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
