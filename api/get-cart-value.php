<?php
include 'connection.php';
if(!empty($_SESSION['user']['id'])){
    $userId = $_SESSION['user']['id'];
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
    }
}
else{
    $totalPrice = 0;
    $cartItemCount = 0;
}

?>