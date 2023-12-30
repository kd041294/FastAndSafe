<?php

session_start();

$user_ID = $_SESSION['USER']['ID'];
$order_ID = $_POST["ordId"];
$coupon_ID = $_POST["couponId"];
$address_ID = $_POST["addressId"];
$discount_Applied = $_POST["discountApp"];
$final_Initial_Price = $_POST["initialPrice"];
$final_Total_Price = $_POST["totalPrice"];
$pay_Mode = $_POST["payMode"];

$_SESSION["USER"]['ORDER_ID'] = $order_ID;
$_SESSION["USER"]['ORDER_COUPON_ID'] = $coupon_ID;
$_SESSION["USER"]['ORDER_ADDRESS_ID'] = $address_ID;
$_SESSION["USER"]['ORDER_DISCOUNT_APPLIED'] = $discount_Applied;
$_SESSION["USER"]['ORDER_INITIAL_PRICE'] = $final_Initial_Price;
$_SESSION["USER"]['ORDER_FINAL_TOTAL_PRICE'] = $final_Total_Price;
$_SESSION["USER"]['ORDER_PAYMENT_MODE'] = $pay_Mode;

if($pay_Mode == "1"){
    echo json_encode(array('status' => "1"));
}
elseif($pay_Mode == "0"){
    echo json_encode(array('status' => "0"));
}
else{
    echo json_encode(array('status' => "-1"));
}

?>