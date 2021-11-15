<?php
//starting session
session_start();
include 'connection.php';
include 'important-functions.php';

unset($_SESSION['user']['coupon_name']);
unset($_SESSION['user']['discount_price']);
unset($_SESSION['user']['delivery_fee']);
unset($_SESSION['user']['total_amount']);
unset($_SESSION['user']['extra_info']);

$userId = $_SESSION['user']['id'];
$name = $_POST['fullName'];
$number = $_POST['mobNumber'];
$hNo = $_POST['houseNo'];
$fullAddress = $_POST['fullAddress'];
$landmark = $_POST['landMark'];
$pin = $_POST['pinCode'];
$city = $_POST['city'];
$state = $_POST['state'];

$couponName = $_POST['cName'];
$totalCouponPrice = $_POST['cValue'];
$dCharge = $_POST['delFees'];
$totalPriceOrder = $_POST['tPrice'];
$instruction = $_POST['exInfo'];

$dTime = $_POST['time'];
$mode = $_POST['mode'];
$itemCount = $_SESSION['user']['item_count'];
unset($_SESSION['user']['item_count']);

$sql = "INSERT INTO user_address_information(UAI_UR_Id, UAI_Number,  UAI_Fullname, UAI_Hno, UAI_Full_Address, UAI_Landmark, UAI_City, UAI_State, UAI_Pincode) "
        . "VALUES ('".$userId."', '".$number."','".$name."', '".$hNo."', '".$fullAddress."', '".$landmark."', '".$city."', '".$state."', '".$pin."' )";

if(mysqli_query($mysqli, $sql)) {  
    $addId = get_user_address_id($userId, $number);
    $str1 = $addId.'ABCDEF';
    $characters = $str1.$number; 
    $length = strlen($characters);
    $randomString = "";
    for ($i = 0; $i < 8; $i++) { 
        $index = rand(0, $length - 1); 
        $randomString = $randomString.$characters[$index];
    } 
    $ordID = 'ORD'.$randomString;
    $status = "success";
    $date = date("l jS \of F Y h:i:s A");
    $sqlOrder = "INSERT INTO orders(ord_id, ord_ur_id, ord_add_id, ord_item_count, ord_coupon_name, ord_discount_amt, ord_delivery_fees, ord_total_price, ord_extra_info, ord_delivery_timing, ord_pay_mode, ord_date, ord_status) VALUES"
            . "('".$ordID."', '".$userId."', '".$addId."', '".$itemCount."', '".$couponName."', '".$totalCouponPrice."', '".$dCharge."', '".$totalPriceOrder."', '".$instruction."', '".$dTime."', '".$mode."', '".$date."', '".$status."')";
    
    if(mysqli_query($mysqli, $sqlOrder)){
        $sqlCartItems = "SELECT uc.uc_ci_id AS ciId, uc.uc_ci_quantity AS quant, ci.ci_fs_price AS fsPrice, ci.ci_mr_price AS mrPrice  
                        FROM user_cart AS uc 
                        INNER JOIN category_item AS ci ON uc.uc_ci_id = ci.id WHERE uc_ur_id = '$userId'";
        $result = mysqli_query($mysqli, $sqlCartItems);
        while($row = $result->fetch_assoc()){
            $sqlOrdList = "INSERT INTO order_list(ol_or_id, ol_ci_id, ol_ci_quantity, ol_ci_mr_price, ol_ci_fs_price) VALUES('".$ordID."', '".$row['ciId']."', '".$row['quant']."', '".$row['mrPrice']."', '".$row['fsPrice']."')";
            if(mysqli_query($mysqli, $sqlOrdList)){
                continue;
            }
        }
        $sqlClearCart = "DELETE FROM user_cart WHERE uc_ur_id = $userId";
        if(mysqli_query($mysqli, $sqlClearCart)){
            $messageOrderConfirmAdminUser = "Hi,\nYour Order is confirmed.\nRegards,\nFastAndSafe";
            $messageOrderReceivedAdmin = "New Order Received From User.\nRegards,\nFastAndSafe";
            $adminNumber = "7908920442";
            send_message($number, $messageOrderConfirmAdminUser);
            send_message($adminNumber, $messageOrderReceivedAdmin);
            echo json_encode(array('status' => 'success'));
        }
    }
    else{
        echo json_encode(array('status' => 'fail'));
    }
}
else{
    echo json_encode(array('status' => 'fail'));
}
?>  