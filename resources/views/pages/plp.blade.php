@extends('layouts.app-public')
@section('title', 'Shop')
@section('content')
    <div class="site-wrapper-reveal">
        <div class="product-wrapper section-space--ptb_90 border-bottom pb-5 mb-5">
            <div class="container">

                <div class="container text-center p-3 mb-5">
                    <p class="second-font-original color-green second-font-size">Get healthy everyday</p>
                    <h1 class="display-2" style="margin-top: -15px;">All Medicines</h1>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-3 order-md-1 order-2 small-mt__40">
                        <div class="shop-widget widget-shop-publishers p-3 pt-4 second-font-medium" style="background-color: #F5F5F5;">
                            <div class="product-filter shop-widget">
                                <h6 class="mb-20">Suppliers</h6>

                                <select name="_supplier" class="_filter form-select form-select-sm" onchange="getData()">
                                    <option value="" selected>All</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="product-filter shop-widget">
                                <h6 class="mb-20">Medicine Type</h6>

                                <select name="_type" class="_filter form-select form-select-sm" onchange="getData()">
                                    <option value="" selected>All</option>
                                    @foreach($medicine_types as $medicine_type)
                                        <option value="{{ $medicine_type->name }}">{{ $medicine_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="shop-widget">
                                <div class="product-filter widget-price">
                                    <h6 class="mb-20">Price</h6>
                                    <ul class="widget-nav-list">
                                        <li><a href="#" onclick="filterByPrice('under_100k')" style="background-color: rgba(255, 255, 255, 0.664); border: 1px solid rgba(128, 128, 128, 0.379); border-radius: 60px; padding: 10px 15px;">Under IDR 100K</a></li>
                                        <li><a href="#" onclick="filterByPrice('100_500k')" style="background-color: rgba(255, 255, 255, 0.664); border: 1px solid rgba(128, 128, 128, 0.379); border-radius: 60px; padding: 10px 15px;">IDR 100-500K</a></li>
                                        <li><a href="#" onclick="filterByPrice('501_1000k')" style="background-color: rgba(255, 255, 255, 0.664); border: 1px solid rgba(128, 128, 128, 0.379); border-radius: 60px; padding: 10px 15px;">IDR 501K-1000K</a></li>
                                        <li><a href="#" onclick="filterByPrice('above_1000k')" style="background-color: rgba(255, 255, 255, 0.664); border: 1px solid rgba(128, 128, 128, 0.379); border-radius: 60px; padding: 10px 15px;">Above IDR 1000K</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="shop-widget">
                                <div class="product-filter">
                                    <h6 class="mb-10">Stocks</h6>
                                    <div class="blog-tagcloud">
                                        <a href="#" class="selected">Available</a>
                                        <a href="#">Not Available</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-9 order-md-2 order-1">
                        <div class="row-mb-5 second-font-medium">
                            <div class="col-lg-6 col-md-8">
                                <div class="shop-toolbar__items shop-toolbar__item--left">
                                    <div class="shop-toolbar__item shop-toolbar__item--result">
                                        <p class="result-count">
                                            Showing <span id="products_count_start"></span>-<span id="products_count_end"></span>
                                            of <span class="" id="products_count_total"></span>
                                        </p>
                                    </div>

                                    <div class="shop-toolbar__item">
                                        <select name="_sort_by" onchange="getData()" class="_filter form-select form-select-sm">
                                            <option value="name_asc">Sort by A-Z</option>
                                            <option value="name_desc">Sort by Z-A</option>
                                            <option value="latest_added">Sort by latest</option>
                                            <option value="stock">Sort by stock</option>
                                            <option value="price_asc">Sort by price: Low to high</option>
                                            <option value="price_desc">Sort by price: High to low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-4">
                                <div class="header-right-search">
                                    <div class="header-search-box">
                                        <input type="text" name="_search" class="_filter search-field" onkeypress="getDataOnEnter(event)" placeholder="Search medicine or supplier">
                                        <button class="search-icon"><i class="icon-magnifier"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="row" id="product-list"></div>
    
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="page-pagination text-center mt-40" id="product-list-pagination"></ul>
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
    <script src="{{asset('pages/js/plp.js')}}"></script>
@endsection