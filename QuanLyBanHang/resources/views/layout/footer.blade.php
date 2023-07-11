<footer class="footer-area">
    <div class="bg-gray-2">
        <div class="container">
            <div class="footer-top pt-80 pb-35">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-about mb-40">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{asset('assets/images/logo/logo.png')}}" alt="logo"></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, cons adipi elit, sed do eiusmod tempor incididunt ut aliqua.</p>
                            <div class="payment-img">
                                <a href="#"><img src="{{asset('assets/images/icon-img/payment.png')}}" alt="logo"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                            <h3 class="footer-title">Thông tin</h3>
                            <ul>
                                <li><a href="about-us.html">Home</a></li>
                                <li><a href="{{ route('shop') }}">Shop</a></li>
                                <li><a href="{{route('front.about')}}">About us</a></li>
                                <li><a href="{{route('front.contact')}}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-list mb-40">
                            <h3 class="footer-title">Tài khoản</h3>
                            <ul>
                                <li><a href="{{route('customer.account')}}">Chi tiết tài khoản</a></li>
                                <li><a href="{{route('customer.account')}}">Lịch sử mua hàng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget footer-widget-margin-2 footer-address mb-40">
                            <h3 class="footer-title">Liên hệ</h3>
                            <ul>
                                <li><span>Địa chỉ: </span>475 Nguyễn Trãi, Hà Nội </li>
                                <li><span>SĐT:</span> (012) 345 6789</li>
                                <li><span>Email: </span>demo@example.com</li>
                            </ul>
                            <div class="open-time">
                                <p>Open : <span>9:00 AM</span> - Close : <span>08:00 PM</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-3">
        <div class="container">
            <div class="footer-bottom copyright text-center bg-gray-3">
                <p>Copyright ©2021 All rights reserved | Made with <i class="fa fa-heart"></i> by <a href="https://hasthemes.com/"> HasThemes</a>.</p>
            </div>
        </div>
    </div>
</footer>