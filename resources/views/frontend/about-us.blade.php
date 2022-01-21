@extends('frontend.layout')
@section('title')
About Us
@endsection
@section('content')

		<!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-3 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>ABOUT US</h3>
                    <ul>
                        <li><a href="{{route('first.page')}}">Home</a></li>
                        <li class="active">About us </li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
		<!-- About Us Area Start -->
        <div class="about-us-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 d-flex align-items-center">
                        <div class="overview-content-2">
							<h4>Welcome To</h4>
                            <h2>Mobile Mart</h2>
                            <p class="peragraph-blog">We are an authorised and genuine smartphone distributor located at Pako, NewRoad, Kathmandu. We keep our customers at the heart of everything we do and make sure we deliver the quality over quantity with many exciting offers as per festive and hot sales season. We started this store back in 2017 with a vision of one stop smartphone shop with both Andriod and iOS phones ranging from pocket friendly, mid-tier flagship killer to absolute flagship of a smartphone. We provide a year warranty services with free tempered glass on each of our purchases. Our delivery rates are superior than our competition and we tend to be of services to our customers in all the best way possible. Happy Shopping ! </p>
                            {{-- <div class="overview-btn mt-40">
                                <img src="assets/img/icon-img/signature.png" alt="Candidate Signature">
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-12">
                        <div class="overview-img text-center">
                            <a href="#">
                                <img src="assets/img/banner/about-us.jpg" alt="">
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
		<!-- About Us Area End -->
		<!-- Team Area Start -->
		{{-- <div class="team-area pt-95 pb-70">
            <div class="container">
                <div class="product-top-bar section-border mb-50">
                    <div class="section-title-wrap style-two text-center">
                        <h3 class="section-title">Team Members</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="assets/img/team/team-1.jpg" alt="">
                                </a>
                                <div class="team-action">
                                    <a class="action-plus facebook" href="#">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                    <a class="action-heart twitter" title="Wishlist" href="#">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                    <a class="action-cart instagram" href="#">
                                        <i class="ion-social-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Mr.Mike Banding</h4>
                                <span>Manager </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="assets/img/team/team-2.jpg" alt="">
                                </a>
                                <div class="team-action">
                                    <a class="action-plus facebook" href="#">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                    <a class="action-heart twitter" title="Wishlist" href="#">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                    <a class="action-cart instagram" href="#">
                                        <i class="ion-social-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Mr.Peter Pan</h4>
                                <span>Developer </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="assets/img/team/team-3.jpg" alt="">
                                </a>
                                <div class="team-action">
                                    <a class="action-plus facebook" href="#">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                    <a class="action-heart twitter" title="Wishlist" href="#">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                    <a class="action-cart instagram" href="#">
                                        <i class="ion-social-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Ms.Sophia</h4>
                                <span>Designer </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
		<!-- Team Area End -->

@endsection
