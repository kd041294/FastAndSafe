<?php
   session_start();
   error_reporting(0);
   require './api/constant-links.php';
   if(empty($_SESSION['USER']['ID'])){
      echo "<script>window.open('sign-in.php', '_self')</script>";
   } 
   $CurrentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   $_SESSION["USER"]["CURRENT_URL"] = $CurrentUrl;
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
      <link href="css/style.css" rel="stylesheet" />
      <link href="css/loader.css" rel="stylesheet">
      <link href="vendor/sidebar/demo.css" rel="stylesheet" />
   </head>
   <body class="mb-5 pb-5">
      <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
         <div class="font-weight-normal mb-0 d-flex align-items-center">
            <h4 class="m-0 fw-bold text-black">Fast<span class="text-success">&</span>Safe</h4>
            <div class="ms-auto d-flex align-items-center"> 
               <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
            </div>
         </div>
         <div class="input-group input-group-lg bg-white border-0 shadow-sm rounded overflow-hiddem mt-3">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search text-muted"></i></span>
            <input type="text" class="form-control border-0 ps-0" placeholder="Search for Products..">
         </div>
      </div>
      <div id="cover-spin"></div>
      <?php include 'our-services.php'; ?>
      <?php include 'today-offers.php'; ?>
      <?php include 'shop-by-category.php'; ?>
      <?php include 'special-offers.php'; ?>
      <?php include 'fixed-bottom.php'; ?>
      <?php include 'nav.php'; ?> 
      </div>
    </div>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
      <script type="text/javascript" src="js/add-to-bag.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
      <script type="text/javascript" src="js/add-to-bag.js"></script>
   </body>
</html>