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

                <div class="healthcare-content-container">
                    <div class="row gap-2">
                        <div class="col border">
                            <i class="bi bi-clipboard-pulse custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Online Consultation</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-hospital custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Hospital</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-capsule-pill custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Medicines</p>
                        </div>
                        <div class="w-100">
                        </div>
                        <div class="col border">
                            <i class="bi bi-eyedropper custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Pathology Tests</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-droplet-half custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Blood Donors</p>
                        </div>
                        <div class="col border">
                            <i class="bi bi-bell custom-icon-size"></i>
                            <p class="pb-4 second-font-light">Emergency</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
    @section('addition_css')
    @endsection