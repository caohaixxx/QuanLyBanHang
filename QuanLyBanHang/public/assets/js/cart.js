(function($) {
    $(document).on("click", ".check_item", function() {
        var item_id = $(this).attr("id");
        var cart_qty = $(this).closest("tr").find(".qty").val();
        var car_pro_price = $(this).closest("tr").find(".qty").data("price");
        var sum_item = car_pro_price * cart_qty;
        $(this).val(sum_item);
        var item = document.querySelectorAll("input[name=check]:checked");
        var sum = 0;
        $.each(item, function(index, value) {
            sum += Number(value.value);
            $(".sumCart").html(VND.format(sum).replaceAll(".", ","));
            if ($('input[name="coupon_code"]').val().length == 0) {
                $(".total-coupon").html(VND.format(sum).replaceAll(".", ","));
            }
        });
        if (item.length == 0) {
            $(".sumCart").html(VND.format(0).replaceAll(".", ","));
            $(".total-coupon").html(VND.format(0).replaceAll(".", ","));
        }
    });

    //cart mini
    var CartPlusMinus = $(".product-quality");
    CartPlusMinus.prepend('<div class="dec qtybutton">-</div>');
    CartPlusMinus.append('<div class="inc qtybutton">+</div>');

    $(".qty").on("input", function() {
        var data = $(this).val();
        data = Number(data.replace(/\D/g, ""));
        var quantity = Number(
            $(this)
            .closest(".product-details-content")
            .find(".qty-detail")
            .text()
        );
        if (data > quantity) {
            data = quantity;
        }
        $(this).val(data);
    });

    //button qty
    $(".qtybutton").on("click", function() {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();
        if ($button.text() === "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);

        updatedCart($(this).closest(".cart-quality"));
        if ($('input[name="coupon_code"]').val().length) {
            addCoupon();
        }
    });

    //coupon
    $(".add-coupon").on("click", function() {
        addCoupon();
        var xxx = $('input[name="coupon_code"]').val();
        console.log(xxx);
        if ($('input[name="coupon_code"]').val().length != 0) {
            sessionStorage.setItem("coupon", xxx);
        }
    });

    function addCoupon() {
        var coupon = $('input[name="coupon_code"]').val();
        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-Token": $('input[name="_token"]').val(),
            },
            url: "/add-coupon",
            data: {
                coupon: coupon,
            },
            success: function(response) {
                var value_code = document.querySelector(".sumCart");
                var value = Number(value_code.innerHTML.replace(/\D/g, ""));
                if (response.status === 200) {
                    var value_coupon = value * Number(response.data / 100);
                    var total = value - value_coupon;
                    $(".value-coupon").html(
                        VND.format(value_coupon).replaceAll(".", ",")
                    );
                    $(".total-coupon").html(
                        VND.format(total).replaceAll(".", ",")
                    );
                } else {
                    $(".value-coupon").html("");
                    $(".total-coupon").html(
                        VND.format(value).replaceAll(".", ",")
                    );
                    toastr.error(response.msg.text, { timeOut: 5000 });
                }
            },
        });
    }
    const VND = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
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
        $(".cart-count").html(sum);
    }

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

    //update cart
    function updatedCart(item) {
        var cart_qty = item.find(".qty").val();
        var cart_pro_id = item.find(".qty").data("id");
        var car_pro_price = item.find(".qty").data("price");
        $.ajax({
            type: "GET",
            url: "cart/update",
            data: { id: cart_pro_id, qty: cart_qty, price: car_pro_price },
            success: function(response) {
                item.closest("tr")
                    .find(".cart-pro-subtotal")
                    .html(VND.format(response.subtotal).replaceAll(".", ","));
                item.closest("tr").find("input[name=check]:checked").val(response.subtotal);
                var sum = 0;
                var item_check = document.querySelectorAll("input[name=check]:checked");
                $.each(item_check, function(index, value) {
                    sum += Number(value.value);
                    $(".sumCart").html(VND.format(sum).replaceAll(".", ","));
                    if ($('input[name="coupon_code"]').val().length == 0) {
                        $(".total-coupon").html(VND.format(sum).replaceAll(".", ","));
                    }
                });
            },
            error: function(error) {},
        });
    }

    $('.theme-color').on('click', function() {
        var list = [];
        var item = document.querySelectorAll("input[name=check]:checked");
        $.each(item, function(index, value) {
            list.push(value.attributes.id.value)
        });
        sessionStorage.setItem("cartDetail", list);
    })

})(jQuery);