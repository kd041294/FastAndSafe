<?php
session_start();
include 'important-functions.php';

$id = $_SESSION['USER']['ID'];
$name = $_POST["name"];
$number = $_POST["number"];
$fNo = $_POST["fNo"];
$fAdd = $_POST["fAdd"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$state = $_POST["state"];
$type = $_POST["aType"];
$dateTime = $_POST["dateTime"];

$result = save_new_address_info($id, $name, $number, $fNo, $fAdd, $city, $pin, $state, $type, $dateTime); 

if($result == 1){
    echo json_encode(array('status' => "1"));
}else{
    echo json_encode(array('status' => "1"));
}

?>