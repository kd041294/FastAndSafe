<?php
//starting session
session_start();
include 'important-functions.php';
include 'connection.php';

$userId = $_SESSION['USER']['ID']; 
$codeName = $_POST['couponCode'];
$totalPrice = (int)$_POST['totalPrice'];
$status = "1";
$discountPrice = 0;
$sql = "SELECT * FROM fns_coupon_code WHERE cc_code = '$codeName' AND cc_status = '$status'";

$finalTotalPrice = 0;
$finalTotalDiscount = 0;
$finalStatus = "0";
$minimumOrdVal = "-1";
$cId = "-1";

if($result = mysqli_query($mysqli, $sql)){
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        while($row = $result->fetch_assoc()){
            $cId = $row['id'];
            $code = (int)$row['cc_code'];
            $value = (int)$row['cc_discount'];
            $type = (int)$row['cc_discount_type'];
            $minValue = (int)$row['cc_discount_min_value'];
        }
        
        if($type == 1 && $totalPrice >= $minValue){
            $finalStatus = "1";
            $minimumOrdVal = "0";
            $finalTotalDiscount = (int)(($value * $totalPrice)/100);
            $finalTotalPrice = (int)$totalPrice - (int)$finalTotalDiscount;
            echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));

        }
        if($type == 1 && $totalPrice < $minValue){
            $minimumOrdVal = $minValue;
            echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));
        }
        if($type == 2 && $totalPrice >= $minValue){
            $finalStatus = "1";
            $minimumOrdVal = "0";
            $finalTotalDiscount = (int)$value;
            $finalTotalPrice = (int)$totalPrice - (int)$finalTotalDiscount;
            echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));
        }
        if($type == 2 && $totalPrice < $minValue){
            $minimumOrdVal = $minValue;
            echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));
        }
    }
    else{
        echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));
    }
}
else{
    echo json_encode(array('cId' => $cId, 'finalTotalPrice' => $finalTotalPrice, 'finalTotalDiscount' => $finalTotalDiscount, 'finalStatus' => $finalStatus, 'minimumOrdVal' => $minimumOrdVal));
}