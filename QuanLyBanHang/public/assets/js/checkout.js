(function($) {
    
     getSession();

    const VND = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    });

     function getSession() {
        var value_item = sessionStorage.getItem("cartDetail");
        var value_coupon = sessionStorage.getItem("coupon");
         $.ajax({
            type: "GET",
            url: "/cart/checkout",
            data: { value_item: value_item, value_coupon: value_coupon },
            dataType: "JSON",
            success: function(response) {
                carts = response.carts;
                var html = '';
                var sum = 0;
                var listCart = [];
                carts.forEach(function(cart) {
                    html += `<li>` + cart.product_name + ` X ` + cart.quantity + `(` +
                        cart.color + `)` + ` <span> ` + VND.format(cart.price * cart.quantity).replaceAll(".", ",") + ` </span></li> `;
                    var subtotal = cart.price * cart.quantity;
                    sum += subtotal;
                    listCart.push(cart.cartDetailId);
                });
                $('.your-order-middle').find('ul').html(html);
                $('.your-order-middle').find('ul').append(`<input type="hidden" name="cart_detail" value=` + listCart + `>`)
                $('.your-order-info.order-subtotal').find('ul').find('li').find('span').html(VND.format(sum).replaceAll(".", ","))
                if (response.coupon) {
                    var coupon = (sum * response.coupon.value) / 100;
                } else {
                    var coupon = 0
                }
                var total = sum - coupon;
                $('.your-order-info.order-shipping').find('ul').find('li').find('p').html(VND.format(coupon).replaceAll(".", ","));
                $('.your-order-info.order-total').find('ul').find('li').find('span').html(VND.format(total).replaceAll(".", ","));
                $('input[name="total"]').val(total);
                paypal.Buttons({
                    style: {
                        shape: 'rect',
                        color: 'gold',
                        layout: 'vertical',
                        label: 'paypal',
        
                    },
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: `${Math.round(total/23000, 2)}` // Can also reference a variable or function
                                }
                            }]
                        });
                    },
        
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            const transaction = orderData.purchase_units[0].payments.captures[0];
                            alert(
                                `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                            );
                        });
                    }
                }).render('#paypal-button-container');
            },
            
        });
    }

    $(function() {
        $(".checkoutVali").validate({
            rules: {
                fullname: {
                    required: true,
                    maxlength: 200,
                    minlength: 1,
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                    rangelength: [10, 11],
                },
                city: {
                    required: true,
                },
                district: {
                    required: true,
                },
                wards: {
                    required: true,
                },
                address: {
                    required: true,
                    maxlength: 100,
                }
            },
            messages: {
                fullname: {
                    required: "Tên không được phép để trống",
                    maxlength: "Họ tên chỉ được tối đa 200 ký tự",
                    minlength: "Họ tên chỉ được tối thiểu 1 ký tự",
                },
                email: {
                    required: "email không được phép để trống",
                    email: "Phải đúng định dạng là email",
                },
                phone: {
                    required: "SĐT không được phép để trống",
                    rangelength: "Vui lòng nhập SĐT từ 10 đến 11 chữ số!",
                },
                city: {
                    required: 'Thành phố/Tỉnh không được phép để trống',
                },
                district: {
                    required: 'Quận/Huyện không được phép để trống',
                },
                wards: {
                    required: 'Phường/Xã không được phép để trống',
                },
                address: {
                    required: 'Địa chỉ không được phép để trống',
                    maxlength: 'Địa chỉ tối đa 100 ký tự',
                }
            },
            errorClass: "invalid-alert text-danger",
            errorElement: "div",
            errorPlacement: function(error, element) {
                console.log(element);
                if (element.data("select2")) {
                    element.parent().append(error);
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            },
        });
    });
    

})(jQuery);