<?php
    
    //starting session
    session_start();
    include 'connection.php';
    
    $name = $_POST['name'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    $date = date("d/m/Y");

    $sql = "INSERT INTO contact_information(CI_name, CI_number, CI_message, CI_date) "
                . "VALUES('".$name."', '".$number."', '".$message."', '".$date."')";
    if (mysqli_query($mysqli, $sql)) {
        echo json_encode(array('status' => 'true'));
    }
    else{
        echo json_encode(array('status' => 'false'));
    }
?>

