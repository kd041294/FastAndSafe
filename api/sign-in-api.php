<?php
session_start();
include 'important-functions.php';

$number = $_POST["mobNumber"];
$otp = $_POST['otp'];
$message = "Hi,\nYour OTP for verification is ".$otp.".\nRegards,\nFastAndSafe";

$info = get_user_info($number);

if($info != 0){
    $msgSent = "SUCCESS";
    //$msgSent = send_message($number, $message);
    if($msgSent === 'FAIL'){
        echo json_encode(array('status' => 'FAIL'));
    }
    else{
        $_SESSION['USER']['ID'] = $info['id'];
        $_SESSION['USER']['MOBILE_NUMBER'] = $info['ui_mob_number'];
        $_SESSION['USER']['EMAIL_ID'] = $info['ui_email_id'];
        echo json_encode(array('status' => "SUCCESS"));
    }
}
else{
    echo json_encode(array('status' => 'NA'));
}