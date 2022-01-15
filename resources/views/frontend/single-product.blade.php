@inject('comments','App\Http\Controllers\CommentController' )
@extends('frontend.layout')
@section('title')
    Product Information
@endsection
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>{{$product->name}}</h3>
            <ul>
                <li><a href="{{route('first.page')}}">Home</a></li>
                <li class="active">{{$product->name}}</li>
            </ul>
        </div>
    </div>
</div>
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="{{asset('/uploads/productImages/'.$product->image)}}" data-zoom-image="{{asset('/uploads/productImages/'.$product->image)}}" alt="product image not available"/>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4>{{$product->name}}</h4>
                    <div class="rating-review">

                    </div>
                    <span>NPR {{$product->price}}</span>
                    <div class="in-stock">

                    </div>
                    @auth
                    <form action="{{route('cart.store')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="productId" id="" value="{{$product->id}}">
                        <input type="hidden" name="email" id="" value="{{Auth::user()->email}}">
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="quantity">
                        </div>

                        <div class="shop-list-cart-wishlist">
                            <button class="btn  btn-outline-success" style="height:39px" type="Submit">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                        {!! $errors->first('quantity', '<div class="error-block" style="color:red">:message</div>') !!}
                    </div>
                    </form>
                    @else
                    <form action="{{route('cart.store')}}" method="POST" >
                        @csrf
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="quantity">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <button class="btn  btn-outline-success" style="height:39px" type="Submit">Add To Cart <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    </form>
                    @endauth
                    <div class="pro-dec-categories">
                        <ul>
                            <li class="categories-title">Brand:</li>
                            <li>{{$product->brand->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        {!!$product->description!!}
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        @foreach ($comments->getCommentByPost($product->id) as $comment)
                        <div class="sin-rattings">
                            <div class="star-author-all">
                                <div class="ratting-star f-left">
                                </div>


                                <div class="ratting-author f-right">
                                    <h3>{{$comment->user->name}}</h3>
                                    <span>{{\Carbon\Carbon::parse($comment->created_at)->format('H:i')}}</span>
                                    <span>{{\Carbon\Carbon::parse($comment->created_at)->format('d M Y')}}</span>
                                </div>

                            </div>
                            <p>{{$comment->title}}
                            </p>

                        </div>
                        @endforeach
                    </div>
                    @auth
                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                            <form action="{{route('comments.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" value="{{$product->id}}" name="postId">
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Name" type="text" value="{{Auth::user()->name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="rating-form-style mb-20">
                                            <input placeholder="Email" type="text" value="{{Auth::user()->email}}"  name="email" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="rating-form-style form-submit">
                                            <textarea name="title" placeholder="Message" class="form-control @error('title') is-invalid @enderror"></textarea>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                            <input type="submit" value="add review">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

