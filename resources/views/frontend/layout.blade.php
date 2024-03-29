@inject('carts','App\Http\Controllers\CartController')
@inject('shipping','App\Http\Controllers\Admin\ShippingController')
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/img/logo/logo.png') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/responsive.css') }}">
    <script src="{{ asset('/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link href=" 	https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" rel="stylesheet" />
    <style>
        .pagination {
            float: right;
            margin-top: 10px;
        }

    </style>
</head>

<body>
    <!-- header start -->
    <header class="header-area gray-bg clearfix">
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="logo">
                            <a href="{{ route('first.page') }}">
                                <img alt="" src="{{ asset('/frontend/img/logo/logo.png') }}"
                                    style="width: 80px;  height: 80px;margin: -25px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-6">
                        <div class="header-bottom-right">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        <li class="top-hover"><a href="{{ route('first.page') }}">home</a>
                                        </li>
                                        <li><a href="{{ route('frontend.about-us') }}">about</a></li>

                                        <li><a href="{{ route('frontend.shop') }}">Shop</a></li>

                                        <li><a href="{{ route('frontend.contact-us') }}">contact</a></li>
                                        @if (Route::has('login'))

                                            @auth
                                                <li class="top-hover"><a
                                                        href="{{ route('home') }}">{{ Auth::user()->first_name }}</a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ url('/home') }}">Edit Profile</a></li>
                                                        <li><a href="{{ route('change-password.view') }}">change
                                                                Password</a></li>
                                                        <li><a href="{{ route('user.history') }}">My History</a></li>
                                                        <li><a href="{{ url('logout') }}">logout</a></li>
                                                    </ul>
                                                </li>
                                            @else
                                                <li> <a href="{{ route('login') }}">Log in </a></li>

                                                @if (Route::has('register'))
                                                    <li><a href="{{ route('register') }}">Register</a></li>
                                                @endif
                                            @endauth

                                        @endif
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-currency">
                                <span class="digit">NPR</span>
                            </div>
                            @auth
                                <div class="header-cart">
                                    <a href="#">
                                        <div class="cart-icon">
                                            <i class="ti-shopping-cart"></i>
                                        </div>
                                    </a>
                                    <div class="shopping-cart-content">
                                        <ul>
                                            @foreach ($carts->getCartByUser(Auth::user()->id) as $cart)
                                                <li class="single-shopping-cart">
                                                    <div class="shopping-cart-img">
                                                        <a href="#"><img alt="" style="width:70px;height:70px"
                                                                src="{{ asset('/uploads/productImages/' . $cart->product->image) }}"></a>
                                                    </div>
                                                    <div class="shopping-cart-title">
                                                        <h4><a
                                                                href="{{ route('products.details', $cart->product->id) }}">{{ $cart->product->name }}</a>
                                                        </h4>
                                                        <h6>Qty: {{ $cart->quantity }}</h6>
                                                        @php $sum = ($cart->product->price)*$cart->quantity @endphp
                                                        <span>{{ $sum }}</span>
                                                    </div>
                                                    <div class="shopping-cart-delete">
                                                        <a href="{{ route('cart.destroy', $cart->id) }}"><i
                                                                class="ion ion-close"></i></a>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                        <div class="shopping-cart-total">
                                            <h4>Shipping : <span>{{ $shipping->getShipping()->price ?? 0 }}</span></h4>
                                            @php
                                                $sum = 0;
                                                foreach ($carts->getCartByUser(Auth::user()->id) as $cart) {
                                                    $sum += $cart->product->price * $cart->quantity;
                                                }
                                                $charge = $shipping->getShipping()->price ?? 0;
                                                $finalSum = $sum + $charge;
                                            @endphp
                                            <h4>Total : <span class="shop-total">{{ $finalSum }}</span></h4>
                                        </div>
                                        <div class="shopping-cart-btn">
                                            @if ($carts->getCartByUser(Auth::user()->id)->count() > 0)
                                                <a href="{{ route('frontend.cart') }}">view cart</a>
                                                <a href="{{ route('user.checkout') }}">checkout</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                                <li><a href="{{ route('first.page') }}">HOME</a>
                                </li>
                                <li><a href="{{ route('frontend.contact-us') }}"> Contact us </a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer style Start -->
    <footer class="footer-area pt-75 gray-bg-3">
        <div class="footer-top gray-bg-3 pb-35">
            <div class="container">
                <div class="row">
                    @auth
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget mb-40">
                                <div class="footer-title mb-25">
                                    <h4>My Account</h4>
                                </div>

                                <div class="footer-content">
                                    <ul>
                                        <li><a href="{{ route('home') }}">My Account</a></li>
                                        <li><a href="{{ route('frontend.cart') }}">My Cart</a></li>
                                        <li><a href="{{ route('user.history') }}">My History</a></li>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    @endauth
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget mb-40">
                            <div class="footer-title mb-25">
                                <h4>Information</h4>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li><a href="{{ route('frontend.about-us') }}">About Us</a></li>
                                    <li><a href="{{ route('frontend.contact-us') }}">For Queries</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-widget-red footer-black-color mb-40">
                            <div class="footer-title mb-25">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="footer-about">
                                <p>Mobile Bazar, Pako Sadak, Kathmandu 44600</p>
                                <div class="footer-contact mt-20">
                                    <ul>
                                        <li>4461828</li>
                                        <li>4223269</li>
                                    </ul>
                                </div>
                                <div class="footer-contact mt-20">
                                    <ul>
                                        <li>kypimo@mailinator.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom pb-25 pt-25 gray-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p><a target="_blank" href="{{ route('first.page') }}">Copyright &copy; Mobile Mart
                                    2021</a></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-img f-right">
                            <a href="#">
                                <img alt="" src="assets/img/icon-img/payment.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer style End -->

    <!-- all js here -->
    <script src="{{ asset('/frontend/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/popper.js') }}"></script>
    <script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/frontend/js/plugins.js') }}"></script>
    <script src="{{ asset('/frontend/js/main.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>

</body>

</html>
