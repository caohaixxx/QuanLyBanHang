(function ($) {
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Mật khẩu không trùng khớp");
        } else {
            confirm_password.setCustomValidity("");
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    $(document).ready(function () {
        let tab_id = $('input[name="href-tab"]').val();
        let dashboad = $('a[href="#dashboad"]');
        let account = $('a[href="#account_info"]');
        let password = $('a[href="#password_change"]');
        switch (tab_id) {
            case "account":
                dashboad.removeClass("active");
                account.addClass("active");
                $("#dashboad").removeClass("active");
                $("#account_info").addClass("show active");
                break;
            case "password":
                dashboad.removeClass("active");
                password.addClass("active");
                $("#dashboad").removeClass("active");
                $("#password_change").addClass("show active");
                break;
            default:
                $('.a[href="#dashboad"]').tab("show");
                break;
        }
    });

    $(".accountInfoVali").validate({
        rules: {
            full_name: {
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
        },
        messages: {
            full_name: {
                required: "Họ tên không được phép để trống",
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
            minlength: "Mật khẩu chỉ được tối thiểu 6 ký tự",
        },
        errorClass: "invalid-alert text-danger",
        errorElement: "div",
        errorPlacement: function (error, element) {
            console.log(element);
            if (element.data("select2")) {
                element.parent().append(error);
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            form.submit();
        },
    });

    // $(".accountInfoVali").validate({
    //     rules: {
    //         full_name: {
    //             required: true,
    //             maxlength: 200,
    //             minlength: 1,
    //         },
    //         email: {
    //             required: true,
    //             email: true,
    //         },
    //         phone: {
    //             required: true,
    //             rangelength: [10, 11],
    //         },
    //     },
    //     messages: {
    //         full_name: {
    //             required: "Họ tên không được phép để trống",
    //             maxlength: "Họ tên chỉ được tối đa 200 ký tự",
    //             minlength: "Họ tên chỉ được tối thiểu 1 ký tự",
    //         },
    //         email: {
    //             required: "email không được phép để trống",
    //             email: "Phải đúng định dạng là email",
    //         },
    //         phone: {
    //             required: "SĐT không được phép để trống",
    //             rangelength: "Vui lòng nhập SĐT từ 10 đến 11 chữ số!",
    //         },
    //         minlength: "Mật khẩu chỉ được tối thiểu 6 ký tự",
    //     },
    //     errorClass: "invalid-alert text-danger",
    //     errorElement: "div",
    //     errorPlacement: function (error, element) {
    //         console.log(element);
    //         if (element.data("select2")) {
    //             element.parent().append(error);
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    //     submitHandler: function (form) {
    //         form.submit();
    //     },
    // });
})(jQuery);
