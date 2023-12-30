<?php
session_start();
include 'cart-functions.php';

$userId = $_SESSION['USER']['ID'];
$type = $_POST['updateType'];
$itemId = $_POST['itemId'];
$quantity = $_POST['quant'];


// 0 = First Time, else update
if($type == "0"){
    $result = addToCart($userId, $itemId, $quantity);
}
else{
    $result = updateCartItem($userId, $itemId, $quantity);
    if($quantity == 0){
        $result = deleteCartItem($userId, $itemId);
    }
}

if($result == 0){
    echo json_encode(array('status' => 0));
}
else{   
    echo json_encode(array('status' => 1));
}
