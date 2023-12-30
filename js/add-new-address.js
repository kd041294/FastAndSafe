$(document).ready(function () {
    $("#cover-spin").hide(0);
    $("#save-button").click(function () {
        $("#cover-spin").show(0);       
        const name = $('#fName').val();
        const number = $('#numb').val();
        const fNo = $('#fNo').val();
        const fAdd = $('#fAdd').val();
        const city = $('#city').val();
        const pin = $('#pin').val();
        const state = $('#state').val();
        const aType = $("#radioDiv input[type='radio']:checked").val();
        const intRegex = /^[6789]\d{9}$/;
        const intRegexPin = /^[7]\d{5}$/;
        const nameRegx = /^([a-zA-Z ]){2,50}$/;
        if(name === "" || number === "" || fNo === "" || fAdd === "" || city === "" || pin === "" || state === ""){
            $('#fail').html("Enter All Details");
            $("#cover-spin").hide(0);
            return false;
        }
        else if(!nameRegx.test(name)) {
            $('#fail').html("Invalid Name");
            $("#cover-spin").hide(0);
            return false;
        }
        else if(number.length < 10 || number.length > 10) {
            $('#fail').html("Invalid Number");
            $("#cover-spin").hide(0);
            return false;
        } 
        else if(!intRegex.test(number)) {
            $('#fail').html("Invalid Number");
            $("#cover-spin").hide(0);
            return false;
        }
        else if(!nameRegx.test(city)) {
            $('#fail').html("Invalid City Name");
            $("#cover-spin").hide(0);
            return false;
        }
        else if(pin.length < 6 || pin.length > 6) {
            $('#fail').html("Invalid Pincode");
            $("#cover-spin").hide(0);
            return false;
        } 
        else if(!intRegexPin.test(pin)) {
            $('#fail').html("Invalid Pincode");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            const dateTimeNow = new Date();
            $.ajax({
                url: './api/save-new-address.php',
                method: 'post',
                data: { name: name, number: number, fNo: fNo, fAdd: fAdd, city: city, pin: pin, state: state, aType: aType, dateTime: dateTimeNow.toDateString() },
                success: function (response) {
                    let obj = JSON.parse(response);
                    if (obj.status === '1') {;
                        alert("Address added successfully !");
                        $("#cover-spin").hide(0);
                    }else{
                        alert("Unable to save. Please try after some time !");
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }

    });
});