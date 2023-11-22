<?php
   session_start();
   error_reporting(0);
   require './api/constant-links.php';
   require './api/connection.php';
   require './api/important-functions.php';
   $id = $_SESSION['user']['id'];
   $sql = "SELECT fcc.cc_name AS c_name, fcc.cc_code AS c_code, fcc.cc_description AS c_des, fcc.cc_discount AS c_dis, fcc.cc_discount_type AS c_dis_type, fcc.cc_status AS c_status FROM fns_coupon_code AS fcc WHERE fcc.cc_status = '1'";
   $result = mysqli_query($mysqli, $sql);
   $num_rows = mysqli_num_rows($result);
   if ($num_rows > 0) {
      while($row = mysqli_fetch_assoc($result)) {
         $data[] = $row;
      }
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
      <link href="vendor/sidebar/demo.css" rel="stylesheet">
   </head>
   <body class="bg-light">
      <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
         <div class="font-weight-normal mb-0 d-flex align-items-center">
            <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
               <a class="text-dark me-3 fs-4" href="<?php echo $_SESSION["USER"]["CURRENT_URL"]; ?>"><i class="bi bi-chevron-left"></i></a>
               Offers
            </h6>
            <div class="ms-auto d-flex align-items-center">
               <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
            </div>
         </div>
      </div>
      <div class="osahan-giftcard p-3">
         <?php
            foreach($data as $x) {
         ?>
         <a class="text-dark text-decoration-none">
            <div class="osahan-gift d-flex gap-3 align-items-center bg-white
               shadow-sm rounded mb-3 overflow-hidden p-3">
               <div class="d-flex">
                  <i class="<?php if($x["c_dis_type"] == "1"){
                                       echo "bi bi-percent";
                                    } 
                                    if($x["c_dis_type"] == "2"){
                                       echo "bi bi-gift";
                                    }
                           ?> display-6 text-warning"></i>
               </div>
               <div>
                  <div class="gift-card">
                     <h6 class="mb-0 fw-bold text-success l-hght-18"><?php echo $x["c_name"]; ?></h6>
                     <span class="text-dark-50 small"><?php echo $x["c_des"]; ?></span>
                  </div>
               </div>
               <div class="ms-auto">
                  <p class="small mb-0 l-hght-10 text-success gift-code" id="myInput"><?php echo $x["c_code"]; ?></p>
               </div>
            </div>
         </a>
         <?php 
            }
         ?>
      </div>
      <?php include 'fixed-bottom.php'; ?>
      <?php include 'nav.php'; ?>
      <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
   </body>
</html>