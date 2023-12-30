$(document).ready(function () {
    $("#finalSubmit").click(function(){
        $("#cover-spin").show(0);
        const today = new Date();
        let mm = String(today.getMonth() + 1);
        let dd = String(today.getDate());
        let text = "";
        let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let ordDate = (dd.length === 1 ? ("0"+ dd) : dd) + (mm.length === 1 ? ("0"+ mm) : mm) ;
        for (let i = 0; i < 4; i++){
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        let finalOrderId = "ORD" + ordDate + text;
        let finalPrice = $("#totalFinalPrice").val();
        let finalCouponId = $("#couponId").val();
        let finalDiscountAmount = $("#discountAppliedAmount").val();
        let finalDeliveryAddressId = $("#defaultAddressId").val();
        let paymentMode = $("#payMode").val();
        let initialPriceFor = $("#totalInitialPrice").val();
        $.ajax({
            url: './api/paytmData.php',
            method: 'post',
            data: { ordId: finalOrderId, initialPrice: initialPriceFor, totalPrice: finalPrice, couponId: finalCouponId, discountApp: finalDiscountAmount, addressId: finalDeliveryAddressId, payMode: paymentMode },
            success: function (response) {
                let obj = JSON.parse(response);
                if (obj.status === '0') {
                    $("#cover-spin").hide(0);
                    window.open('PaytmKit/pgRedirect.php', '_self');
                }
                else if(obj.status === '1'){
                    $("#cover-spin").hide(0);
                    window.open('order-pay-offline.php', '_self');
                }else{
                    alert("Online transaction is currently not available. Kindly proceed with the different payment process !")
                    $("#cover-spin").hide(0);
                }
            }
        });
    });
});