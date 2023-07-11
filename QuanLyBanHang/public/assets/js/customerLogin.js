$(function () {
    $(".customerLoginVali").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
        },
        messages: {
            email: {
                required: "email không được phép để trống",
                email: "Phải đúng định dạng là email",
            },
            password: {
                required: "Mật khẩu không được phép để trống",
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
