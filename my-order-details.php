<?php
    require './api/constant-links.php';
    require './api/important-functions.php';
    $id = $_SESSION['user']['id'];
    if(trim(decrypt($_GET['oid'])) == trim("#00#")){
        echo "Service Not Available For Now";
    }else{
        echo decrypt($_GET['oid']);
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
   <body class="bg-light mb-5 pb-5">
      <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header">
         <div class="font-weight-normal mb-0 d-flex align-items-center">
            <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
               <a class="text-dark me-3 fs-4" href="<?php echo $routes['home']; ?>"><i class="bi bi-chevron-left"></i></a>
               <span>
               <b>Order Details</b><br><small>Order ID : #12365789</small>
               </span>
            </h6>
            <div class="ms-auto d-flex align-items-center">
               <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
            </div>
         </div>
      </div>
      <!-- body -->
        <div class="bg-white shadow m-1 rounded p-2">
            <div class="d-flex align-items-center justify-content-between">
            <small><b>Order ID : #12365789</b></small>
                <div class="text-success"><i class="bi bi-dot"></i>&nbsp;Pending&nbsp; <i class="bi bi-clock-history"></i></div>
            </div>
            <div class="text-muted small">22/03/2022, 11:36 PM</div>
            <hr>
            <div class="row m-0">
                <div class="col-1 d-flex justify-content-center ps-0">
                <div class="d-block">
                    <div class="lh-1 mt-1"><i class="bi bi-circle-fill text-danger"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-danger"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-danger"></i></div>
                    <div class="lh-1"><i class="bi bi-dot text-danger"></i></div>
                    <div class="lh-1 mt-1"><i class="bi bi-circle-fill text-danger"></i></div>
                </div>
                </div>
                <div class="col-11 ps-0">
                <div class="mb-3">
                    <div class="h6 mb-1 text-danger">Order Placed</div>
                    <div class="text-muted small">On Mon, 24th Feb'22</div>
                </div>
                <div>
                    <div class="h6 mb-1 text-secondary">Estimated Delivery</div>
                    <div class="text-muted small">On Sat, 29th Feb'22</div>
                </div>
                </div>
            </div>
        </div>
        <!-- product -->
        <div class="bg-white shadow m-1 rounded">
            <p class="p-1">
                <h6 class="mb-3 text-black fw-bold m-2">1 item</h6>
            </p>
            <div class="card od-card border-0">
                <div class="d-flex bag-item">
                    <div class="bag-item-right w-100" style="font-size: 80%">
                        <div class="card-body pe-0 py-0 row">
                            <div class="col-8">
                                <p class="col-8 mt-1 text-black fw-bold">Parle-G Biscuit huello ehbgieg</p>
                                <p>10 Kg <span> X1</span></p> 
                            </div>  
                            <div class="col-4 text-right">
                                <p class="card-title mt-2 text-black fw-bold">₹80.00 </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-3">
            <div class="card od-card border-0">
                <div class="d-flex bag-item">
                    <div class="bag-item-right w-100" style="font-size: 80%">
                        <div class="card-body pe-0 py-0 row">
                            <div class="col-8">
                                <p class="col-8 mt-1 text-black fw-bold">Parle-G Biscuit huello ehbgieg</p>
                                <p>10 Kg <span> X1</span></p> 
                            </div>  
                            <div class="col-4">
                                <p class="card-title mt-2 text-black fw-bold">₹80.00 </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- price -->
        <div class="bg-white shadow rounded m-1 p-2">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div class="text-muted">Product Charger</div>
                <div class="price">Rs.750</div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-muted">Shipping charges</div>
                <div class="text-success free">FREE</div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="text-muted">Applied Coupon</div>
                <div class="text-danger free">NA</div>
            </div>
            <hr class="my-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                <h6 class="mb-0 text-dark">Order Total</h6>
                <small class="text-muted">inclusive of all taxes</small>
                </div>
                <div class="text-success h5">Rs.750</div>
            </div>
        </div>
        <!-- delivery address -->
        <div class="bg-white shadow m-1 rounded p-2">
            <h6 class="mb-3 text-black fw-bold">Delivery Address</h6>
            <div>
                <h6 class="mb-1 text-success">John Doe</h6>
                <p class="text-muted">9128379129</p>
            </div>
            <hr>
            <p class="text-muted m-0 d-flex align-items-center"><i class="bi bi-geo-alt-fill me-3 fs-5"></i>
                Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore-560016
            </p>
        </div>
        <?php include 'nav.php'; ?>
        <?php include 'fixed-bottom.php'; ?>
            <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
        <script src="js/custom.js"></script>
   </body>
</html>