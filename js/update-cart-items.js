$(document).ready(function() {
    var currentUrl = window.location.href;
    $(".quantity").on('change', function(){
        $("#cover-spin").show(0);
        var $input = $(this).closest('.items');
        var updateItemValue = parseInt($input.find(".quantity").val());
        var itemId = $input.find("#itemId").val();
        let maxiAddToCart = 5;
        let miniAddToCart = 1;
        if( updateItemValue > maxiAddToCart ){
            $input.find("#quantity").val("5");
            alert("You can add maximum 5 Items.!");
            $("#cover-spin").hide(0);
            return false;
        }
        else if( updateItemValue < miniAddToCart ){
            $input.find("#quantity").val("1");
            alert("You need to add minimum 1 Item to cart.!");
            $("#cover-spin").hide(0);
            return false;
        }
        else{
            $.ajax({
                url: './api/add-to-cart.php',
                method: 'post',
                data: {itemId: itemId, quantity: updateItemValue},
                success: function (response) {
                    var obj = JSON.parse(response);
                    if(obj.status === "true"){
                        $("#cover-spin").hide(0);
                        window.open(currentUrl, '_self');
                    }else{
                        $("#cover-spin").hide(0);
                        alert("Unable To Add Item .!");
                    }
                }
            });
        }
    });
    $(".delete-button").on('click', function(){
        $("#cover-spin").show(0);
        var $input = $(this).closest('.items');
        var itemId = $input.find("#itemId").val();
        $.ajax({
            url: './api/delete-from-cart.php',
            method: 'post',
            data: {itemId: itemId},
            success: function (response) {
                if(response === "true"){
                    $("#cover-spin").hide(0);
                    window.open(currentUrl, '_self');
                }else{
                    $("#cover-spin").hide(0);
                    alert("Unable To Delete Item .!");
                }
            }
        });
    });  
});