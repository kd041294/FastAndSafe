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
                unset($_SESSION['user']['coupon_name']);
                unset($_SESSION['user']['discount_price']);
                unset($_SESSION['user']['delivery_fee']);
                unset($_SESSION['user']['total_amount']);
                unset($_SESSION['user']['extra_info']);
            ?>
            <?Php
                $userId = $_SESSION['user']['id'];  
                $sql = "SELECT ci.id AS item_id, ci.ci_name AS item_name, ci.ci_fs_price AS item_price, uc.uc_ci_quantity AS item_count FROM `category_item` 
                AS ci INNER JOIN `user_cart` AS uc ON ci.id = uc.uc_ci_id WHERE uc.uc_ur_id = '$userId'";

                $result = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($result);
                $subTotal = 0;
                $deliveryFee = 0;
            ?>
            <div class="pt-4">
                <div class="container cart">
                    <?php
                        if($count > 0){
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-12 bg-white rounded shadow-sm mb-5">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="cart-heading">
                                            <h3><b>My Cart</b></h3>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="p-2 px-3 text-uppercase">Item</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Quantity</div>
                                            </th>
                                            <th scope="col--xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Price</div>
                                            </th>
                                            <th scope="col-xs-3" class="border-0 bg-light">
                                                <div class="py-2 text-uppercase">Remove</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($row = $result->fetch_assoc()){
                                                $subTotal = $subTotal + ((int)$row['item_price']*(int)$row['item_count']);
                                        ?>
                                            <tr class="items">
                                                <th scope="" class="border-0 col-3">
                                                    <p><?php echo $row['item_name']; ?></p>
                                                </th>
                                                <input type="hidden" id="itemId" value="<?php echo $row['item_id']; ?>" />
                                                <td class="border-0 align-middle col-3"><input class="quantity" type="number" id="quantity" value="<?php echo $row['item_count']; ?>" min="1" max="5" /></td>
                                                <td class="border-0 align-middle col-3"><strong><?php echo $row['item_price']; ?></strong></td>
                                                <td class="border-0 align-middle col-3"><a href="#" class="text-dark delete-button"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-sm-6 col-12">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                            <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                            <p id="validity"></p>
                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" placeholder="Apply coupon"  id="coupon-value" aria-describedby="button-addon3" class="form-control border-0">
                                <div class="input-group-append border-0">
                                    <button type="button" id="coupon-button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                                </div>
                            </div>
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>
                                <textarea name="" cols="30" rows="2" class="form-control" id="extInfo" ></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                            <div class="">
                                <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>Rs. <span id="tTotal-price"><?php echo $subTotal.'.00'; ?></span></strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Coupon Applied</strong><strong>(-)Rs. <span id="coupon-price">00.00</span></strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Delivery Fees</strong><strong>(+)Rs. <span id="delivery-fees"><?php if( $subTotal <= 500 ){ echo '50.00'; $deliveryFee = 50;} else{ echo "00.00"; $deliveryFee = 0;} ?></span></strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom">
                                        <strong class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">Rs. <span id="total-price"><?php echo $subTotal + $deliveryFee; ?>.00</span></h5>
                                    </li>
                                </ul>
                                <a id="to-checkOut" class="btn btn-dark rounded-pill py-2 btn-block" style="color: white;">Procceed to checkout</a>
                                <input type="hidden" id="appCode" value="0.0" readonly/>
                                <input type="hidden" id="appCodeDis" value="0.0" readonly/>
                                <input type="hidden" id="totalPrice" value="0.0" readonly/>
                            </div>
                        </div>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="row py-5 p-4 mt-3 bg-white rounded shadow-sm">
                        <div class="col-12 col-sm-12">
                            <h3><b>My Cart</b></h3>
                        </div>
                        <div class="col-12 col-sm-12 empty-cart">
                            <p>Your cart is Empty !</p>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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

