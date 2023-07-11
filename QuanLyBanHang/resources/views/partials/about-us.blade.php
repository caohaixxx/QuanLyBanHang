@extends('layout.master')

@section('addcss')
@endsection

@section('body')
    <div class="banner-area pb-100">
        <div class="bg-img bg-padding-2" style="background-image:url(assets/images/banner/banner.png)">
            <div class="container">
                <div class="banner-content-5 banner-content-5-static">
                    <span data-aos="fade-up" data-aos-delay="200">Up To 40% Off</span>
                    <h1 data-aos="fade-up" data-aos-delay="400">New Furniture <br>Sofa Set</h1>
                    <div class="btn-style-3 btn-hover" data-aos="fade-up" data-aos-delay="600">
                        <a class="btn border-radius-none" href="{{route('shop')}}">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area pb-100">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Testimonial</h2>
            </div>
            <div class="testimonial-active swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial-img">
                                <img src="assets/images/team/dg.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut
                                labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Amrita Sha</h4>
                                <span> Khách hàng.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial-img">
                                <img src="assets/images/team/dg2.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut
                                labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Andi Lane</h4>
                                <span> Designer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial" data-aos="fade-up" data-aos-delay="600">
                            <div class="testimonial-img">
                                <img src="assets/images/team/dg3.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut
                                labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Ted Ellison</h4>
                                <span> Developer.</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-testimonial">
                            <div class="testimonial-img">
                                <img src="assets/images/team/dg4.png" alt="">
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectet adipisicing elit, sed do eiusmod tempo incididunt ut
                                labore et dolore.</p>
                            <div class="testimonial-info">
                                <h4>Aliah Pitts</h4>
                                <span> Customer.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="funfact-area bg-img pt-100 pb-70" style="background-image:url(assets/images/banner/banner2.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="funfact-img">
                            <img src="assets/images/icon-img/client.png" alt="">
                        </div>
                        <h2 class="count">{{$countCustomer}}</h2>
                        <span>{{trans('language.customer')}}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="funfact-img">
                            <img src="assets/images/icon-img/award.png" alt="">
                        </div>
                        <h2 class="count">10</h2>
                        <span>{{trans('language.ward_winning')}}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="funfact-img">
                            <img src="assets/images/icon-img/item.png" alt="">
                        </div>
                        <h2 class="count">{{$countOrderSus}}</h2>
                        <span>{{trans('language.order')}}</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    <div class="single-funfact text-center mb-30 mrgn-none" data-aos="fade-up" data-aos-delay="800">
                        <div class="funfact-img">
                            <img src="assets/images/icon-img/cup.png" alt="">
                        </div>
                        <h2 class="count">{{$countProdut}}</h2>
                        <span>{{trans('language.product')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team-area pt-100 pb-70">
        <div class="container">
            <div class="section-title-2 st-border-center text-center mb-75" data-aos="fade-up" data-aos-delay="200">
                <h2>Our Staff</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="200">
                        <img src="assets/images/team/team1.png" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Kari Rasmus</h3>
                                <span>Sales Man</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="400">
                        <img src="assets/images/team/team2.png" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Kari Rasmus</h3>
                                <span>Sales Man</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="single-team-wrap text-center mb-30" data-aos="fade-up" data-aos-delay="600">
                        <img src="assets/images/team/team3.png" alt="">
                        <div class="team-info-position">
                            <div class="team-info">
                                <h3>Kari Rasmus</h3>
                                <span>Sales Man</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addjs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
