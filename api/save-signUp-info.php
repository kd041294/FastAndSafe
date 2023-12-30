<?php
session_start();
include 'important-functions.php';

$name = $_POST['fName'];
$num = $_POST['mNumber'];
$email = $_POST['email'];

$userInfo = create_user($name, $num, $email);

if( $userInfo == 0 ){
    echo json_encode(array('status' => 'error'));
}else if( $userInfo == -1 ){
    //already exixts
    echo json_encode(array('status' => 'exixts'));
}else{
    //success full
    $_SESSION['user']['id'] = $userInfo;
    echo json_encode(array('status' => 'success'));
}


?>