@extends('layout.master')

@section('addcss')
@endsection

@section('body')
    <div class="contact-us-area pt-100 pb-65">
        <div class="container">
            <div class="section-title-4 text-center mb-50" data-aos="fade-up" data-aos-delay="200">
                <h2>Our Outlet Address! Please Visit Us.</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-us-info-title">
                            <h3>NA Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>475 Nguyễn Trãi, Hà Nội</p>
                            <span>SĐT: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Gờ mở cửa: Thứ 2 – Chủ nhật</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="400">
                        <div class="contact-us-info-title">
                            <h3>DN Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>338, Hai Bà Trưng, Liên Châu, Đà Nẵng</p>
                            <span>Call us: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Gờ mở cửa: Thứ 2 – Chủ nhật</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="contact-us-info-wrap mb-30" data-aos="fade-up" data-aos-delay="600">
                        <div class="contact-us-info-title">
                            <h3>HCM Shop</h3>
                        </div>
                        <div class="contact-us-info">
                            <p>18, Sư Vạn Hạnh, TP. Hồ Chí Minh</p>
                            <span>Call us: +01-234567</span>
                        </div>
                        <div class="contact-us-info">
                            <p>Gờ mở cửa: Thứ 2 – Chủ nhật</p>
                            <span>9 am to 8 pm </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map pt-120" data-aos="fade-up" data-aos-delay="200">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1463669021863"></iframe>
    </div>
    <div class="subscribe-area pb-100">
        
    </div>
@endsection

@section('addjs')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
