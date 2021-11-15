$(document).ready(function(){
    var current_fs, next_fs, previous_fs;
    var opacity;
    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        previous_fs.show();
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });
    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    $(".submit").click(function(){
        return false;
    })
});

$(document).ready(function () {
    $("#form-button").click(function () {
        $("#cover-spin").show(0);
        var verification = $("#numberVerification").val();
        if(verification === "0"){
            alert("Please verify your number first !");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            var current_fs, next_fs;
            var opacity;
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();
            var number = $("#given-number").val();
            var name = $("#name").val();
            var hNo = $("#hno").val();
            var fAddress = $("#fAdd").val();
            var landmark = $("#landmark").val();
            var pin = $("#pin").val();
            var cty = $("#city").val();
            var sate = $("#state").val();
            var intRegex = /^[6789]\d{9}$/;
            var nameChar = /^[A-Za-z][A-Za-z\s]*$/;
            if (number === "" || name === "" || hNo === "" || fAddress === "" || landmark === "" || pin === "" || cty === "" || sate === "") {
                alert("Please fill all the details first ..!");
                $("#cover-spin").hide(0);
                return false;
            } else if (number.length < 10 || number.length > 10) {
                alert("Please enter a valid mobile number ..!");
                $("#cover-spin").hide(0);
                return false;
            } else if (!intRegex.test(number)) {
                alert("Please enter a valid mobile number ..!");
                $("#cover-spin").hide(0);
                return false;
            } else if (!nameChar.test(name)) {
                alert("Please enter a valid name ..!");
                $("#cover-spin").hide(0);
                return false;
            } else if (pin.length < 6 || pin.length > 6) {
                alert("Please enter a valid pin number ..!");
                $("#cover-spin").hide(0);
                return false;
            } else {
                $("#cover-spin").hide(0);
                $("#finalFullName").val(name);
                $("#finalNumber").val(number);
                $("#finalHouseNo").val(hNo);
                $("#finalFullAdd").val(fAddress);
                $("#finalLandMark").val(landmark);
                $("#finalPincode").val(pin);
                $("#finalCity").val(cty);
                $("#finalState").val(sate);
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
        }
    });
});