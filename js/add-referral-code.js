$(document).ready(function() {  
    $('#add-code-but').click(function () {
        var refVal = $("#add-code-value").val();
        let intRegex = /^[6789]\d{9}$/;
        $("#cover-spin").show(0);
        if(refVal.length < 10 || refVal.length > 10){
            alert("Please enter valid Referral Code .!");
            $("#cover-spin").hide(0);
            return false;
        }else if (!intRegex.test(refVal)) {
            alert("Please enter valid Referral Code .!");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            $.ajax({
                url: './api/add-referral-code.php',
                method: 'post',
                data: {ref: refVal},
                success: function (response) {
                    if(response === 'true'){
                        alert('Added Successfully .!');
                        window.open('index.php', '_self');
                        $("#cover-spin").hide(0);
                    }else{
                        alert("Unable to process now. Please try after sometime .!");
                        $("#cover-spin").hide(0);
                    }
                }
            });
        }
    });
});