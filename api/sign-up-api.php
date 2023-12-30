<?php
session_start();
include 'important-functions.php';

$email = $_POST['email'];
$number = $_POST["number"];
$name = $_POST["name"];
$otp = $_POST['otp'];
$message = "Hi,\nYour OTP for verification is ".$otp.".\nRegards,\nFastAndSafe";

$info = create_user($number, $email, $name);

if($info == 1){
    echo json_encode(array('status' => 'EXISTS'));
}
else{
    $msgSent = "SUCCESS";
    //$msgSent = send_message($number, $message);
    if($msgSent === 'FAIL'){
        echo json_encode(array('status' => 'FAIL'));
    }
    else{
        $_SESSION['user']['id'] = $info['id'];
        echo json_encode(array('status' => "SUCCESS"));
    }
}