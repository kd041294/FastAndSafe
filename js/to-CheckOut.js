$(document).ready(function () {
    $("#to-checkOut").click(function () {
        $("#cover-spin").show(0);
        var cCode = $('#coupon-value').val();
        var discount = $("#appCodeDis").val();
        var info = $('#extInfo').val();
        var dCharge = document.getElementById("delivery-fees").innerHTML;
        var price = document.getElementById("total-price").innerHTML;
        $.ajax({
            url: "api/to-check-out.php",
            method: "post",
            data: { 
                code: cCode, 
                discount: discount,
                deliveryFees: dCharge,
                amt: price,
                exInfo: info
            },
            success: function (response) {
                $("#cover-spin").hide(0);
                url = "check-out-page.php";
                if(response === "true"){
                    window.open(url, '_self');
                }
            },
        });
    });
});