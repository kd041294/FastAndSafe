<?php
session_start();
include 'cart-functions.php';

$itemId = $_POST['itemId'];
$quantity = $_POST['quantity'];
$userId = $_SESSION['user']['id'];

$result = addToCart($userId, $itemId, $quantity);

if($result == 0){
    echo json_encode(array('value' => 0, 'count' => 0, 'status' => 'fail'));
}
else{   
    $resultC = getCartValueAndCount($userId);
    if($resultC == 0){
        echo json_encode(array('value' => $resultC['totalPrice'], 'count' => $resultC['cartItemCount'], 'status' => 'fail'));
    }else{
        echo json_encode(array('value' => $resultC['totalPrice'], 'count' => $resultC['cartItemCount'], 'status' => 'true'));
    }
}
