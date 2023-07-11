<div class="slider-area">
    <div class="slider-active swiper-container">
        <div class="swiper-wrapper">
            @foreach ($sliders as $item)
            <div class="swiper-slide">
                <div class="intro-section slider-height-1 slider-content-center bg-img single-animation-wrap slider-bg-color-2" style="background-image:url({{asset($item->image)}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 hm2-slider-animation">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="home-slider-prev2 main-slider-nav2"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next2 main-slider-nav2"><i class="fa fa-angle-right"></i></div>
            @endforeach
        </div>
    </div>
</div>