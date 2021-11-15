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
        <meta name="description" content="Fresh veggies, grocery and more | Delivering all across Kolkata | Fast, Safe and Ever-Fresh. Vegetables, Fruits, Groceries and other household items, at a never-before price, delivered in 2 hours of order placement. Delivery is free. Fast, Fresh and Safe only with Fast & Safe." />
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/loader.css" rel='stylesheet' type='text/css' />
        <link href="css/my-offers.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="cover-spin"></div>
        <?php include 'navbar.php'; ?>
        <?php
            if(empty($_SESSION['user']['id'])){
                echo "<script>window.open('login.php', '_self')</script>";
            }
            else{
            $userId = $_SESSION['user']['id']; 
            $sql = "SELECT o.uo_offer_name AS name, o.uo_offer_code AS code, o.uo_offer_discount As dis, o.uo_offer_description AS desp, 
                    o.uo_status FROM user_offers AS o WHERE o.uo_status = '1' AND o. uo_user_id = '$userId'";
            $result = mysqli_query($mysqli, $sql);
            $count = mysqli_num_rows($result);;    
        ?>
        <div class="content container">
            <?php
                if($count < 1){
            ?>
                <div class="col-sm-12 col-12">
                    <div class="special-cards shadow bg-white rounded heading-offer">
                        <p>Hi, we do not have any offers for you. Now!</p>
                        <a href="<?php echo $routes['index']; ?>"><img src="img/offer/no_offer.jpg" alt="No Offer" width="100%" /></a>
                    </div>
                </div>
            <?php
                }
                else{
            ?>
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <div class="special-cards shadow bg-white rounded heading-offer">
                            <p>Hi, your offers</p>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                    while($row = $result->fetch_assoc()){
                ?>
                        <div class="row shadow bg-white rounded offer">
                            <div class="col-sm-4 col-4 pt-2 bg-light border-right">
                                <p class="offer-banner"><b><?php echo $row['dis']; ?>% OFF</b></p>
                            </div>
                            <div class="col-sm-8 col-8 text-left bg-light">
                                <div class="offer-name pt-2">
                                    <p><?php echo $row['name']; ?></p>
                                </div>
                                <?php
                                    $des = explode(".",$row['desp']);
                                ?>
                                <div class="offer-des text-left">
                                    <ul>
                                        <?php
                                            foreach ($des as $values){
                                                echo '<li>'.$values.'</li>';
                                            }
                                        ?>
                                    </ul>  
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
        <?php
            }
        ?>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#cover-spin").hide();
                $(".content").show();
            });
        </script>
        <script src="js/image-slider.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/add-to-cart.js" type="text/javascript" ></script>
    </body>
</html>

