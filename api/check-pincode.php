<?php
//starting session
session_start();
include 'connection.php';

$code = $_POST['pincode'];

$sql = "SELECT * FROM check_pincode WHERE cp_code = '$code'";

if($result = mysqli_query($mysqli, $sql)){
    $rowcount = mysqli_num_rows($result);
    if($rowcount > 0){
        echo json_encode(array('status' => 'available'));
    }
    else{
        echo json_encode(array('status' => 'unavailable'));
    }
    
}
else{
    echo json_encode(array('status' => 'failure'));
}