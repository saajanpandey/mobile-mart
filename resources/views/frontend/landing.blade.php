@inject('products','App\Http\Controllers\ProductsController')

@extends('frontend.layout')

@section('content')

<!-- Slider Start -->
<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1.jpg);">
            <div class="container">
                <div class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink matcha.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
        <div class="single-slider ptb-240 bg-img" style="background-image:url(assets/img/slider/slider-1-1.jpg);">
            <div class="container">
                <div class="slider-content slider-animated-1">
                    <h1 class="animated">Want to stay <span class="theme-color">healthy</span></h1>
                    <h1 class="animated">drink matcha.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetu adipisicing elit sedeiu tempor inci ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider End -->

<div class="product-area bg-image-1 pt-100 pb-95">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Available Phones</h3>
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

