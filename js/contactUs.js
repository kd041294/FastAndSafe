$(document).ready(function () {
    $('#button').click(function () {
        var name = $('#name').val();
        var number = $('#mob').val();
        var message = $('#message').val();
        var validNumberRegx = /^[6789]\d{9}$/;
        if(name === "" || number === "" || message === ""){
            alert("Please fill all the details ");
            return false;
        }
        else if(!validNumberRegx.test(number)){
            alert("Enter a valid mobile number .!");
            return false;
        }                
        else{
            $('.loader').show();
            $('.contact').hide();
            $.ajax({
                url: 'api/save-contact-information.php',
                method: 'post',
                data: {name: name, number: number, message: message },
                success: function (response) {
                   var obj = JSON.parse(response);
                   if (obj.status === "true") {
                        $('.loader').hide();
                        $('.contact').show();
                        $('#success').html("Your Details is saved. Our representative will contact you shortly..!");
                        $('#name').val("");
                        $('#mob').val("");
                        $('#message').val("");                                
                    } 
                    else {
                        $('.loader').hide();
                        $('#success').html("Unable to process now. Please try after sometime .");
                    }
                }
            });
        }
    });
});