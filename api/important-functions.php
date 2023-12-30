<?php

//FUNTION FOR DATA ENCRYPTION
function encrypt($data) {
    require 'constant-links.php';
    $key = key;
    $plaintext = $data;
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext = base64_encode($iv . $hmac . $ciphertext_raw);
    return trim($ciphertext);
}

//FUNCTION FOR DATA DECRYPTION
function decrypt($data) {
    require 'constant-links.php';
    $key = key;
    $c = base64_decode($data);
    $ivlen = openssl_cipher_iv_length($cipher = encryption_method);
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len = 32);
    $ciphertext_raw = substr($c, $ivlen + $sha2len);
    $original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    if (hash_equals($hmac, $calcmac))
    {
        return trim($original_plaintext);
    }
    else{
        return trim("#00#");
    }
}

//create new user
function create_user($number, $email, $name){
    require 'connection.php';
    $uInfo = get_validate_user($number, $email);
    if($uInfo != 0){
        return 1;
    }
    else{
        $date = date("d/m/Y");
        $status = 1;
        $referral = str_replace(' ', '', $number);
        $numberNew = str_replace(' ', '', $number);
        $emailNew = str_replace(' ', '', $email);
        $sql = "INSERT INTO fns_user_info(ui_full_name, ui_mob_number, ui_email_id, ui_refer_code, ui_create_date, ui_status) "
                ."VALUES('".$name."', '".$numberNew."', '".$emailNew."', '".$referral."', '".$date."', '".$status."')";
        if (mysqli_query($mysqli, $sql)) {
            $uInfo = get_user_info($number);
            return $uInfo;
        }
        return 1;
    }
    return 1; 
}

//getting user id if user already exists
function get_user_info($number){
    require 'connection.php';
    $sql = "SELECT * FROM fns_user_info WHERE ui_mob_number = '$number'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()){
            return $row;
        }
    }
    return 0;
}

//validate user
function get_validate_user($number, $email){
    require 'connection.php';
    $sql = "SELECT * FROM fns_user_info WHERE ui_mob_number = '$number' || ui_email_id = '$email'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
        return 1;
    }
    return 0;
}

//select default address
function get_user_default_address($userId){
    require 'connection.php';
    $default = "1";
    $status = "1";
    $sql = "SELECT def.id AS dId, def.ua_full_name AS fullName, def.ua_mobile_number AS mobNumber, def.ua_flat_number AS flatNumber, def.ua_full_address AS fullAddress, def.ua_city AS city, def.ua_pincode AS pincode, def.ua_state AS state, def.ua_type AS type FROM fns_user_address AS def WHERE def.ua_user_id = '$userId' AND def.ua_default_add = '$default' AND def.ua_status = '$status'";
    $result = mysqli_query($mysqli, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

//get the profile info 
function get_user_profile_info($id){
    require 'connection.php';
    $sql = "SELECT ui_full_name AS uName, ui_mob_number AS uNumber, ui_email_id AS uEmail, ui_refer_code AS uReferCode, ui_refer_by_code AS uReferByCode, ui_create_date AS createDate, ui_status AS uStatus FROM fns_user_info AS u_info WHERE u_info.id = '$id'";
    $result = mysqli_query($mysqli, $sql);
    $row = $result->fetch_assoc();
    return $row;
}

//save address info
function save_new_address_info($id, $name, $number, $fNo, $fAdd, $city, $pin, $state, $type, $dateTime){
    require 'connection.php';
    $default = "1";
    $sql = "INSERT INTO fns_user_address(ua_user_id, ua_full_name, ua_mobile_number, ua_flat_number, ua_full_address, ua_city, ua_pincode, ua_state, ua_type, ua_default_add, ua_address_create_dt)".
    " VALUES('".$id."', '".$name."', '".$number."', '".$fNo."', '".$fAdd."', '".$city."', '".$pin."', '".$state."', '".$type."', '".$default."', '".$dateTime."')";
    if (mysqli_query($mysqli, $sql)) {
        $sqlUpdate = "UPDATE fns_user_address SET ua_default_add = '0' WHERE (SELECT id FROM `fns_user_address` ORDER BY id DESC LIMIT 1) != id";
        $resultUpdate = mysqli_query($mysqli, $sqlUpdate);
        if($resultUpdate){
            return 1;
        }
        return 0;
    }
    return 0;
}

//get user orders
function get_user_orders($userId){
    require 'connection.php';
    $sql = "SELECT fo.id AS o_id, fo.ord_id AS o_code, fo.ord_coupon_id AS o_cop_id, fo.ord_total_item AS o_total_item, fo.ord_total_initial_amount AS o_initial_amount, fo.ord_discount_applied AS o_discount, 
    fo.ord_total_final_amount AS o_final_amount, fo.ord_payment_mode AS o_pay_mode, fo.ord_date_time AS o_date_time, fo.ord_status AS o_status FROM fns_orders AS fo WHERE fo.ord_user_id = '$userId'";
    $result = mysqli_query($mysqli, $sql);
    $num_rows = mysqli_num_rows($result);
    $data = null;
    if ($num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}

//get all the users bag items
function get_user_bag_items($userId){
    require 'connection.php';
    $sql = "SELECT ci.id AS item_id, ci.ci_name AS item_name, ci.ci_image AS item_image, ci.ci_quant AS item_quantity, ci.ci_quant_type AS item_quantity_type, ci.ci_mrp_price AS item_mrp, ci.ci_off_price AS item_offer_price, ub.ub_item_quantity AS item_quantity_selected FROM fns_category_item AS ci JOIN fns_user_bag AS ub ON ci.id = ub.ub_item_id WHERE ub.ub_cust_id = '".$userId."'";
    $result = mysqli_query($mysqli, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}