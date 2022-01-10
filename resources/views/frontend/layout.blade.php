<!doctype html>
<html class="no-js" lang="zxx">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Mobile Mart</title>
        <meta name="description" content="">
        <meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/chosen.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/ionicons.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('/frontend/assets/css/responsive.css')}}">
        <script src="{{asset('/frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <!-- header start -->
        <header class="header-area gray-bg clearfix">
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="logo">
                                <a href="index.html">
                                    <img alt="" src="assets/img/logo/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-6">
                            <div class="header-bottom-right">
                                <div class="main-menu">
                                    <nav>
                                        <ul>
                                            <li class="top-hover"><a href="{{route('first.page')}}">home</a>
                                            </li>
                                            <li><a href="{{route('frontend.about-us')}}">about</a></li>


                                            <li><a href="{{route('frontend.contact-us')}}">contact</a></li>
                                            @if (Route::has('login'))

                                                @auth
                                                  <li class="top-hover"><a href="{{ url('/home') }}" >{{Auth::user()->name}}</a>
                                                  <ul class="submenu">
                                                    <li><a href="{{url('logout')}}">logout</a></li>
                                                    <li><a href="">Edit Profile</a></li>
                                                </ul>
                                            </li>
                                                @else
                                                <li> <a href="{{ route('login') }}" >Log in </a></li>

                                                    @if (Route::has('register'))
                                                      <li><a href="{{ route('register') }}">Register</a></li>
                                                    @endif
                                                @endauth

                                        @endif
                                        </ul>
                                    </nav>
                                </div>
								<div class="header-currency">
									<span class="digit">NP</span>
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
                    <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                            <a href="#"><img alt="" src="assets/img/cart/cart-1.jpg"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="#">Phantom Remote </a></h4>
                            <h6>Qty: 02</h6>
                            <span>$260.00</span>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="ion ion-close"></i></a>
                        </div>
                    </li>
                    <li class="single-shopping-cart">
                        <div class="shopping-cart-img">
                            <a href="#"><img alt="" src="assets/img/cart/cart-2.jpg"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="#">Phantom Remote</a></h4>
                            <h6>Qty: 02</h6>
                            <span>$260.00</span>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="ion ion-close"></i></a>
                        </div>
                    </li>
                </ul>
                <div class="shopping-cart-total">
                    <h4>Shipping : <span>$20.00</span></h4>
                    <h4>Total : <span class="shop-total">$260.00</span></h4>
                </div>
                <div class="shopping-cart-btn">
                    <a href="cart-page.html">view cart</a>
                    <a href="checkout.html">checkout</a>
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
                                    <li><a href="{{route('first.page')}}">HOME</a>
                                    </li>
                                    <li><a href="{{route('frontend.contact-us')}}"> Contact us </a></li>
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
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="footer-widget mb-40">
                                        <div class="footer-title mb-25">
                                            <h4>My Account</h4>
                                        </div>
                                        <div class="footer-content">
                                            <ul>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="about-us.html">Order History</a></li>
                                                <li><a href="wishlist.html">WishList</a></li>
                                                <li><a href="#">Newsletter</a></li>
                                                <li><a href="about-us.html">Order History</a></li>
                                                <li><a href="#">International Orders</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="footer-widget mb-40">
                                        <div class="footer-title mb-25">
                                            <h4>Information</h4>
                                        </div>
                                        <div class="footer-content">
                                            <ul>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="#">Delivery Information</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Terms & Conditions</a></li>
                                                <li><a href="#">Customer Service</a></li>
                                                <li><a href="#">Return Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="footer-widget mb-40">
                                        <div class="footer-title mb-25">
                                            <h4>Quick Links</h4>
                                        </div>
                                        <div class="footer-content">
                                            <ul>
                                                <li><a href="#">Support Center</a></li>
                                                <li><a href="#">Term & Conditions</a></li>
                                                <li><a href="#">Shipping</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Help</a></li>
                                                <li><a href="#">FAQS</a></li>
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
                                            <p>Your current address goes to here,120 haka, angladesh</p>
                                            <div class="footer-contact mt-20">
                                                <ul>
                                                    <li>(+008) 254 254 254 25487</li>
                                                    <li>(+009) 358 587 657 6985</li>
                                                </ul>
                                            </div>
                                            <div class="footer-contact mt-20">
                                                <ul>
                                                    <li>yourmail@example.com</li>
                                                    <li>example@admin.com</li>
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
                                        <p><a target="_blank" href="{{route('first.page')}}">Copyright &copy; Mobile Mart 2021</a></p>
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
                <script src="{{asset('/frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
                <script src="{{asset('/frontend/js/popper.js')}}"></script>
                <script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
                <script src="{{asset('/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
                <script src="{{asset('/frontend/js/isotope.pkgd.min.js')}}"></script>
                <script src="{{asset('/frontend/js/ajax-mail.js')}}"></script>
                <script src="{{asset('/frontend/js/owl.carousel.min.js')}}"></script>
                <script src="{{asset('/frontend/js/plugins.js')}}"></script>
                <script src="{{asset('/frontend/js/main.js')}}"></script>
            </body>

        </html>
