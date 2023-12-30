$(document).ready(function () {
    $("#cover-spin").hide(0);
    const myOtp = {};
    $('#edit_num').click(function () {
        $("#info_form").show(0);
        $("#verify_form").hide(0);
    });
    $('#sin-but').click(function () {
        $("#cover-spin").show(0);
        const intRegex = /^[6789]\d{9}$/;
        var number = $('#mobNum').val();
        if (number === "") {
            $('#fail').html("Enter Number");
            $("#cover-spin").hide(0);
            return false;
        } else if (!intRegex.test(number)) {
            $('#fail').html("Invalid Number");
            $("#cover-spin").hide(0);
            return false;
        } else {
            $('#fail').html(" ");
            $('#ver_num').html(number);
            $('#fail').html(" ");
            myOtp.otp = Math.floor(100000 + Math.random() * 900000);
            $("#info_form").hide(0);
            $("#verify_form").show(0);
            $("#cover-spin").hide(0);
            alert(myOtp.otp);
            $.ajax({
                url: './api/sign-in-api.php',
                method: 'post',
                data: { mobNumber: number, otp: myOtp.otp },
                success: function (response) {
                    const obj = JSON.parse(response);
                    if (obj.status === 'NA') {
                        alert("NA");
                        $('#fail').html("Not Registered. SignUp to Continue !");
                        $("#info_form").show(0);
                        $("#verify_form").hide(0);
                    }
                    if (obj.status === 'FAIL') {
                        alert("fail");
                        $('#fail').html("Unable to send OTP, Please try after sometime !");
                        $("#info_form").show(0);
                        $("#verify_form").hide(0);
                    }
                }
            });
        }
    });
    $('#final_sub').click(function () {
        $("#cover-spin").show(0);
        const subOTP = $('#sub-otp').val();
        if (myOtp.otp === parseInt(subOTP)) {
            window.open('home.php', '_self');
        } else {
            $('#otpFail').html("OTP do not match !");
            $("#cover-spin").hide(0);
        }
    });

});