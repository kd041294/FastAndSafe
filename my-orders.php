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
        <link href="css/my-cart-style.css" rel='stylesheet' type='text/css' />
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
                $sql = "SELECT * FROM orders WHERE ord_ur_id = '$userId' ORDER BY id DESC";
                $result = mysqli_query($mysqli, $sql);
                $ordCount = mysqli_num_rows ($result);
            ?>
            <div class="pt-4">
                <div class="container cart">
                    <div class="row">
                        <div class="col-sm-12 col-12 bg-white rounded shadow-sm mb-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="cart-heading">
                                            <h3><b>My Orders</b></h3>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <?php
                                            if($ordCount == 0){
                                                echo "<h5>You haven't place any order yet .!</h5>";
                                            }
                                            else{
                                        ?>
                                        <tr>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="p-2 text-uppercase">Orders ID</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Amount</div>
                                            </th>
                                            <th scope="col--xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Item Count</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Details</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Status</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                while($row = $result->fetch_assoc()){
                                                    $id = base64_encode($row['ord_id']); 
                                                    $status = "";
                                                    if($row['ord_admin_status'] == "1"){
                                                        $status = "Pending";
                                                    }
                                                    if($row['ord_admin_status'] == "2"){
                                                        $status = "Order Received";
                                                    }
                                                    if($row['ord_admin_status'] == "3"){
                                                        $status = "Order Ready";
                                                    }
                                                    if($row['ord_admin_status'] == "4"){
                                                        $status = "Out For Delivery";
                                                    }
                                                    if($row['ord_admin_status'] == "5"){
                                                        $status = "Delivered";
                                                    }
                                            ?>
                                            <tr class="items">
                                                <td class="border-0 align-middle col-3"><?php echo $row['ord_id']; ?></td>
                                                <td class="border-0 align-middle col-3"><?php echo $row['ord_total_price']; ?></td>
                                                <td class="border-0 align-middle col-3"><?php echo $row['ord_item_count']; ?></td>
                                                <td class="border-0 align-middle col-3"><a href="<?php echo $routes['my-order-details'].'?q='.$id; ?>">Click Here</a></td>
                                                <td class="border-0 align-middle col-3"><?php echo $status; ?></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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

