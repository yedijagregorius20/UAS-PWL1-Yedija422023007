@extends('layouts.app-public')
@section('title', 'Product Detail')
@section('content')
    <div class="site-wrapper-reveal">
        <div class="single-product-wrap section-space--pt_90 border-bottom pb-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">

                        <div class="product-details-left">
                            <div class="product-details-images-2 slide-lg-image-2">

                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{asset('assets/images/product/single-product-01.webp')}}" class="popup-img product-img-main-href">
                                            <img src="{{asset('assets/images/product/single-product-01.webp')}}" alt="" class="img-fluid product-img-main-src">
                                        </a>
                                    </div>
                                </div>

                                @for ($i = 0; $i < 3; $i++)
                                    <div class="easyzoom-style">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{asset('assets/images/product/single-product-02.webp')}}" class="popup-img">
                                                <img src="{{asset('assets/images/product/single-product-03.webp')}}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="product-details-thumbs-2 slider-thumbs-2">
                                <div class="sm-image">
                                    <img src="{{asset('assets/images/product/small/1-100x100.webp')}}" alt="product image thumb" class="product-img-main-src">
                                </div>

                                @for ($i = 0; $i < 3; $i++)
                                    <div class="sm-image">
                                        <img src="{{asset('assets/images/product/small/2-100x100.webp')}}" alt="product image thumb">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                        <div class="product-details-content second-font-medium">
                            <h5 class="font-weight--reguler mb-10" id="product-name"></h5>
                            <div class="quickview-ratting-review mb-10">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting" id="product-review-stars"></div>
                                    <a href="#" id="product-review-body-count"></a>
                                </div>
                            </div>

                            <h3 id="product-price" class="price"></h3>

                            <div class="quickview-paragraph mt-10">
                                <p class="third-font-size" id="product-description"></p>
                            </div>

                            <div class="quickview-action-wrap mt-30">
                                <div class="quickview-cart-box">
                                    <div class="quickview-quality product-add-to-cart">
                                        <div class="cart-plus-minus">
                                            <input type="text" name="qtybutton" value="0" class="cart-plus-minus-box">
                                        </div>
                                    </div>

                                    <div class="text-color-primary product-add-to-cart-is-disabled" style="display: none; font-size: 10px">
                                        You may cant buy this item now, but keep it on your whitelist so we can remind you when in stock
                                    </div>

                                    <div class="quickview-button">
                                        <div class="quickview-cart button product-add-to-cart">
                                            <button type="button" class="btn--lg btn--black font-weight--reguler text-white">Add to Cart</button>
                                        </div>

                                        <div class="quickview-wishlist button">
                                            <a href="#" title="Add to wishlist"><i class="icon-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product_meta mt-30">
                                <div class="posted_in item_meta">
                                    <span class="label">Stock: </span>
                                    <span id="product-stock" class="text-color-primary"></span>
                                </div>

                                <div class="posted_in item_meta">
                                    <span class="label">Supplier: </span>
                                    <span id="product-supplier" class="text-color-primary"></span>
                                </div>

                                <div class="tagged-as item_meta">
                                    <span class="label">Medicine Type: </span>
                                    <span id="product-medtype" class="text-color-primary"></span>
                                </div>
                            </div>

                            <div class="product_socials section-space--mt_60">
                                <span class="label">Share this items: </span>
                                <ul class="helendo-social-share socials-inline">
                                    <li>
                                        <a href="#" target="_blank" class="share-facebook helendo-facebook">
                                            <i class="social_facebook"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" target="_blank" class="share-twitter helendo-twitter">
                                            <i class="social_twitter"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" target="_blank" class="share-instagram helendo-instagram">
                                            <i class="social_instagram"></i>
                                        </a>
                                    </li>
                                </ul>
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
    <script src="{{asset('pages/js/pdp.js')}}"></script>
@endsection