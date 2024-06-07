@extends('layouts.app-public')
@section('title', 'Home')
    @section('content')
        <div class="site-wrapper-reveal">
            <div class="jumbotron-img text-center mb-5">
                <h1 class="display-4 pb-4 text-center" style="padding-top: 60px;">The place where <br>your health matters most.</h1>
                <button type="button" class="btn btn-outline-success outlined">MORE ABOUT US</button>
            </div>

            <div class="healthcare-services-container p-5 mb-5 text-center">
                <div class="healthcare-title-container">
                    <p class="second-font-original color-green second-font-size">Best-in-class</p>
                    <h1 class="display-4 text-center mb-3" style="margin-top: -25px;">Healthcare Services</h1>
                    <p class="second-font-original third-font-size mb-5" style="font-weight: 400; opacity: 0.6;">Discover everything you need all in one convenient place to enhance your well-being.<br> Your journey to better health starts now!</p>
                </div>

                <div class="container healthcare-content-container">
                    <div class="row gap-2">
                        <div class="col border">
                            <i class="bi bi-clipboard-pulse custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Online Consultation</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-hospital custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Hospital</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-capsule-pill custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Medicines</p>
                        </div>
                        <div class="w-100">
                        </div>
                        <div class="col border">
                            <i class="bi bi-eyedropper custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Pathology Tests</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-droplet-half custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Blood Donors</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-bell custom-icon-size"></i>
                            <p class="pb-4 second-font-medium">Emergency</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-box-area mb-5">
                <div class="container" style="max-width: 1195px !important;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hero-area" id="product-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container pharmacy-statistics-container">
                <div class="row p-5 gap-5">
                    <div class="col-sm stats-item">
                        <h1 class="color-orange pb-3">5+</h1>
                        <p class="color-white second-font-light">Year of Experience</p>
                    </div>
                    <div class="col-sm stats-item">
                        <h1 class="color-orange pb-3">300+</h1>
                        <p class="color-white second-font-light">Healthcare Practitioners</p>
                    </div>
                    <div class="col-sm stats-item">
                        <h1 class="color-orange pb-3">500+</h1>
                        <p class="color-white second-font-light">Satisfied Clients</p>
                    </div>
                    <div class="col-sm stats-item">
                        <h1 class="color-orange pb-3">100+</h1>
                        <p class="color-white second-font-light">Awards</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-container mb-5">
                <p class="second-font-original color-green second-font-size text-center">Hear from our patients</p>
                <h1 class="display-4 text-center mb-3" style="margin-top: -25px;">Testimonial & Stories</h1>

                <div class="container testimonial-content-container mt-5">
                    <div class="row">

                        <div class="col-sm card-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header d-flex justify-content-between gap-2 mb-3" style="height: 45px !important; background-color: #ff954a27 !important;">
                                        <h5 class="card-title second-font-original second-font-size">Sarah Johnson</h5>
                                        
                                        <div>
                                            @for ($i = 0; $i < rand(4,5); $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                    <p class="card-text second-font-light third-font-size">I had an amazing experience at this pharmacy. The staff was incredibly knowledgeable and went above and beyond to help me find the right medication. The service was fast, and the prices were very reasonable. Highly recommend!</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm card-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header d-flex justify-content-between gap-2 mb-3" style="height: 45px !important; background-color: #ff954a27 !important;">
                                        <h5 class="card-title second-font-original second-font-size">Mark Thompson</h5>
                                        
                                        <div>
                                            @for ($i = 0; $i < rand(4,5); $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                    <p class="card-text second-font-light third-font-size">This is by far the best pharmacy I’ve ever been to. The pharmacists are friendly and always willing to answer my questions. They also offer a wide range of products, and I always find what I need. Excellent customer service!</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm card-item">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header d-flex justify-content-between gap-2 mb-3" style="height: 45px !important; background-color: #ff954a27 !important;">
                                        <h5 class="card-title second-font-original second-font-size">Emily Davis</h5>
                                        
                                        <div>
                                            @for ($i = 0; $i < rand(4,5); $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    
                                    <p class="card-text second-font-light third-font-size">I love the convenience of this pharmacy. The online prescription refill option is fantastic, and my medications are always ready on time. The staff is courteous, and the store is always clean and well-organized.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="our-member-area section-space--pb_120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="member--box">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-4">
                                        <div class="section-title small-mb__40 tablet-mb__40">
                                            <h4 class="section-title">
                                                Join our membership program today!
                                            </h4>
                                            <p>Sign up and enjoy 50% off on your first purchase at our pharmacy.</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-8">
                                        <div class="member-wrap">
                                            <form action="#" class="member--two">
                                                <input type="text" class="input-box" placeholder="Your email address">
                                                <button class="submit-btn"><i class="icon-arrow-right"></i></button>
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
    @endsection
    @section('addition_css')
    @endsection
    @section('addition_script')
    <script src="{{asset('pages/js/home.js')}}"></script>
    @endsection