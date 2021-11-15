$(document).ready(function () {
    let myOtp = {};
    $('#button').click(function () {
        $("#cover-spin").show(0);
        let intRegex = /^[6789]\d{9}$/;
        let number = $('#mobNumber').val();
        if (number === "") {
            $('#fail').html("Please Enter Mobile Number First ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else if (number.length < 10 || number.length > 10) {
            $('#fail').html("Please Enter Valid Number ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else if (!intRegex.test(number)) {
            $('#fail').html("Please Enter Valid Number ..!!!");
            $("#cover-spin").hide(0);
            return false;
        }else {
            console.log($("#main-form-1").hide(0));
            $("#fail").hide(0);
            myOtp.otp = Math.floor(100000 + Math.random() * 900000);
            alert(myOtp.otp);
            $.ajax({
                url: './api/send-loginOtp.php',
                method: 'post',
                data: {number: number, otp: myOtp.otp},
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj.status === 'success'){
                        $("#main-form-2").show();
                        $("#cover-spin").hide(0);
                    }else{
                        $('#fail').html("Unable to process now. Please try after sometime .!");
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }
    });
    $('#button-otp').click(function () {
        $("#cover-spin").show(0);
        let subOTP = $('#otp').val();
        let processId = "1";
        if(subOTP === ""){
            $('#fail-otp').html("Please Enter OTP .!");
            $("#cover-spin").hide(0);
            return false;
        }else if(subOTP.length < 6 || subOTP.length > 6){
            $('#fail-otp').html("OTP do not match .!");
            $("#cover-spin").hide(0);
            return false;
        }else{
            $.ajax({
                url: 'api/check-otp.php',
                method: 'post',
                data: {sOtp: subOTP, vOtp: myOtp.otp, id: processId},
                success: function (response) {
                    if (response === 'true') {
                        $("#cover-spin").hide(0);
                        alert("verified");
                        window.open('index.php', '_self');
                    } 
                    else {
                        $("#cover-spin").hide(0);
                        $('#fail-otp').html("Please Enter Valid OTP .!");
                    }
                }
            });
        }
    });
});