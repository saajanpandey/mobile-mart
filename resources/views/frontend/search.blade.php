
@extends('frontend.layout')
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>Search</h3>
            <ul>
                <li><a href="{{route('first.page')}}">Home</a></li>
                <li class="active">Search</li>
            </ul>
        </div>
    </div>
</div>

<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-topbar-wrapper">
                    <div class="shop-topbar-left">
                        <ul class="view-mode">
                            <li class="active"><a href="#product-grid" data-view="product-grid"><i class="fa fa-th"></i></a></li>
                            <li><a href="#product-list" data-view="product-list"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                    <div class="product-sorting-wrapper">
                        <form action="{{route('search.product')}}" method="GET">

                            <div class="form-row">
                              <div class="col-7">
                                <input type="text" class="form-control" placeholder="Search" name="keyword">
                              </div>
                              <div class="col">
                                <button type="submit" style="margin: -10px;height: 35px;margin-top: 1px;" class="btn btn-success">Search</button>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            @foreach ($searches as $product)
                            <div class="product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="product-details.html">
                                            <img alt="" src="{{asset('/uploads/productImages/'.$product->image)}}">
                                        </a>
                                    </div>
                                    <div class="product-content text-left">
                                        <div class="product-hover-style">
                                            <div class="product-title">
                                                <h4>
                                                    <a href="product-details.html">{{$product->name}}</a>
                                                </h4>
                                            </div>
                                            <div class="cart-hover">
                                                <h4><a href="{{route('products.details',$product->id)}}">+ Add to cart</a></h4>
                                            </div>
                                        </div>
                                        <div class="product-price-wrapper">
                                            <span>NPR {{$product->price}}</span>
                                        </div>
                                    </div>
                                    <div class="product-list-details">
                                        <h4>
                                            <a href="product-details.html">{{$product->name}}</a>
                                        </h4>
                                        <div class="product-price-wrapper">
                                            <span>NPR {{$product->price}}</span>
                                        </div>
                                        <p>{!!$product->description!!}</p>
                                        <div class="shop-list-cart-wishlist">
                                            <a href="{{route('products.details',$product->id)}}" title="Add To Cart"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                        {!!$searches->links()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
