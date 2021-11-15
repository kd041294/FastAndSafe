<?php
session_start();
include 'important-functions.php';

$number = $_POST['number'];
$otp = $_POST['otp'];
$message = "Hi,\nYour OTP for verification is ".$otp.".\nRegards,\nFastAndSafe";

$resOtp = send_message($number, $message);
$userInfo = create_user($number);

$info = explode("//", $userInfo);



$_SESSION['user']['id'] = $info[0];
$_SESSION['user']['refer_number'] = $number;
$_SESSION['user']['refer'] = $info[1];

if($resOtp === "success"){
    echo json_encode(array('status' => 'success'));
}else{
    echo json_encode(array('status' => 'fail'));
}