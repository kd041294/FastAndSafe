$(document).ready(function () {
    $("#coupon-button").click(function () {
        $("#cover-spin").show(0);
        let totalPriceInitial = $('#totalInitialPrice').val();
        let codeName = $("#cCode").val();
        const letterNumber = /^[0-9a-zA-Z]+$/;
        if (codeName === "") {
            document.getElementById("invalidRes").innerHTML = "Please enter a coupon code first !";
            $("#cover-spin").hide(0);
            return false;
        } 
        else if (codeName.length < 6 || codeName.length > 7) {
            document.getElementById("invalidRes").innerHTML = "Please enter a valid coupon code .!";
            $("#cover-spin").hide(0);
            return false;
        } 
        else if (!codeName.match(letterNumber)) {
            document.getElementById("invalidRes").innerHTML = "Please enter a valid coupon code !";
            $("#cover-spin").hide(0);
            return false;
        } 
        else {
            $.ajax({
                url: "api/check-coupon-value.php",
                method: "post",
                data: { couponCode: codeName, totalPrice: totalPriceInitial },
                success: function (response) {
                    $("#cover-spin").hide(0);
                    let obj = jQuery.parseJSON(response);
                    if(obj.cId === "-1"){
                        document.getElementById("invalidRes").innerHTML = "Please Enter a Valid COUPON CODE !";
                        return false;
                    }
                    else{
                        if(obj.finalStatus === "1"){
                            document.getElementById("vaildRes").innerHTML = "DISCOUNT OF Rs. " + obj.finalTotalDiscount + " is Applied Successfully !";
                            $("#totalFinalPrice").val(obj.finalTotalPrice);
                            $("#discountAppliedAmount").val(obj.finalTotalDiscount);
                            $("#couponId").val(obj.cId);
                            document.getElementById("finalTotalPrice").innerHTML = obj.finalTotalPrice;
                            document.getElementById("discountPrice").innerHTML = obj.finalTotalDiscount;
                            document.getElementById("invalidRes").innerHTML = "";
                            return true;
                        }
                        else{
                            document.getElementById("invalidRes").innerHTML = "Minimum Order Value for this ORDER is Rs." + obj.minimumOrdVal;
                            return false;
                        }
                    }
                },
            });
        }
    });
});