@inject('products','App\Http\Controllers\ProductsController')
@extends('frontend.layout')
@section('content')
<div class="breadcrumb-area bg-image-3 ptb-150">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>OUR Products</h3>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Our Products</li>
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
                </div>
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            @foreach ($products->getProductPagination() as $product)
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
                        {!!$products->getProductPagination()->links()!!}
                </div>
            </div>
            {{-- <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Shop By Categories</h4>
                        <div class="shop-catigory">
                            <ul id="faq">
                                <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Morning Tea <i class="ion-ios-arrow-down"></i></a>
                                    <ul id="shop-catigory-1" class="panel-collapse collapse show">
                                        <li><a href="#">Green</a></li>
                                        <li><a href="#">Herbal</a></li>
                                        <li><a href="#">Loose </a></li>
                                        <li><a href="#">Mate</a></li>
                                        <li><a href="#">Organic</a></li>
                                    </ul>
                                </li>
                                <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Tea Trends<i class="ion-ios-arrow-down"></i></a>
                                    <ul id="shop-catigory-2" class="panel-collapse collapse">
                                        <li><a href="#">Pu'Erh</a></li>
                                        <li><a href="#">Black</a></li>
                                        <li><a href="#">White</a></li>
                                        <li><a href="#">Yellow Tea</a></li>
                                        <li><a href="#">Puer Tea</a></li>
                                    </ul>
                                </li>
                                <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Most Tea Map <i class="ion-ios-arrow-down"></i></a>
                                    <ul id="shop-catigory-3" class="panel-collapse collapse">
                                        <li><a href="#">Green Tea</a></li>
                                        <li><a href="#">Oolong Tea</a></li>
                                        <li><a href="#">Black Tea</a></li>
                                        <li><a href="#">Pu'erh Tea </a></li>
                                        <li><a href="#">Dark Tea</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">Herbal Tea</a> </li>
                                <li> <a href="#">Rooibos Tea</a></li>
                                <li> <a href="#">Organic Tea</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Price Filter</h4>
                        <div class="price_filter mt-25">
                            <span>Range:  $100.00 - 1.300.00 </span>
                            <div id="slider-range"></div>
                            <div class="price_slider_amount">
                                <div class="label-input">
                                    <input type="text" id="amount" name="price"  placeholder="Add Your Price" />
                                </div>
                                <button type="button">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Brand</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Green </a>
                                <li><input type="checkbox"><a href="#">Herbal </a></li>
                                <li><input type="checkbox"><a href="#">Loose </a></li>
                                <li><input type="checkbox"><a href="#">Mate </a></li>
                                <li><input type="checkbox"><a href="#">Organic </a></li>
                                <li><input type="checkbox"><a href="#">White  </a></li>
                                <li><input type="checkbox"><a href="#">Yellow Tea </a></li>
                                <li><input type="checkbox"><a href="#">Puer Tea </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">By Color</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <li><input type="checkbox"><a href="#">Black </a></li>
                                <li><input type="checkbox"><a href="#">Blue </a></li>
                                <li><input type="checkbox"><a href="#">Green </a></li>
                                <li><input type="checkbox"><a href="#">Grey </a></li>
                                <li><input type="checkbox"><a href="#">Red</a></li>
                                <li><input type="checkbox"><a href="#">White  </a></li>
                                <li><input type="checkbox"><a href="#">Yellow   </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Compare Products</h4>
                        <div class="compare-product">
                            <p>You have no item to compare. </p>
                            <div class="compare-product-btn">
                                <span>Clear all </span>
                                <a href="#">Compare <i class="fa fa-check"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                        <h4 class="shop-sidebar-title">Popular Tags</h4>
                        <div class="shop-tags mt-25">
                            <ul>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Oolong</a></li>
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Pu'erh</a></li>
                                <li><a href="#">Dark </a></li>
                                <li><a href="#">Special</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
