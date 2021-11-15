<?php
$query = $_GET['query'];
$q1 = base64_decode($query);
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
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/loader.css" rel='stylesheet' type='text/css' />
        <link href="css/grocery.css" rel='stylesheet' type='text/css' />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="cover-spin"></div>
        <div class="content">
            <?php include 'navbar.php'; ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Atta & Maida</h3>
                        <p>Upto 20% off</p>
                        <a href="<?php echo $routesGorceries['a_m']; ?>"><img class="category-sec-img" src="img/groceries/atta-maida.png" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Cooking Oils</h3>
                        <p>Upto 15% off</p>
                        <a href="<?php echo $routesGorceries['c_o']; ?>"><img class="category-sec-img" src="img/groceries/cooking-oils.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Spices</h3>
                        <p>Upto 15% off</p>
                        <a href="<?php echo $routesGorceries['s_p']; ?>"><img class="category-sec-img" src="img/groceries/spices.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Rice</h3>
                        <p>Upto 25% off</p>
                        <a href="<?php echo $routesGorceries['r_e']; ?>"><img class="category-sec-img" src="img/groceries/rice.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Daal & Pulse</h3>
                        <p>Upto 20% off</p>
                        <a href="<?php echo $routesGorceries['d_p']; ?>"><img class="category-sec-img" src="img/groceries/daal-pulse.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Sugar & Salt</h3>
                        <p>Upto 10% off</p>
                        <a href="<?php echo $routesGorceries['s_s']; ?>"><img class="category-sec-img" src="img/groceries/salt-sugar.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Tea & Coffee</h3>
                        <p>Upto 12% off</p>
                        <a href="<?php echo $routesGorceries['t_c']; ?>"><img class="category-sec-img" src="img/groceries/tea-coffee.png" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Biscuits & Cookies</h3>
                        <p>Upto 10% off</p>
                        <a href="<?php echo $routesGorceries['b_c']; ?>"><img class="category-sec-img" src="img/groceries/biscuits-cookies.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Honey & Chyawanprash</h3>
                        <p>Upto 20% off</p>
                        <a href="<?php echo $routesGorceries['h_c']; ?>"><img class="category-sec-img" src="img/groceries/honey-chyan.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Cold Drinks & Juice</h3>
                        <p>Upto 10% off</p>
                        <a href="<?php echo $routesGorceries['d_j']; ?>"><img class="category-sec-img" src="img/groceries/cold-drink-juice.png" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Dry Fruits</h3>
                        <p>Upto 50% off</p>
                        <a href="<?php echo $routesGorceries['d_f']; ?>"><img class="category-sec-img" src="img/groceries/dry-fruits.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Noodles & Vermicelli</h3>
                        <p>Upto 20% off</p>
                        <a href="<?php echo $routesGorceries['n_v']; ?>"><img class="category-sec-img" src="img/groceries/noodles-vermi.jpg" /></a>
                    </div>
                    <div class="col-12 col-sm-4 gro-cards shadow bg-white rounded">
                        <h3>Dairy Products</h3>
                        <p>Upto 15% off</p>
                        <a href="<?php echo $routesGorceries['d_p']; ?>"><img class="category-sec-img" src="img/groceries/dairy-products.jpg" /></a>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </body>
</html>

