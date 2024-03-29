
@extends('frontend.layout')
@section('title')
    My Account
@endsection
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>MY ACCOUNT</h3>
            <ul>
                <li><a href="{{route("first.page")}}">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                    <form action="{{route('user.update',Auth::user()->id)}}" method="POST">
                                        @method("PUT")
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>First Name</label>
                                                    <input type="text" value="{{Auth::user()->first_name}}" name="first_name">
                                                    @if ($errors->has('first_name'))
                                                      <div class="alert alert-danger">{{$errors->first('first_name') }}</div>
                                                     @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Last Name</label>
                                                    <input type="text" value="{{Auth::user()->last_name}}" name="last_name">
                                                    @if ($errors->has('last_name'))
                                                    <div class="alert alert-danger">{{$errors->first('last_name') }}</div>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Email Address</label>
                                                    <input type="email"  name="email" value="{{Auth::user()->email}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="{{route('first.page')}}"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
