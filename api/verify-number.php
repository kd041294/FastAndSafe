<?php

//starting session
session_start();

//including functions file
include 'important-functions.php';
//including connection file
include 'connection.php';

$number = $_POST['number'];
$otp = $_POST['otp'];
// $message = "Hi,\nYour OTP for verification is ".$otp.".\nRegards,\nFastAndSafe";

// $resOtp = send_message($number, $message);
// if($resOtp === "success"){
//     echo json_encode(array('status' => 'success'));
// }else{
//     echo json_encode(array('status' => 'fail'));
// }

echo json_encode(array('status' => 'success'));