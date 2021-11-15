$(document).ready(function () {
    $("#form-button-pin").click(function () {
        $("#cover-spin").show(0);
        var current_fs, next_fs;
        var opacity;
        var code = $("#pincode").val();
        var intRegex = /^\d+$/;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        if (code === "") {
            alert("Please Enter Pincode");
            $("#cover-spin").hide(0);
            return false;
        } else if (code.length < 6 || code.length > 6) {
            alert("Please Enter Valide Pincode");
            $("#cover-spin").hide(0);
            return false;
        } else if (!intRegex.test(code)) {
            alert("Please Enter a Valid Pincode");
            $("#cover-spin").hide(0);
            return false;
        } else {
            $.ajax({
                url: "api/check-pincode.php",
                method: "post",
                data: { pincode: code },
                success: function (response) {
                    var obj = JSON.parse(response);
                    if (obj.status === "available") {
                        $("#cover-spin").hide(0);
                        $("#pincode").val(code);
                        $("#confirm-pin").show();
                        $("#fail-pin").hide();
                        $("#pin").val(code);
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
                    else if (obj.status === "unavailable") {
                        $("#cover-spin").hide(0);
                        $("#confirm-pin").hide();
                        $("#fail-pin").show();
                        $("#unab").show();
                    } 
                    else {
                        $("#cover-spin").hide(0);
                        alert("Unable to place order now. Please try after sometime .");
                    }
                },
            });
        }
    });
});