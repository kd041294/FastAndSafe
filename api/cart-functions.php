<?php

function addToCart($userId, $itemId, $quantity){
    include 'connection.php';
    $status = checkExistingItem($userId, $itemId);
    if($status === 0){
        $sql = "INSERT INTO fns_user_bag(ub_cust_id, ub_item_id, ub_item_quantity) VALUES('".$userId."', '".$itemId."', '".$quantity."')";
        if (mysqli_query($mysqli, $sql)){
            return 1;
        }   
        else{
            return 0;
        }    
    }
    else{
        $result = updateCartItem($userId, $itemId, $quantity);
        if($result === 0){
            return 0;
        }
        else{
            return 1;
        }
    }
}

function checkExistingItem($userId, $itemId){
    include 'connection.php';
    $sql = "SELECT * FROM fns_user_bag WHERE ub_cust_id = '$userId' AND ub_item_id = '$itemId'";
    if ($result = mysqli_query($mysqli, $sql)){
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function updateCartItem($userId, $itemId, $quantity){
    require 'connection.php';
    $sql = "UPDATE fns_user_bag SET ub_item_quantity = '$quantity' WHERE ub_cust_id = '$userId' AND ub_item_id = '$itemId'";
    if (mysqli_query($mysqli, $sql)) {
        return 1;
    } else {
        return 0;
    }
}

function deleteCartItem($userId, $itemId){
    require 'connection.php';
    $sql = "DELETE FROM fns_user_bag WHERE ub_cust_id = '$userId' AND ub_item_id = '$itemId'";
    if (mysqli_query($mysqli, $sql)) {
        return 1;
    } else {
        return 0;
    }
}
?>