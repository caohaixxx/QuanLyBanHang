$(function() {
    $(document).on("change", "#order_status", function() {
        document.getElementById("status").submit();
    })
});