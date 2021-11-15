<?php

//create new user
function create_user($number){
    //including connection file
    include 'connection.php';
    
    $uInfo = get_user_id($number);
    if($uInfo != 0){
        return $uInfo;
    }
    else{
        $date = date("d/m/Y");
        $status = 1;
        $referral = str_replace(' ', '', $number);
        $numberNew = str_replace(' ', '', $number);
        $sql = "INSERT INTO user_information(UR_Number, UR_Refer_Code, UR_Create_Date, UR_Status) "
                ."VALUES('".$numberNew."', '".$referral."', '".$date."', '".$status."')";
        if (mysqli_query($mysqli, $sql)) {
            $uInfo = get_user_id($number);
            return $uInfo;
        }
        return 0;
    }
    return 0;
}

//getting user id if user already exists
function get_user_id($number){
    //including connection file
    include 'connection.php';
    //checking for existing user
    $newNum = str_replace(' ', '', $number);
    $sql = "SELECT id AS user_id, UR_Refer_By AS refer_by FROM user_information WHERE UR_Number = '$newNum'";
    
    $result = mysqli_query($mysqli, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $id = (int)$row['user_id'];
            $refer_code = $row['refer_by'];
        }
        return str_replace(' ', '', $id.'//'.$refer_code);
    }
    return 0;
}

//get user address id
function get_user_address_id($uId, $number){
    include 'connection.php';
    $sql = "SELECT id FROM user_address_information WHERE UAI_UR_Id = '$uId' AND UAI_NUmber = '$number' ORDER BY id DESC limit 1";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
        }
        return $id;
    }
    return 0;
}

//get order id 
function get_order_id($userId){
    //including connection file
    include 'connection.php';
    $status = "pending" ;
    
    $sql = "SELECT id FROM user_orders WHERE UO_UR_Id = '$userId' AND UO_Status = '$status' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
        }
        return $id;
    }
    return 0;
}

//check refaral number
function check_referral_number($number){
    include 'connection.php';
    
    $sql = "SELECT id FROM user_information WHERE UR_Number = '$number' AND UR_Status = '1'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $id = $row['id'];
        }
        return $id;
    }
    return 0;
}

//get coupon code value 
function get_coupon_value($codeName, $uId){
    //including connection file
    include 'connection.php';
    
    $sql = "SELECT * AS FROM coupon_code WHERE  cc_name = '$codeName' AND cc.cc_status = '1'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            $name = $row['cc_name'];
            $value = $row['value'];
            $times_of_use = $rpw['cc_can_be_used_times'];
            $sql1 = "SELECT * FROM `coupon_code_used` WHERE ccu_cc_name = '$name'";
            $result1 = mysqli_query($mysqli, $sql1);
            if (mysqli_num_rows($result1) > 0) {
                return 2;
            }
            else{
                return $value;
            }
        }
    }
    else{
        return 0;
    }
}

//message sending function
function send_message($number, $message){
    $test = "0";
    // Account details
    $apiKey = urlencode('NTM0MjU4MzQ1NDZkNzg2YTc5NjU0NzQ0NDc3NTczMzc=');

    // Message details
    $numbers = array($number);
    $sender = urlencode('FSTSFE');
    $message = rawurlencode($message);

    $numbers = implode(',', $numbers);

    // Prepare data for POST request
    $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response);
    if ($result->status == 'success') {
        return 'success';
    } else {
        return 'fail';
    }
}