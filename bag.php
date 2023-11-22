<?php
   session_start();
   error_reporting(0);
   if(empty($_SESSION['USER']['ID'])){
      echo "<script>window.open('sign-in.php', '_self')</script>";
   } 
   require './api/important-functions.php';
   require './api/constant-links.php';
   $userId = $_SESSION['USER']['ID'];
   $data = get_user_bag_items($userId);   
   $defaultAdd = get_user_default_address($userId);

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
      <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
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
   <body class="bg-light pb-5 mb-5">
      <div id="cover-spin"></div>
      <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
         <div class="font-weight-normal mb-0 d-flex align-items-center">
            <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
               <a class="text-dark me-3 fs-4" href="<?php echo $routes['home']; ?>"><i class="bi bi-chevron-left"></i></a>
               My Bag
            </h6>
         </div>
      </div>
      <?php
         $itemToalPrice = 0;
         if($data != null){
            foreach($data as $x) {
            $itemToalPrice = $itemToalPrice + (int)$x["item_offer_price"];
      ?>
      <div class="bg-white shadow m-2 rounded p-3">
         <div class="card od-card border-0">
            <div class="d-flex bag-item">
               <div class="bag-item-left">
                  <div class="slider-for border rounded-3 mx-1 mb-1">
                     <div class="product1"><img src="data:image/jpeg;base64,<?php echo base64_encode($x["item_image"]); ?>" class="img-fluid rounded-3" alt="">
                     </div>
                  </div>
               </div>
               <div class="bag-item-right w-100" style="font-size: 80%">
                  <div class="card-body pe-0 py-0">
                     <p class="card-text mb-0 mt-1 text-black fw-bold"><?php echo $x["item_name"]; ?></p>
                     <p class="card-title mt-2 text-black fw-bold">₹ <?php echo $x["item_offer_price"]; ?>
                        <small class="text-decoration-line-through text-muted text-danger fw-light">₹ <?php echo $x["item_mrp"]; ?></small></p>
                     <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="size-btn ">
                           <div>
                              <button type="button" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo $x["item_quantity"]; ?> <?php echo $x["item_quantity_type"]; ?></button>
                           </div>
                        </div>
                        <div class="quantity-btn">
                        <div class="input-group input-group-sm border rounded overflow-hiddem">
                            <div class="btn btn-light text-success minus border-0 bg-white" onclick="return changeItemDeValue(<?php echo $x['item_id']; ?>, <?php echo $x['item_quantity_selected']; ?>)"><i class="bi bi-dash"></i></div>
                            <input type="text" class="form-control text-center box border-0 bg-white" value="<?php echo $x['item_quantity_selected']; ?>" readonly/>
                            <div class="btn btn-light text-success plus border-0 bg-white" onclick="return changeItemInValue(<?php echo $x['item_id']; ?>, <?php echo $x['item_quantity_selected']; ?>)"><i class="bi bi-plus"></i></div>
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
      ?>
      <div class="bg-white shadow m-2 p-2">
         <form class="form-inline row">
            <div class="form-group mb-2 col-8">
            <input type="text" class="form-control" id="cCode" maxlength="8" style="text-transform:uppercase" placeholder="Apply Code">
            </div>
            <button type="button" id="coupon-button" class="btn btn-success mb-2 col-3" >Apply</button>
         </form>
         <p id="invalidRes" class="text-danger" style="font-size: 70%;"></p>
         <p id="vaildRes" class="text-success" style="font-size: 70%; font-weight: bold;"></p>
      </div>
      <div class="bg-white shadow m-2  mb-4 p-3">
         <h6 class="mb-3 text-black fw-bold">Price Summary</h6>
         <div class="d-flex justify-content-between align-items-center mb-2">
            <div class="text-muted">Item Total</div>
            <div>Rs. <span id="itemsInitialprice">00.00</span></div>
         </div>
         <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-muted">Delivery charge</div>
            <div class="text-success free">FREE</div>
         </div>
         <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="text-muted">Discount Applied</div>
            <div class="text-danger free">Rs. <span id="discountPrice">00.00</span></div>
         </div>
         <hr class="my-3">
         <div class="d-flex justify-content-between align-items-center">
            <div class="text-danger"><b>Amount To Pay</b></div>
            <div class="text-danger"><b>Rs. <span id="finalTotalPrice">00.00</span></b></div>
         </div>
      </div>
      <div class="bg-white shadow m-2 mb-3 p-3">
         <h6 class="mb-3 text-black fw-bold">Delivery Address</h6>
         <?php
            foreach($defaultAdd as $x) {
               $defaultAddId = $x["dId"];
               $typeName = "";
               $typeIcon = "";
               if($x["type"] == "0"){
                  $typeName = "Home"; 
                  $typeIcon = "bi bi-house"; 
               } 
               else{ 
                  $typeName = "Work";
                  $typeIcon = "bi bi-building"; 
               }
               
         ?>
         <div class="btn-group osahan-btn-group w-100 d-flex flex-column" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-light d-flex align-items-center gap-3 rounded px-3 py-2" for="btnradio1">
               <!-- 0 = home, 1 = work -->
               <i class="<?php echo $typeIcon; ?>"></i>
               <div class="row text-start">
                  <h6 class="mb-0 fw-bold"><?php echo $typeName; ?></h6>
                  <p class="text-danger"><?php echo $x["fullName"]; ?>, <?php echo $x["mobNumber"]; ?></p>
                  <div class="text-muted small text-opacity-50"><?php echo $x["flatNumber"]; ?>, <?php echo $x["fullAddress"] ?>, <?php echo $x["city"]; ?> - <?php echo $x["pincode"]; ?>, <?php echo $x["state"]; ?></div>
               </div>
               <i class="bi bi-check-circle-fill ms-auto"></i>
            </label>
         </div>
         <?php
            }
         ?>
         <div class="mt-3">
            <a href="<?php echo $routes['new-add-add']; ?>" class="btn w-100 btn-success">+&nbsp;Add
               New Address</a>
         </div>
      </div>
      <div class="bg-white shadow m-2 p-3">
         <h6 class="mb-3 text-black fw-bold">Select payment Method</h6>
         <div class="btn-group osahan-btn-group w-100 d-flex gap-3" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="pyMode" id="btnradio3" value="0" autocomplete="off" checked>
            <label class="btn btn-outline-light d-flex rounded p-3 col-6" for="btnradio3">
               <span class="text-start">
                  <i class="bi bi-credit-card fs-2"></i>
                  <h6 class="mb-0 fw-bold">Online</h6>
                  <div class="text-muted small text-opacity-50">Debit/Credit, Net banking, UPI</div>
               </span>
               <i class="bi bi-check-circle-fill ms-auto"></i>
            </label>
            <input type="radio" class="btn-check" name="pyMode" id="btnradio4" value="1" autocomplete="off">
            <label class="btn btn-outline-light d-flex rounded p-3 col-6" for="btnradio4">
               <span class="text-start">
                  <i class="bi bi-cash-coin fs-2"></i>
                  <h6 class="mb-0 fw-bold">COD</h6>
                  <div class="text-muted small text-opacity-50">Please keep exact change.</div>
               </span>
               <i class="bi bi-check-circle-fill ms-auto"></i>
            </label>
         </div>
      </div>
      <div class="osahan-footer fixed-bottom p-3">
         <a href="#" class="btn btn-success btn-lg w-100 shadow" id="finalSubmit" >Confirm & Place Order</a>
      </div>
      <?php
         }else{
         require 'fixed-bottom.php';
      ?>
      <div class="bg-white shadow m-2 rounded p-3">
         <p><h2>Your Shopping Bag is Empty !</h2></p>
         <a href="<?php echo $routes['home']; ?>">Click here to shop !</a>
      </div>
      <?php
         }
      ?>
      <input type="hidden" id="totalInitialPrice" value="00.00" />
      <input type="hidden" id="couponId" value="X" />
      <input type="hidden" id="discountAppliedAmount" value="00.00" />
      <input type="hidden" id="totalFinalPrice" value="00.00" />
      <input type="hidden" id="defaultAddressId" value="<?php echo $defaultAddId; ?>" />
      <input type="hidden" id="payMode" value="0" />

      <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <script type="text/javascript" src="js/custom.js"></script>
      
      <script type="text/javascript" src="js/add-to-cart.js"></script> 
      <script type="text/javascript" src="js/checkOut-CouponLogic.js"></script> 
      <script type="text/javascript" src="js/paymentRedirectPage.js"></script> 
      <script type="text/javascript" src="js/add-to-bag.js"></script>
      <script type="text/javascript">
         $(document).ready(function () {
            $("#cover-spin").hide(0);
            let initialPrice = <?php echo $itemToalPrice; ?>;
            $("#totalInitialPrice").val(initialPrice);
            document.getElementById("finalTotalPrice").innerHTML = initialPrice;
            document.getElementById("itemsInitialprice").innerHTML = initialPrice;
            $("#totalFinalPrice").val(initialPrice);
            $('input[type=radio][name=pyMode]').change(function() {
               let changeMode = this.value;
               $("#payMode").val(changeMode);
            });
         });
      </script>
   </body>
</html>