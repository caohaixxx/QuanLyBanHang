(function($) {
    "use strict";

    /*--
    currency active
    -----------------------------------*/
    if ($(".currency-wrap").length) {
        var $body2 = $("body"),
            $urdanDropdown2 = $(".currency-wrap"),
            $urdanDropdownMenu2 = $urdanDropdown2.find(".currency-dropdown");
        $urdanDropdown2.on("click", ".currency-active", function(e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass("show")) {
                $this
                    .siblings(".currency-dropdown")
                    .addClass("show")
                    .slideDown()
                    .parent()
                    .addClass("show");
            } else {
                $this
                    .siblings(".currency-dropdown")
                    .removeClass("show")
                    .slideUp()
                    .parent()
                    .removeClass("show");
            }
        });
        /*Close When Click Outside*/
        $body2.on("click", function(e) {
            var $target = e.target;
            if (!$($target).is(".currency-wrap") &&
                !$($target).parents().is(".currency-wrap") &&
                $urdanDropdown2.hasClass("show")
            ) {
                $urdanDropdown2.removeClass("show");
                $urdanDropdownMenu2.removeClass("show").slideUp();
            }
        });
    }

    /*--
    language active
    -----------------------------------*/
    if ($(".language-wrap").length) {
        var $body3 = $("body"),
            $urdanDropdown3 = $(".language-wrap"),
            $urdanDropdownMenu3 = $urdanDropdown3.find(".language-dropdown");
        $urdanDropdown3.on("click", ".language-active", function(e) {
            e.preventDefault();
            var $this = $(this);
            if (!$this.parent().hasClass("show")) {
                $this
                    .siblings(".language-dropdown")
                    .addClass("show")
                    .slideDown()
                    .parent()
                    .addClass("show");
            } else {
                $this
                    .siblings(".language-dropdown")
                    .removeClass("show")
                    .slideUp()
                    .parent()
                    .removeClass("show");
            }
        });
        /*Close When Click Outside*/
        $body3.on("click", function(e) {
            var $target = e.target;
            if (!$($target).is(".language-wrap") &&
                !$($target).parents().is(".language-wrap") &&
                $urdanDropdown3.hasClass("show")
            ) {
                $urdanDropdown3.removeClass("show");
                $urdanDropdownMenu3.removeClass("show").slideUp();
            }
        });
    }

    // Hero slider active
    var sliderActive = new Swiper(".slider-active", {
        loop: true,
        speed: 750,
        effect: "fade",
        slidesPerView: 1,
        navigation: {
            nextEl: ".home-slider-next , .home-slider-next2 , .home-slider-next3",
            prevEl: ".home-slider-prev , .home-slider-prev2 , .home-slider-prev3",
        },
    });

    /*------ Timer active ----*/
    $("#timer-1-active").syotimer({
        year: 2021,
        month: 12,
        day: 31,
        hour: 23,
        minute: 59,
        layout: "hms",
        periodic: false,
        periodUnit: "d",
    });

    // Product slider active 1
    var sliderActiveTwo = new Swiper(".product-slider-active-1", {
        loop: true,
        spaceBetween: 30,
        navigation: {
            nextEl: ".product-next-1",
            prevEl: ".product-prev-1",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    // Brand logo active
    var sliderActiveThree = new Swiper(".brand-logo-active", {
        loop: true,
        spaceBetween: 20,
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
        },
    });

    // Category slider active
    var sliderActiveFour = new Swiper(".category-slider-active", {
        loop: true,
        spaceBetween: 43,
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
        },
    });

    // Category slider active 2
    var sliderActiveFive = new Swiper(".category-slider-active-2", {
        loop: true,
        spaceBetween: 30,
        slidesPerView: 6,
        breakpoints: {
            320: {
                slidesPerView: 2,
            },
            479: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },
        },
    });

    // Product slider active 2
    var sliderActiveSix = new Swiper(".product-slider-active-2", {
        loop: true,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    // Testimonial active
    var sliderActiveSeven = new Swiper(".testimonial-active", {
        loop: true,
        spaceBetween: 30,
        centeredSlides: true,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
            },
        },
    });

    /*----------------------------
        Cart Plus Minus Button
    ------------------------------ */

    var CartPlusMinus = $(".product-quality");
    CartPlusMinus.prepend('<div class="dec qtybuttonn">-</div>');
    CartPlusMinus.append('<div class="inc qtybuttonn">+</div>');

    $('.qty').on('input', function() {
        var data = $(this).val();
        data = Number(data.replace(/\D/g, ""));
        var quantity = Number($(this).closest('.product-details-content').find('.qty-detail').text());
        if (data > quantity) {
            data = quantity;
        }
        $(this).val(data);
    })

    $(".qtybuttonn").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        var quantity = Number($(this).closest('.product-details-content').find('.qty-detail').text());
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
            if (newVal > quantity) {
                newVal = quantity;
            }
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    function formatMoney(n) {
        if (n == 0) {
            return "";
        }
        return n
            .toString()
            .replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }



    /*------ end cart -------- */

    /*------ ScrollUp -------- */
    $.scrollUp({
        scrollText: '<i class=" ti-arrow-up "></i>',
        easingType: "linear",
        scrollSpeed: 900,
        animation: "fade",
    });

    /*-----------------
        Menu Stick
    -----------------*/
    var header = $(".sticky-bar");
    var $window = $(window);
    $window.on("scroll", function() {
        var scroll = $window.scrollTop();
        if (scroll < 200) {
            header.removeClass("stick");
        } else {
            header.addClass("stick");
        }
    });

    /*-------------------------------
       Header Search Toggle
    -----------------------------------*/
    var searchToggle = $(".search-toggle");
    searchToggle.on("click", function(e) {
        e.preventDefault();
        if ($(this).hasClass("open")) {
            $(this).removeClass("open");
            $(this).siblings(".search-wrap-1").removeClass("open");
        } else {
            $(this).addClass("open");
            $(this).siblings(".search-wrap-1").addClass("open");
        }
    });

    /*====== SidebarCart ======*/
    function miniCart() {
        var navbarTrigger = $(".cart-active"),
            endTrigger = $(".cart-close"),
            container = $(".sidebar-cart-active"),
            wrapper = $(".main-wrapper");

        wrapper.prepend('<div class="body-overlay"></div>');

        navbarTrigger.on("click", function(e) {
            e.preventDefault();
            container.addClass("inside");
            wrapper.addClass("overlay-active");
        });

        endTrigger.on("click", function() {
            container.removeClass("inside");
            wrapper.removeClass("overlay-active");
        });

        $(".body-overlay").on("click", function() {
            container.removeClass("inside");
            wrapper.removeClass("overlay-active");
        });
    }
    miniCart();

    /*====== product-color-active ======*/
    $(".product-color-active ul li a").on("click", function(e) {
        e.preventDefault();
        $(".product-color-active ul li a").removeClass("active");
        $(this).addClass("active");
    });

    /*--------------------------
        Isotope active 1
    ---------------------------- */
    $(".grid").imagesLoaded(function() {
        // init Isotope
        $(".grid").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            layoutMode: "masonry",
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: ".grid-sizer",
            },
        });
    });

    /*---------------------
        Price range
    --------------------- */
    var sliderrange = $("#slider-range");
    var amountprice = $("#amount");
    var startprice = $("#start_price");
    var endprice = $("#end_price");
    $(function() {
        sliderrange.slider({
            range: true,
            min: 0,
            max: 99999,
            values: [0, 99999],
            slide: function(event, ui) {
                amountprice.val(ui.values[0] + "đ" + " - " + ui.values[1] + "đ");
                startprice.val(ui.values[0]);
                endprice.val(ui.values[1]);
            },
        });
        amountprice.val(
            sliderrange.slider("values", 0) + "đ" + " - " + sliderrange.slider("values", 1) + "đ"
        );
    });

    /* NiceSelect */
    $(".nice-select").niceSelect();

    /*---- CounterUp ----*/
    $(".count").counterUp({
        delay: 10,
        time: 2000,
    });

    /*---------------------
        Select active
    --------------------- */
    $(".select-two-active").select2();
    $(window).on("resize", function() {
        $(".select-two-active").select2();
    });

    /*--- checkout toggle function ----*/
    $(".checkout-click1").on("click", function(e) {
        e.preventDefault();
        $(".checkout-login-info").slideToggle(900);
    });

    /*--- checkout toggle function ----*/
    $(".checkout-click3").on("click", function(e) {
        e.preventDefault();
        $(".checkout-login-info3").slideToggle(1000);
    });

    /*-------------------------
    Create an account toggle
    --------------------------*/
    $(".checkout-toggle2").on("click", function() {
        $(".open-toggle2").slideToggle(1000);
    });

    $(".checkout-toggle").on("click", function() {
        $(".open-toggle").slideToggle(1000);
    });

    /*-------------------------
    checkout one click toggle function
    --------------------------*/
    var checked = $(".sin-payment input:checked");
    if (checked) {
        $(checked).siblings(".payment-box").slideDown(900);
    }
    $(".sin-payment input").on("change", function() {
        $(".payment-box").slideUp(900);
        $(this).siblings(".payment-box").slideToggle(900);
    });

    // Instantiate EasyZoom instances
    var $easyzoom = $(".easyzoom").easyZoom();

    /*----------------------------------------
        Product details small img slider 1
    -----------------------------------------*/
    var productDetailsSmallOne = new Swiper(
        ".product-details-small-img-slider-1", {
            loop: false,
            spaceBetween: 12,
            slidesPerView: 4,
            direction: "vertical",
            navigation: {
                nextEl: ".pd-next",
                prevEl: ".pd-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        }
    );

    /*----------------------------------------
        Product details big img slider 1
    -----------------------------------------*/
    var productDetailsBigThree = new Swiper(
        ".product-details-big-img-slider-1", {
            autoplay: false,
            delay: 5000,
            slidesPerView: 1,
            loop: false,
            thumbs: {
                swiper: productDetailsSmallOne,
            },
        }
    );

    /*----------------------------------------
        Product details small img slider 2
    -----------------------------------------*/
    var productDetailsSmallTwo = new Swiper(
        ".product-details-small-img-slider-2", {
            loop: false,
            spaceBetween: 20,
            slidesPerView: 4,
            navigation: {
                nextEl: ".pd-next-2",
                prevEl: ".pd-prev-2",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                },
                479: {
                    slidesPerView: 3,
                },
                576: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                },
            },
        }
    );

    /*----------------------------------------
        Product details big img slider 2
    -----------------------------------------*/
    var productDetailsBigTwo = new Swiper(".product-details-big-img-slider-2", {
        autoplay: false,
        delay: 5000,
        slidesPerView: 1,
        loop: false,
        thumbs: {
            swiper: productDetailsSmallTwo,
        },
    });

    // Related product active
    var relatedProductActive = new Swiper(".related-product-active", {
        loop: true,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            },
        },
    });

    /*-----------------------
        Image Popup active
    ------------------------*/
    $(".img-popup").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    /*====== mobile-menu active ======*/
    const slinky = $("#mobile-menu").slinky();
    const slinky2 = $("#mobile-currency").slinky();
    const slinky3 = $("#mobile-language").slinky();

    /*====== off canvas active ======*/
    function mobileMainMenu() {
        var navbarTrigger = $(".mobile-menu-active-button"),
            endTrigger = $(".off-canvas-close"),
            container = $(".off-canvas-active"),
            wrapper = $(".main-wrapper-2");

        wrapper.prepend('<div class="body-overlay-2"></div>');

        navbarTrigger.on("click", function(e) {
            e.preventDefault();
            container.addClass("inside");
            wrapper.addClass("overlay-active-2");
        });

        endTrigger.on("click", function() {
            container.removeClass("inside");
            wrapper.removeClass("overlay-active-2");
        });

        $(".body-overlay-2").on("click", function() {
            container.removeClass("inside");
            wrapper.removeClass("overlay-active-2");
        });
    }
    mobileMainMenu();

    /*-------------------------
      Scroll Animation
    --------------------------*/
    AOS.init({
        once: true,
        duration: 1000,
    });

    //select commue
    $(document).ready(function() {
        $(".choose").on("change", function() {
            var action = $(this).attr("id");
            var map = $(this).val();
            var result = "";
            if (action == "city") {
                result = "district";
            } else {
                result = "wards";
            }
            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').val(),
                },
                url: "/cart/address",
                data: {
                    action: action,
                    map: map,
                },
                success: function(response) {
                    $("#" + result).html(response);
                },
            });
        });
    });

    //giỏ hàng ajax
    $(".add-cart").on("click", function() {
        var auth = $(this).data("auth-check");
        console.log(auth);
        if (auth === 1) {
            var id = $(this).data("id");
            var product_detail_id = $(".color.active").data('id');
            var color = $(".color.active").data('color');
            var product_name = $(".product_name_" + id).val();
            // var product_price_dc = $(".product_price_dc_" + id).val();
            var product_price = Number($(".price-detail").text().replace(/\D/g, ""));
            var product_images = $(".product_images_" + id).val();
            var product_qty = $(".product_qty_" + id).val();

            $.ajax({
                type: "POST",
                headers: {
                    "X-CSRF-Token": $('input[name="_token"]').val(),
                },
                url: "/cart/add",
                data: {
                    id: product_detail_id,
                    name: product_name,
                    price: product_price,
                    // price_dc: product_price_dc,
                    images: product_images,
                    quantity: product_qty,
                    color: color,
                },
                success: function(response) {
                    if (response.status === 200) {
                        toastr.success(response.msg.text, { timeOut: 5000 });
                        $(".cart-content").html(response.html);

                        var sum = 0;
                        $.each(response.data, function(index, value) {
                            sum += value.quantity * value.price;
                        });
                        $(".mini-cart-subtotal").html(formatMoney(sum) + "đ");
                        countMiniCart();
                    } else {
                        toastr.error(response.msg.title, { timeOut: 5000 });
                    }
                },
                error: function(err) {}
            });
        } else {
            sessionStorage.setItem("notLoggin", "true");
            window.location.replace('/customer/login');
        }
    });

    $(document).ready(function() {
        if (window.location.pathname === '/customer/login' && sessionStorage.getItem("notLoggin")) {
            toastr.info('Vui lòng đăng nhập để mua hàng', { timeOut: 5000 });
            sessionStorage.removeItem("notLoggin");
        }
    });

    $(document).ready(function() {
        countMiniCart();
    });

    //mini cart
    function countMiniCart() {
        var value_qty = document.querySelectorAll(".mini-qty");
        var sum = 0;
        $.each(value_qty, function(index, value) {
            sum += Number(value.innerHTML.replace(/\D/g, ""));
        });
        $('.cart-count').html(sum);
    }

    //choose color
    $('.color').on('click', function() {
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-Token": $('input[name="_token"]').val(),
            },
            url: "/chooseColor",
            data: { id: id },
            success: function(response) {
                $('.price-detail').html(formatMoney(response.product.price) + "đ");
                $('.qty-detail').html(response.product.quantity);
            }
        });
    })
    $('.color:eq(0)').addClass('active');

})(jQuery);