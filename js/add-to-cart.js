$(document).ready(function() {  
    var currentUrl = window.location.href;
    $(".add").on('click', function(event){
        $("#cover-spin").show(0);
        let maxiAddToCart = 5;
        let miniAddToCart = 1;
        let $input = $(this).closest('.input-item');
        let inputValue = $input.find("#quantity").val();
        let itemId =  $input.find("#item-id").val();
        let integerInput = parseInt(inputValue);
        let numbers = /^[1-9]+$/;
        if(!numbers.test(inputValue)){
            alert("Please Enter Valid Input .!");
            $("#cover-spin").hide(0);
            return false;
        }
        else if( integerInput > maxiAddToCart ){
            $input.find("#quantity").val("5");
            alert("You can add maximum 5 Items.!");
            $("#cover-spin").hide(0);
            return false;
        }
        else if( integerInput < miniAddToCart ){
            $input.find("#quantity").val("1");
            alert("You need to add minimum 1 Item to cart.!");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            $.ajax({
                url: './api/check-user-login.php',
                method: 'post',
                success: function (response) {
                    if(response === "false"){
                        $("#cover-spin").hide(0);
                        window.open('login.php', '_self')
                    }
                    else{
                        $.ajax({
                            url: './api/add-to-cart.php',
                            method: 'post',
                            data: {itemId: itemId, quantity: inputValue},
                            success: function (response) {
                                var obj = JSON.parse(response);
                                if(obj.status === "fail"){
                                    $("#cover-spin").hide(0);
                                    alert("Unable To Add Item .!");
                                }else{
                                    $("#cover-spin").hide(0);
                                    alert(obj.count);
                                    $("#count").text(obj.count);
                                    $('#countMob').text(obj.count);
                                    $("#cartTotal").text(obj.value);                         
                                }
                            }
                        });
                    }
                }
            });
        }
    });     
});