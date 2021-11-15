<?php
//starting session
session_start();
include 'important-functions.php';
include 'connection.php';

$userId = $_SESSION['user']['id'];
$codeName = $_POST['couponCode'];
$totalPrice = (int)$_POST['totalPrice'];
$status = "1";
$discountPrice = 0;
$sql = "SELECT * FROM coupon_code WHERE cc_name = '$codeName' AND cc_status = '$status'";

if($result = mysqli_query($mysqli, $sql)){
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        while($row = $result->fetch_assoc()){
            $name = $row['cc_name'];
            $value = $row['cc_value'];
            $minValue = $row['cc_min_or_value'];
        }
        $discount = (int)$value; 
        $min = (int)$minValue;
        $total = (int)$totalPrice;
        if($total < $min){
            echo json_encode(array('totalPrice' => $totalPrice, 'discountPrice' => $discountPrice, 'status' => "failMin", 'min' => $min));;
        }
        else{
            $discountPrice = ($totalPrice*$discount)/100;
            $newTotalPrice = $totalPrice - $discountPrice;
            echo json_encode(array('totalPrice' => $newTotalPrice, 'discountPrice' => $discountPrice, 'status' => "true"));
        }
    }
    else{
        echo json_encode(array('totalPrice' => $totalPrice, 'discountPrice' => 0, 'status' => "fail"));
    }
}
else{
    echo json_encode(array('totalPrice' => $totalPrice, 'discountPrice' => 0, 'status' => "fail"));
}