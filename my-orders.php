<?php
   session_start();
   error_reporting(0);
   require './api/constant-links.php';
   require './api/important-functions.php';
   $userId = $_SESSION['user']['id'];
   $data = get_user_orders($userId);
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
   <body class="bg-light pb-5 mb-5">
      <?php require 'nav.php' ?>
      <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
         <div class="font-weight-normal mb-0 d-flex align-items-center">         
            <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
               <a class="text-dark me-3 fs-4" href="<?php echo $routes['home']; ?>"><i class="bi bi-chevron-left"></i></a>
               My Orders
            </h6>
            <div class="ms-auto d-flex align-items-center"> 
               <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
            </div>
         </div>
      </div>
      
      <?php
      if($data != null){
         foreach($data as $x) {
      ?>
      <div class="bg-white shadow m-2 rounded p-3">
         <div class="card od-card border-0">
            <div class="d-flex bag-item"> 
               <div class="bag-item-right w-100 border rounded" style="font-size: 80%">
                  <div class="card-body bg-light p-2">
                     <div class="row">
                        <p class="col-6"><b>Order ID: </b><span>#<?php echo isset($x['o_code']) ? $x['o_code'] : "NA"; ?></span></p>
                        <p class="col-6"><b>Order Status : </b>
                           <span>
                              <!-- 0 = Pending, 1 = Confirmed, 2 = In Transist, 3 = Delivered -->
                              <?php
                                 if($x["o_status"] == "0"){
                                    echo isset($x['o_code']) ? "Pending" : "NA";
                                 }
                                 if($x["o_status"] == "1"){
                                    echo isset($x['o_code']) ? "Confirmed" : "NA";
                                 }
                                 if($x["o_status"] == "2"){
                                    echo isset($x['o_code']) ? "In Transist" : "NA";
                                 }
                                 if($x["o_status"] == "3"){
                                    echo isset($x['o_code']) ? "Delivered" : "NA";
                                 }
                                 $encryptOrdID = encrypt($x['o_code']);
                              ?>
                           </span>
                        </p>
                     </div>
                     <p class="card-title mt-2 text-black fw-bold">Order Total : ₹ <b><span><?php echo isset($x['o_final_amount']) ? $x['o_final_amount'] : "NA"; ?></span></b></p>
                     <div class="d-flex align-items-center justify-content-between gap-2">
                        <div>
                           <p><b>Order Date&Time : </b><span><?php echo isset($x['o_date_time']) ? $x['o_date_time'] : "NA"; ?></span></p>
                        </div>
                        <div class="quantity-btn">
                           <div class="input-group">
                                 <a href="<?php echo $routes['orders-details'].'?oid='.trim($encryptOrdID); ?>" ><button class="btn btn-success p-1" style="font-size: 100%;" >Details </button></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
            }
         }
      else{
         ?>
         <div class="bg-white shadow m-2 rounded p-3">
            <p><h2>Your ORDER cart is empty ! <i class="bi bi-emoji-frown"></i></h2></p>
         </div>
      <?php
      }
      ?>
      <?php require 'fixed-bottom.php' ?>
      <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
   </body>
</html>