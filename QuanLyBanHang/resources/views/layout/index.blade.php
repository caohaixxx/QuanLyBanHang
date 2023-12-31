@extends('layout.master')

@section('body')

    @include('partials.slide-home')
    
    <div class="category-area bg-gray-4 pt-95 pb-100">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>{{trans('language.cate')}}</h2>
            </div>
            <div class="category-slider-active-2 swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($categorys as $category)
                        <div class="swiper-slide">
                            <div class="single-category-wrap-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="category-img-2">
                                    <a href="{{route('shop.category', ['slugCate' => $category->slug])}}">
                                        <img class="category-normal-img" src="{{ $category->images }}"alt="">
                                        <img class="category-hover-img" src="{{ $category->images }}"alt="">
                                    </a>
                                </div>
                                <div class="category-content-2 category-content-2-black">
                                    <h4><a href="{{route('shop.category', ['slugCate' => $category->slug])}}">{{ $category->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-95 pb-60">
        <div class="container">
            <div class="section-title-tab-wrap mb-75" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title-2">
                    <h2>{{trans('language.pro_hot')}}</h2>
                </div>
            </div>

            <div class="tab-content jump">
                <div id="pro-1" class="tab-pane active">
                    <div class="row">
                        @foreach ($productHots as $productHot)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                <div class="product-wrap mb-35" data-aos="fade-up" data-aos-delay="200">
                                    @include('partials.product-item', ['product' => $productHot])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div id="pro-2" class="tab-pane">
                    <div class="row">

                    </div>
                </div>
                <div id="pro-3" class="tab-pane">
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{route('shop')}}"><img src="assets/images/banner/banner-nho.png" alt=""></a>
                        <div class="banner-content-5">
                            <span>Up To 40% Off</span>
                            <h2>Dining Furniture</h2>
                            <div class="btn-style-3 btn-hover">
                                <a class="btn hover-border-radius" href="{{route('shop')}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="banner-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <a href="{{route('shop')}}"><img src="assets/images/banner/banner-nho2.png" alt=""></a>
                        <div class="banner-content-5">
                            <span>Up To 40% Off</span>
                            <h2>Bed Furniture</h2>
                            <div class="btn-style-3 btn-hover">
                                <a class="btn hover-border-radius" href="{{route('shop')}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pb-95">
        <div class="container">
            <div class="section-border section-border-margin-1" data-aos="fade-up" data-aos-delay="200">
                <div class="section-title-timer-wrap bg-white">
                    <div class="section-title-1">
                        <h2>{{trans('language.pro_new')}}</h2>
                    </div>
                </div>
            </div>
            <div class="product-slider-active-1 swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($productNews as $productNew)
                        <div class="swiper-slide">
                            <div class="product-wrap">
                                @include('partials.product-item', ['product' => $productNew])
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="product-prev-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                        class="fa fa-angle-left"></i></div>
                <div class="product-next-1 product-nav-1" data-aos="fade-up" data-aos-delay="200"><i
                        class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="banner-area pb-100">
        <div class="bg-img bg-padding-2" style="background-image:url(assets/images/banner/banner.png)">
            <div class="container">
                <div class="banner-content-5 banner-content-5-static">
                    <span data-aos="fade-up" data-aos-delay="200">Up To 40% Off</span>
                    <h1 data-aos="fade-up" data-aos-delay="400">New Furniture <br>Sofa Set</h1>
                    <div class="btn-style-3 btn-hover" data-aos="fade-up" data-aos-delay="600">
                        <a class="btn hover-border-radius" href="{{route('shop')}}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo-area pb-95">
        <div class="container">
            <div class="brand-logo-active swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($brands as $brand)
                        <div class="swiper-slide">
                            <div class="single-brand-logo" data-aos="fade-up" data-aos-delay="200">
                                <a href="#"><img src="{{ $brand->images }}" alt=""></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="blog-area pb-70">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>{{trans('language.news')}}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-1.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>05 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Lorem ipsum dolor consectet.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo
                                et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-2.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>06 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Duis et volutpat pellentesque.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo
                                et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="blog-img-date-wrap mb-25">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="assets/images/blog/blog-3.png" alt=""></a>
                            </div>
                            <div class="blog-date">
                                <h5>07 <span>May</span></h5>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li><a href="#">Furniture</a>,</li>
                                    <li>By:<a href="#"> Admin</a></li>
                                </ul>
                            </div>
                            <h3><a href="blog-details.html">Vivamus vitae dolor convallis.</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipi elit, sed do eiusmod tempor incididunt ut labo
                                et dolore magna aliqua.</p>
                            <div class="blog-btn-2 btn-hover">
                                <a class="btn hover-border-radius theme-color" href="blog-details.html">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('addjs')
    <script src="{{asset('assets/js/main.js')}}"></script>
@endsection
