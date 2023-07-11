<div class="breadcrumb-area bg-gray-4 breadcrumb-padding-1">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2 data-aos="fade-up" data-aos-delay="200">{{$item}}</h2>
            <ul data-aos="fade-up" data-aos-delay="400">
                <li><a href="{{route('home')}}">{{trans('language.home')}}</a></li>
                <li><i class="ti-angle-right"></i></li>
                <li>{{$item}}</li>
            </ul>
        </div>
    </div>
    <div class="breadcrumb-img-1" data-aos="fade-right" data-aos-delay="200">
        <img src="/images/banner-trai.png" alt="">
    </div>
    <div class="breadcrumb-img-2" data-aos="fade-left" data-aos-delay="200">
        <img src="/images/banner-phai.png" alt="">
    </div>
</div>