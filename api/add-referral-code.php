<?php
session_start();
include 'connection.php';
include 'important-functions.php';

$refNum = str_replace(' ', '', $_POST['ref']);
$userNumber = str_replace(' ', '', $_SESSION['user']['refer_number']);
$userId = str_replace(' ', '', $_SESSION['user']['id']);


$check = check_referral_number($userNumber);

if((int)$check > 0){
    $sql = "UPDATE user_information SET UR_Refer_By = '$refNum' WHERE id='$userId'";
    if (mysqli_query($mysqli, $sql)) {
        $message = 'Hi '.$userNumber.',\nyour referral code '.$refNum.' has been added successfully.\nRegards,\nTeam FastAndSafe';
        $resOtp = send_message($userNumber, $message);
        $_SESSION['user']['refer'] = $refNum;
        echo 'true';
    }
    else{
        echo 'false';
    }
}
else{
    echo 'false';
}



