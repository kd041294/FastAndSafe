<?php

function addToCart($userId, $itemId, $quantity){
    include 'connection.php';
    $status = checkExistingItem($userId, $itemId);
    if($status === 0){
        $sql = "INSERT INTO user_cart(uc_ur_id, uc_ci_id, uc_ci_quantity) VALUES('".$userId."', '".$itemId."', '".$quantity."')";
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
    $sql = "SELECT * FROM user_cart WHERE uc_ur_id = '$userId' AND uc_ci_id = '$itemId'";
    if ($result = mysqli_query($mysqli, $sql)){
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

}

function removeFromCart($userId, $itemId){
    include 'connection.php';
    $sql = "DELETE FROM user_cart WHERE uc_ur_id = '$userId' AND uc_ci_id = '$itemId'";
    if ($result = mysqli_query($mysqli, $sql)){
        return 1;
    }else{
        return 0;
    }

}

function updateCartItem($userId, $itemId, $quantity){
    include 'connection.php';
    $sql = "UPDATE user_cart SET uc_ci_quantity = '$quantity' WHERE uc_ur_id = '$userId' AND uc_ci_id = '$itemId'";
    if (mysqli_query($mysqli, $sql)) {
        return 1;
    } else {
        return 0;
    }
}

function getCartValueAndCount($userId){
    include 'connection.php';
    $sql = "SELECT ci.ci_fs_price AS item_price, uc.uc_ci_quantity AS item_count FROM `category_item` 
        AS ci INNER JOIN `user_cart` AS uc ON ci.id = uc.uc_ci_id WHERE uc.uc_ur_id = '$userId'";

    $totalPrice = 0;
    $cartItemCount = 0;
    if ($result = mysqli_query($mysqli, $sql)){
        $cartItemCount = mysqli_num_rows($result);
        $_SESSION['user']['item_count'] = $cartItemCount;
        $totalPrice = 0;
        while($row = $result->fetch_assoc()){
            $totalPrice = $totalPrice + ((int)$row['item_price'] * (int)$row['item_count']);
        }
        $array["totalPrice"] = $totalPrice;
        $array["cartItemCount"] = $cartItemCount;
        return $array;
    }else{
        return 0;
    }
}

?>