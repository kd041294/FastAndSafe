<?php

    session_start();
    require 'connection.php';

    $USER_ID = $_SESSION['USER']['ID'];
    $ORD_ID = $_SESSION["USER"]['ORDER_ID'];
    $COUPON_ID = $_SESSION["USER"]['ORDER_COUPON_ID'];
    $ADD_ID = $_SESSION["USER"]['ORDER_ADDRESS_ID'];
    $DIS_APP = $_SESSION["USER"]['ORDER_DISCOUNT_APPLIED'];
    $INITIAL_AMOUNT = $_SESSION["USER"]['ORDER_INITIAL_PRICE'];
    $FINAL_PRICE = $_SESSION["USER"]['ORDER_FINAL_TOTAL_PRICE'];
    $PAY_MODE = $_POST["payMode"];
    $ORD_DATE = date("d/m/y");
    $ORD_ORD_STATUS = "1";
    $ORD_STATUS = "1";

    $sqlOrd = "INSERT INTO fns_orders(ord_id, ord_user_id, ord_coupon_id, ord_address_id, ord_total_item, ord_total_initial_amount, ord_discount_applied, ord_total_final_amount, ord_payment_mode, ord_date_time, ord_ord_status, ord_status)
			VALUES('".$ORD_ID."', '".$USER_ID."', '".$COUPON_ID."', '".$ADD_ID."', '4', '".$INITIAL_AMOUNT."', '".$DIS_APP."', '".$FINAL_PRICE."', '".$PAY_MODE."', '".$ORD_DATE."', '".$ORD_ORD_STATUS."', '".$ORD_STATUS."')";
    if (mysqli_query($mysqli, $sqlOrd)) {
        $sqlBagItems = "SELECT ub.ub_item_id AS item_id, ub.ub_item_quantity AS item_quantity, ci.ci_mrp_price AS item_mrp, ci.ci_off_price AS item_off_price FROM fns_user_bag  AS ub INNER JOIN fns_category_item  AS ci ON ub.ub_item_id = ci.id WHERE ub_cust_id = '$USER_ID'";
        $result = mysqli_query($mysqli, $sqlBagItems);
        while($row = $result->fetch_assoc()){
            $sqlOrdList = "INSERT INTO fns_order_list(ol_ord_id, ol_item_id, ol_ord_quant, ol_mrp, ol_final_price) VALUES('".$ORD_ID."', '".$row['item_id']."', '".$row['item_quantity']."', '".$row['item_mrp']."', '".$row['item_off_price']."')";
            if(mysqli_query($mysqli, $sqlOrdList)){
                continue;
            }
        }
        $sqlBagDelete = "DELETE FROM fns_user_bag WHERE ub_cust_id = '$USER_ID'";
        if(mysqli_query($mysqli, $sqlBagDelete)){
            echo json_encode(array('status' => "1"));
        }
    }
    else{
        echo json_encode(array('status' => "0"));
    }
?>