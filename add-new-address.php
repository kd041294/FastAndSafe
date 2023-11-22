<?php
    session_start();
    error_reporting(0);
    require './api/constant-links.php';
    if(empty($_SESSION['user']['id'])){
        echo "<script>window.open('sign-in.php', '_self')</script>";
    } 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta property="og:title" content="Vide" />
        <meta name="keywords" content="fast and safe offers" />
        <link rel="icon" href="img/logo.png" type="image/icon type">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="free home delivery, neat and clean delivery" />
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
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/icons/icofont.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link rel="stylesheet" type="text/css" href="vendor/slick/slick.min.css"/>
        <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.min.css"/>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/loader.css" rel="stylesheet">
        <link href="vendor/sidebar/demo.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div id="cover-spin"></div>
        <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
            <div class="font-weight-normal mb-0 d-flex align-items-center">
                <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
                    <a class="text-dark me-3 fs-4" href="<?php echo $routes['home']; ?>"><i class="bi bi-chevron-left"></i></a>
                    Add new address
                </h6>
                <div class="ms-auto d-flex align-items-center">
                    <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
                </div>
            </div>
        </div>
        <div class="p-4 shadow m-2">
            <form>
                <div class="row m-1" id="radioDiv" >
                    <div class="form-check col-6">
                        <label class="form-check-label" for="flexRadioDefault1">
                        <i class="bi bi-house"></i> Home
                        </label>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" name="aType" value="0" checked>
                    </div>
                    <div class="form-check col-6">
                        <label class="form-check-label" for="flexRadioDefault2">
                        <i class="bi bi-building"></i> Work
                        </label>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" name="aType" value="1">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Full Name</label>
                        <input type="text" class="form-control"  id="fName" placeholder="Enter Name">
                    </div>
                </div>
                <div class="form-row mb-2">
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Mobile Number</label>
                        <input type="text" class="form-control" id="numb" placeholder="Enter Number">
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress">Flat No./ House No.</label>
                    <input type="text" class="form-control"  id="fNo" placeholder="Flat No./ Street No.">
                </div>
                <div class="form-group mb-2">
                    <label for="inputAddress2">Full Address</label>
                    <input type="text" class="form-control"  id="fAdd" placeholder="Full Address">
                </div>
                <div class="row mb-2">
                    <div class="form-group col-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="city" >
                    </div>
                    
                    <div class="form-group col-6">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="pin">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <input type="text" class="form-control" id="state" value="West Bengal" placeholder="West Bengal" readonly>
                    </div>
                </div>

            </form>
            <div class="row">
                <p class="text-danger" id="fail" ></p>
            </div>
        </div>
        <div class="osahan-footer fixed-bottom p-3">
            <button type="button" class="btn btn-success btn-lg w-100 shadow" id="save-button" >SAVE</button>
        </div>
        <?php include 'nav.php'; ?>
        <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/add-new-address.js"></script>
    </body>
</html>