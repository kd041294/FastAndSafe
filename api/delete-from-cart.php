<?php
session_start();
include 'cart-functions.php';

$itemId = $_POST['itemId'];
$userId = $_SESSION['user']['id'];

$result = removeFromCart($userId, $itemId);

if($result === 0){
    echo 'false';
}else{
    echo 'true';
}