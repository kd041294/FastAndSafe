<?php
$q = $_GET['q'];
$id = base64_decode($q);
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Fast and Safe | Free Home Delivery | Online Supper Market </title>
        <meta property="og:title" content="Vide" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="img/logo.png" type="image/icon type">
        <meta name="keywords" content="free home delivery, neat and clean delivery" />
        <meta name="keywords" content="fast and safe offers" />
        <meta name="keywords" content="fast and safe Login, fast and safe signup, free home home delivery, fastest home delivery"/>
        <meta name="keywords" content="fast and safe grocery delivery, fast and safe meat and fish delivery, fast and safe chicken delivery, fast and safe mutton delivery, fast and safe stationary delivery, fast and safe medicine delivery, fast and safe water jars delivery"/>
        <meta name="keywords" content="online grocery store,online grocery kolkata,online grocery howrah, online grocery shopping, online grocery store,online supermarket"/>
        <meta name="keywords" content="onilne fruits store, online raw fruits store, online raw fruits store kolkata, online fruits store kolkata,online raw fruits store howrah, online fruits store howrah, online raw fruits shopping, online vegetables shopping,online supermarket"/>
        <meta name="keywords" content="onilne vegetables store, online raw vegetables store, online raw vegetables store kolkata, online vegetables store kolkata,online raw vegetables store howrah, online vegetables store howrah, online raw vegetables shopping, online vegetables shopping,online supermarket"/>
        <meta name="keywords" content="onilne chicken store, online raw chicken store, online raw chicken store kolkata, online chicken store kolkata,online raw chicken store howrah, online chicken store howrah, online raw chicken shopping, online chicken shopping,online supermarket"/>
        <meta name="keywords" content="online water jars supply, online kinley water jars, online bisleri water jar, online quinch water jars, online local water jars"/>
        <meta name="keywords" content="online medicine delivery, huge discount on medicine delivery, discount on medicine delivery" />
        <meta name="keywords" content="online stationary store, online book store, online pen store, online pencil store, online pen and pencil store" />
        <meta name="description" content="Fresh veggies, grocery and more | Delivering all across Kolkata | Fast, Safe and Ever-Fresh. Vegetables, Fruits, Groceries and other household items, at a never-before price, delivered in 2 hours of order placement. Delivery is free. Fast, Fresh and Safe only with Fast & Safe.">
        <link href="css/my-order-details-style.css" rel='stylesheet' type='text/css' />
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/loader.css" rel='stylesheet' type='text/css' />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
    </head>
    <body>
        <div id="cover-spin"></div>
        <div class="content">
            <?php include 'navbar.php'; ?>
            <?php
                if(empty($_SESSION['user']['id'])){
                    echo "<script>window.open('login.php', '_self')</script>";
                }
            ?>
            <?Php
                $userId = $_SESSION['user']['id'];  
                $sql = "SELECT ol.ol_or_id AS orID, ol.ol_ci_quantity AS item_count, ol.ol_ci_fs_price AS price, ci.ci_name AS name, ci.ci_quantity AS quant, ci.ci_quantity_type AS quant_type,
                        ord.ord_delivery_fees AS deFee, ord.ord_coupon_name AS coupon_code, ord.ord_discount_amt AS discount, ord.ord_total_price AS total_price FROM order_list 
                        AS ol INNER JOIN category_item AS ci INNER JOIN orders AS ord 
                        ON ol.ol_ci_id = ci.id AND ord.ord_id = ol.ol_or_id WHERE ord.ord_id = '$id' AND ord_ur_id = '$userId'";
                $result = mysqli_query($mysqli, $sql);
                $ordListCount = mysqli_num_rows ($result);
            ?>
            <div class="pt-4">
                <div class="container cart">
                    <div class="row">
                        <div class="col-sm-12 col-12 bg-white rounded shadow-sm mb-5">
                        <?php
                            if($ordListCount == 0){
                                echo "<p style='font-size: 140%; padding: 3%;'><b>No order Exits with such order ID .!</b></p>";
                            }
                            else{
                        ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="cart-heading">
                                            <h4><b>My Orders</b></h4><br>
                                            <h6><b>Order ID : <?php  echo $id; ?></b></h6>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="p-2 text-uppercase">Name</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Price</div>
                                            </th>
                                            <th scope="col--xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Count</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Total</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $totalPrice = 0;
                                            $discount = 0;
                                            $delFee = 0;
                                            while($row = $result->fetch_assoc()){
                                                $itemPrice = (int)$row['price']*(int)$row['item_count'];
                                                $totalPrice = $totalPrice + $itemPrice;
                                                $discount =  $row['discount'];
                                                $delFee = $row['deFee'];
                                        ?>
                                            <tr class="items">
                                                <td class="border-0 align-middle col-3"><?php echo $row['name'].'<br>('.$row['quant'].' '.$row['quant_type'].')'; ?></td>
                                                <td class="border-0 align-middle col-3"><?php echo $row['price']; ?></td>
                                                <td class="border-0 align-middle col-3"><?php echo 'X'.$row['item_count']; ?></td>
                                                <td class="border-0 align-middle col-3"><?php echo $itemPrice; ?></td>  
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <div class="row" id="calculation">
                                <p><b>Sub Total :</b> Rs. <span><?php echo $totalPrice.'.00';?></span></p>
                            </div>
                            <div class="row" id="calculation">
                                <p><b>Discount :</b> (-)Rs. <span><?php echo $discount;?></span></p>
                            </div>
                            <div class="row" id="calculation">
                                <p><b>Delivery Fees :</b> (+)Rs. <span><?php echo $delFee;?></span></p>
                            </div>
                            <hr>
                            <div class="row" id="calculation">
                                <p><b>Total Paid Amount :</b> Rs. <span><?php echo (((int)$totalPrice + (int)$delFee) - (int)$discount).".00";?></span></p>
                            </div>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#cover-spin").hide();
                $(".content").show();
            });
        </script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/update-cart-items.js" type="text/javascript"></script> 
        <script src="js/checkOut-CouponLogic.js" type="text/javascript" ></script>
        <script src="js/to-CheckOut.js" type="text/javascript" ></script>
    </body>
</html>

