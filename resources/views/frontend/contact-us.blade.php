@extends('frontend.layout')

@section('content')
            <!-- Breadcrumb Area Start -->
            <div class="breadcrumb-area bg-image-3 ptb-150">
                <div class="container">
                    <div class="breadcrumb-content text-center">
                        <h3>CONTACT US</h3>
                        <ul>
                            <li><a href="{{route('first.page')}}">Home</a></li>
                            <li class="active">Contact us </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb Area End -->
            <!-- Contact Area Start -->
            <div class="contact-us ptb-95">
                <div class="container">
                    <div class="row">
                        <!-- Contact Form Area Start -->
                        <div class="col-lg-6">
                            <div class="small-title mb-30">
                                <h2>Contact Form</h2>
                                <p>For queries and feedback</p>
                            </div>
                            <form  action="{{route('contact.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full Name" type="text">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" type="email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style mb-20">
                                            <input class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" type="text">
                                            @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style">
                                            <textarea class="form-control @error('message') is-invalid @enderror"name="message" placeholder="Message"></textarea>
                                            @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                            <button class="submit" type="submit">SEND MESSAGE</button>                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Contact Form Area End -->
                        <!-- Contact Address Strat -->
                        <div class="col-lg-6">
                            <div class="small-title mb-30">
                                <h2>Contact Address</h2>
                                <p>The ways to reach us.</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="contact-information mb-30">
                                        <h4>Our Address</h4>
                                        <p>Mobile Bazar, Pako Sadak, Kathmandu 44600</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="contact-information contact-mrg mb-30">
                                        <h4>Phone Number</h4>
                                        <p>
                                            <a href="tel:9774461828">4461828</a>
                                            <a href="tel:9774223269">4223269</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="contact-information contact-mrg mb-30">
                                        <h4>Web Address</h4>
                                        <p>
                                            <a href="mailto:kypimo@mailinator.com">kypimo@mailinator.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Contact Address Strat -->
                        <!-- Google Map Start -->
                        <div class="col-md-12">
                            <div id="store-location">
                                <div class="contact-map pt-80">
                                    {{-- <div id="map"> --}}
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.4867457372166!2d85.30796981506192!3d27.70225398279407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bf178e8649%3A0xaaa328b8225ad982!2sTamrakar%20Mobile%20Complex!5e0!3m2!1sen!2snp!4v1642145269895!5m2!1sen!2snp" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Google Map Start -->
                    </div>
                </div>
            </div>
            <!-- Contact Area Start -->
@endsection
