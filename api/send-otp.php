<?php
session_start();
include 'important-functions.php';

$number = $_POST['number'];
$otp = $_POST['otp'];
$message = "Hi,\nYour OTP for verification is ".$otp.".\nRegards,\nFastAndSafe";

$resOtp = get_user_id($number, $message);

if($resOtp == "fail"){
    echo json=_encode(array('status' => 'fail'));
}else{
    echo json_encode(array('status' => 'success'));
}