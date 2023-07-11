<header class="header-area header-responsive-padding header-height-1">
    @php
        $categorys = App\Models\Category::all();
        $brands = App\Models\Brand::all();
    @endphp
    <div class="header-bottom sticky-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="main-menu text-center">
                        <nav>
                            <ul>
                                <li><a href="/">HOME</a>
                                </li>
                                <li><a href="{{ route('shop') }}">SHOP</a>
                                    
                                </li>
                                <li><a href="{{route('front.about')}}">ABOUT</a></li>
                                <li><a href="{{route('front.contact')}}">CONTACT US</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="header-action-wrap">
                        <div class="header-action-style header-search-1">
                            <a class="search-toggle" href="#">
                                <i class="pe-7s-search s-open"></i>
                                <i class="pe-7s-close s-close"></i>
                            </a>
                            <div class="search-wrap-1">
                                <form action="">
                                    <input name="search" placeholder="Search products…" type="text"
                                        value="{{ request('search') }}">
                                    <button type="submit" class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="main-menu header-action-style">
                            <nav>
                                <ul>
                                    <li>
                                        @if (Auth::guard('customer')->check())
                                        <a title="Login Register" href="#" ><i class="pe-7s-user"></i></a>
                                        <ul class="sub-menu-style" style="width: 135px; height: 100px; ">
                                            <li><a href="{{route('customer.account')}}" style="font-size:15px">Thông tin</a></li>
                                            <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{route('customer.logout')}}" style="font-size:15px ">Đăng xuất</a></li>
                                              <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                                                @csrf
                                              </form>
                                        </ul>
                                        @else
                                        <a title="Login Register" href="{{ route('customer.auth') }}"><i class="pe-7s-user"></i></a>
                                        @endif
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-action-style header-action-cart">
                            <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                <span class="product-count bg-black cart-count">0</span>
                            </a>
                        </div>
                        <div class="header-action-style d-block d-lg-none">
                            <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
