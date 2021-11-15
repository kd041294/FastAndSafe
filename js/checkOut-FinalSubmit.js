$(document).ready(function() {
    var dTiming = $('input[name="time"]:checked').val();
    var mode = $('input[name="mode"]:checked').val();
    $("#finalDeliveryTiming").val(dTiming);
    $("#finalPaymentMode").val(mode);

    $('input[type=radio][name=time]').change(function() {
        var dTiming = $('input[name="time"]:checked').val();
        $("#finalDeliveryTiming").val(dTiming);
    });

    $('input[type=radio][name=mode]').change(function() {
        var mode = $('input[name="mode"]:checked').val();
        $("#finalPaymentMode").val(mode);
    });

    $("#final-submit").click(function () {
        $("#cover-spin").show(0);
        var current_fs, next_fs;
        var opacity;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        if(mode === "01"){
            alert("We are not taking any online payments due to technical issue. !");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            var name = $("#finalFullName").val();
            var number = $("#finalNumber").val();
            var hNo = $("#finalHouseNo").val();
            var fAdd = $("#finalFullAdd").val();
            var landmark = $("#finalLandMark").val();
            var pin = $("#finalPincode").val();
            var city = $("#finalCity").val();
            var state = $("#finalState").val();
            var dtime = $("#finalDeliveryTiming").val();
            var mode = $("#finalPaymentMode").val();
            var copName = $("#finalCouponCodeName").val();
            var discount = $("#finalDiscountApplied").val();
            var delFee = $("#finalDeliveryFee").val();
            var finalAmount = $("#finalTotalAmount").val();
            var extraInfo = $("#finalExtraInfo").val();
            $.ajax({
                url: "./api/save-order-information.php",
                method: "post",
                data: {
                    fullName: name,
                    mobNumber: number,
                    houseNo: hNo,
                    fullAddress: fAdd,
                    landMark: landmark,
                    pinCode: pin,
                    city: city,
                    state: state,
                    cName: copName,
                    cValue: discount,
                    delFees: delFee,
                    tPrice: finalAmount,
                    exInfo: extraInfo,
                    time: dtime,
                    mode: mode
                },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if (obj.status === "success") {
                        $("#cover-spin").hide(0);
                        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                        next_fs.show();
                        current_fs.animate({opacity: 0}, {
                            step: function(now) {
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                            },
                            duration: 600
                        });
                    } 
                    else {
                        alert("Unable to process now. Please try after sometime .");
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }
    });
});