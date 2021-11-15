$(document).ready(function () {
    $("#coupon-button").click(function () {
        $("#cover-spin").show(0);
        var totalPriceIni = document.getElementById("tTotal-price").innerHTML;
        var code = $("#coupon-value").val();
        var letterNumber = /^[0-9a-zA-Z]+$/;
        if (code === "") {
            alert("Please enter a coupon code first .!");
            $("#cover-spin").hide(0);
            return false;
        } else if (code.length < 6 || code.length > 7) {
            alert("please enter a valid coupon code .!");
            $("#cover-spin").hide(0);
            return false;
        } else if (!code.match(letterNumber)) {
            alert("please enter a valid coupon code .!");
            $("#cover-spin").hide(0);
            return false;
        } else {
            $.ajax({
                url: "api/check-coupon-value.php",
                method: "post",
                data: { couponCode: code, totalPrice: totalPriceIni },
                success: function (response) {
                    var obj = jQuery.parseJSON(response);
                    if(obj.discountPrice === 0 && obj.status === "failMin") {
                        $("#cover-spin").hide(0);
                        $("#validity").html('<span style="color: red">Minimum Order Required Rs. : ' + obj.min + ' to avail this coupon code.</span>');
                    } 
                    if(obj.discountPrice === 0 && obj.status === "fail") {
                        $("#cover-spin").hide(0);
                        $("#validity").html('<span style="color: red">Coupon Code Invalid .!</span>');
                    } 
                    if(obj.discountPrice !== "0" && obj.status === "true") {
                        $("#cover-spin").hide(0);
                        document.getElementById("coupon-price").innerHTML = parseFloat(obj.discountPrice).toFixed(2);
                        var dFee = document.getElementById("delivery-fees").innerHTML;
                        document.getElementById("total-price").innerHTML = (parseFloat(obj.totalPrice) + parseFloat(dFee)).toFixed(2);
                        $("#validity").html('<span style="color: green">Coupon Code Applied .!</span>');
                        $("#appCode").val(code);
                        $("#appCodeDis").val(parseFloat(obj.discountPrice).toFixed(2));
                    }
                },
            });
        }
    });
});