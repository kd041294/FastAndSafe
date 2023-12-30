$(document).ready(function () {
    $("#cover-spin").hide(0);
});

function changeItemInValue(id, initialCount){
    let updateValue = (parseInt(initialCount) + 1);
    let type = "+";
    let itemID = id;
    $.ajax({
        url: './api/add-to-bag.php',
        method: 'post',
        data: { updateType: type, itemId: itemID, quant: updateValue },
        success: function (response) {
            const obj = JSON.parse(response);
            location.reload();
            if(obj.success === "0"){
                alert("Unable to add to cart now. Please try after sometime !");
            }
        }
    });
}

function changeItemDeValue(id, initialCount){
    let updateValue = (parseInt(initialCount) - 1);
    let type = "-";
    let itemID = id;
    $.ajax({
        url: './api/add-to-bag.php',
        method: 'post',
        data: { updateType: type, itemId: itemID, quant: updateValue },
        success: function (response) {
            const obj = JSON.parse(response);
            location.reload();
            if(obj.success === "0"){
                alert("Unable to add to cart now. Please try after sometime !");
            }
        }
    });
}

function itemAddIstTime(id, initialCount){
    let count = parseInt(initialCount);
    let updateValue = count + 1;
    let type = "0";
    let itemID = id;
    $.ajax({
        url: './api/add-to-bag.php',
        method: 'post',
        data: { updateType: type, itemId: itemID, quant: updateValue },
        success: function (response) {
            $("#cover-spin").hide(0);
            const obj = JSON.parse(response);
            location.reload();
            if(obj.success === "0"){
                alert("Unable to add to cart now. Please try after sometime !");
            }
        }
    });
}