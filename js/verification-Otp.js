$(document).ready(function () {
    let status = {};
    let myOtp = {};
    $('#genOTP').click(function () {
        $("#cover-spin").show(0);
        let number = $("#given-number").val();
        let intRegex = /^[6789]\d{9}$/;
        if (number === ""){
            alert("Please Fill Number First ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else if (number.length < 10 || number.length > 10) {
            alert("Please Enter Valid Number ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else if (!intRegex.test(number)) {
            alert("Number Should contain digits only ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else{
            myOtp.otp = Math.floor(100000 + Math.random() * 900000);
            alert(myOtp.otp);
            $.ajax({
                url: './api/verify-number.php',
                method: 'post',
                data: {number: number, otp: myOtp.otp},
                success: function (response) {
                    var obj = JSON.parse(response);
                    if (obj.status === 'success') {
                        $("#enter-otp").show();
                        $("#genOTP").hide();
                        $("#submitOTP").show();
                        $("#cover-spin").hide(0);
                        $("#given-number").prop("readonly", true);
                        $("#given-number").css("background-color","#d0f5f1");
                    } else if(obj.status === 'fail'){
                        alert('Unable to send OTP right now. Please try after sometime .!');
                        $("#cover-spin").hide(0);
                    } else{
                        alert('Unabele to process now please after sometime .!');
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }
    });
    $('#submitOTP').click(function () {
        $("#cover-spin").show(0);
        var subOTP = $("#otp").val();
        if(subOTP === ""){
            alert("plase submit OTP .!");
            $("#cover-spin").hide(0);
            return false;
        }else if(subOTP.length < 6 || subOTP.length > 6){
            alert("OTP do not match .!");
            $("#cover-spin").hide(0);
            return false;
        }else{
            $.ajax({
                url: 'api/check-otp.php',
                method: 'post',
                data: {sOtp: subOTP, vOtp: myOtp.otp},
                success: function (response) {
                    if (response === 'true') {
                        $("#enter-otp").hide();
                        $("#ver-num").show();
                        $("#cover-spin").hide(0);
                        $("#submitOTP").hide();
                        $('#edit').show();
                        $("#numberVerification").val("1");
                        alert("verified");
                    } 
                    else {
                        alert("Please Enter Valid OTP");
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }
    });
    $('#edit').click(function () {
        $("#given-number").prop("readonly", false);
        $("#genOTP").show();
        $("#ver-num").hide();
        $('#edit').hide();
        $("#given-number").css("background-color","#fbfcf7");
    });
});