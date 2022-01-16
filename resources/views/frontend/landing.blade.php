@inject('products','App\Http\Controllers\ProductsController')

@extends('frontend.layout')
@section('title')
Mobile Mart
@endsection
@section('content')

<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider ptb-240 bg-img" style="background-image:url(/frontend/img/slider/Slider-A.jpg);">
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image:url(/frontend/img/slider/Slider-C.jpg);">
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image:url(/frontend/img/slider/Slider-B.jpg);">
        </div>
    </div>
</div>
<!-- Slider End -->

<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Available Products</h3>
            </div>
        </div>
        <div class="featured-product-active hot-flower owl-carousel product-nav">
            @foreach ($products->getProducts() as $product)
            <div class="product-wrapper">
                <div class="product-img">
                    <a href="product-details.html">
                        <img alt="" src="{{'/uploads/productImages/'.$product->image}}">
                    </a>
                </div>
                <div class="product-content text-left">
                    <div class="product-hover-style">
                        <div class="product-title">
                            <h4>
                                <a href="{{route('products.details',$product->id)}}">{{$product->name}}</a>
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
            </div>
            @endforeach

        </div>
    </div>
</div>


@endsection

