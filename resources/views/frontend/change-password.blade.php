@extends('frontend.layout')
@section('title')
    Change Password
@endsection
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Change Password</h3>
            <ul>
                <li><a href="{{route("first.page")}}">Home</a></li>
                <li class="active">Change Password</li>
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
                                <h5 class="panel-title"><a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <form action="{{route('user.password')}}" method="POST">
                                            @csrf
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Current Password</label>
                                                    <input type="password" name="current_password">
                                                </div>
                                                @if ($errors->has('current_password'))
                                                <div class="alert alert-danger">{{$errors->first('current_password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_password">
                                                </div>
                                                @if ($errors->has('new_password'))
                                                <div class="alert alert-danger">{{$errors->first('new_password') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="new_confirm_password">
                                                </div>
                                                @if ($errors->has('new_confirm_password'))
                                                <div class="alert alert-danger">{{$errors->first('new_confirm_password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="{{route('first.page')}}"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit">Change Password</button>
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
