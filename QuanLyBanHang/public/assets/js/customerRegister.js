$(function () {
    $(".customerRegisterVali").validate({
        rules: {
            cusname: {
                required: true,
                maxlength: 200,
                minlength: 1,
            },
            cusemail: {
                required: true,
                email: true,
            },
            cusphone: {
                required: true,
                rangelength: [10,11],
            },
            cuspassword: {
                required: true,
            },
        },
        messages: {
            cusname: {
                required: "Họ tên không được phép để trống",
                maxlength: "Họ tên chỉ được tối đa 200 ký tự",
                minlength: "Họ tên chỉ được tối thiểu 1 ký tự",
            },
            cusemail: {
                required: "email không được phép để trống",
                email: "Phải đúng định dạng là email",
            },
            cusphone: {
                required: "SĐT không được phép để trống",
                rangelength: "Vui lòng nhập SĐT từ 10 đến 11 chữ số!",
            },
            cuspassword: {
                required: "Mật khẩu không được phép để trống",
                maxlength: "Mật khẩu chỉ được tối đa 255 ký tự",
                minlength: "Mật khẩu chỉ được tối thiểu 6 ký tự",
            },
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
});
