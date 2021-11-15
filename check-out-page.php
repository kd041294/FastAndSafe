<?php
date_default_timezone_set('Asia/Kolkata');
$currentTime = date('H:i:s');
$midNightTime = "00:00:00";
$morTime = "08:00:00";
$eveTime = "18:00:00";
$justBefMidNightTime = "23:59:59";
$selectLatestTime = 0;
if($midNightTime <= $currentTime && $currentTime  <= $morTime){
    $selectLatestTime = 1;
}
if($morTime < $currentTime && $currentTime  <= $eveTime){
    $selectLatestTime = 2;
}
if($eveTime < $currentTime && $currentTime  <= $justBefMidNightTime){
    $selectLatestTime = 3;
}

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
        <link href="css/check-out-page-style.css" rel='stylesheet' type='text/css' />
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
            <?Php
                if(empty($_SESSION['user']['id'])){
                    echo "<script>window.open('login.php', '_self')</script>";
                }
                if($cartItemCount == 0){
                    echo "<script>window.open('index.php', '_self')</script>";
                }
                $userId = $_SESSION['user']['id'];  
                $sql = "SELECT ci.id AS item_id, ci.ci_name AS item_name, ci.ci_fs_price AS item_price, uc.uc_ci_quantity AS item_count FROM `category_item` 
                AS ci INNER JOIN `user_cart` AS uc ON ci.id = uc.uc_ci_id WHERE uc.uc_ur_id = '$userId'";

                $result = mysqli_query($mysqli, $sql);
                $subTotal = 0;
                $deliveryFee = 0;
            ?>
            <div class="pt-4">
                <div class="container-fluid" id="grad1">
                    <div class="row justify-content-center mt-0 bg-light">
                        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <h4><strong>Place Order</strong></h4>
                                <p>Fill all the steps</p>
                                <div class="row">
                                    <div class="col-md-12 mx-0">
                                        <form id="msform">
                                            <!-- progressbar -->
                                            <ul id="progressbar">
                                                <li class="active" id="account"><strong>Check Pincode</strong></li>
                                                <li id="personal"><strong>Address Details</strong></li>
                                                <li id="payment"><strong>Slot & Payment</strong></li>
                                                <li id="confirm"><strong>Success</strong></li>
                                            </ul> <!-- fieldsets -->
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Enter Pincode</h2>  
                                                    <p style="display: none; color: red;" id="fail-pin"><b>Service Not Available In The Given Pincode !</b></p>
                                                    <input type="text" id="pincode" placeholder="Enter Pincode" /> 
                                                </div> 
                                                <input type="button" name="next" class="next action-button btn btn-dark rounded-pill" id="form-button-pin" value="Procceed" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Personal Information</h2> 
                                                    <p style="display: none; color: green;" id="confirm-pin"><b>Service Available In The Given Pincode !</b></p>
                                                    <div class="controls">
                                                    <input id="name" class="billing-address-name form-control" type="text" placeholder="Full name" />
                                                </div>
                                                <div class="w3_agileits_card_number_grids">
                                                    <div class="w3_agileits_card_number_grid_left row">
                                                        <div class="controls col-sm-8 col-xs-12">
                                                            <input id="given-number" class="form-control" type="text" placeholder="Mobile number" />
                                                            <p><a style="display: none" id="edit">Edit Number?</a></p>
                                                        </div>
                                                        <div class="controls col-sm-8 col-xs-12" id="enter-otp" style="display: none;">
                                                            <input type="text" class="form-control" id="otp" placeholder="Enter OTP" />
                                                            <input type="hidden" class="form-control" id="status-val" value="0"/>
                                                        </div>
                                                        <div class="controls col-sm-4 col-xs-12" style="padding-top: 2%;">
                                                            <p style="color: green; display: none" id="ver-num"><b>Mobile Number Verified .!</b></p>
                                                            <button type="button" class="btn btn-success" id="submitOTP" style="display: none">Verify OTP</button>
                                                            <button type="button" class="btn btn-success" id="genOTP">Generate OTP</button>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="hno" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor No." />
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" id="fAdd" class="form-control" id="inputAddress2" placeholder="Street" />
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6 col-xs-8">
                                                        <input type="text" id="landmark" class="form-control" id="inputCity" placeholder="Landmark" />
                                                    </div>
                                                    <div class="form-group col-md-6 col-xs-4">
                                                        <input type="text" id="pin" class="form-control" id="inputZip" placeholder="Pin" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-6 col-xs-5">
                                                        <input type="text" id="city" class="form-control" id="inputCity" placeholder="City" />
                                                    </div>
                                                    <div class="form-group col-md-6 col-xs-7">
                                                        <input type="text" id="state" placeholder="West Bengal" value="West Bengal" readonly />
                                                    </div>
                                                </div>
                                                </div> 
                                                <input type="button" name="previous" class="previous action-button-previous btn btn-dark rounded-pill" value="Previous" /> 
                                                <input type="button" name="next" id="form-button" class="next action-button btn btn-dark rounded-pill" value="Save & Pay" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Select Delivery Slot</h2>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Select</th>
                                                                <th>Slots Timings</th>
                                                                <th>Available Day</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr <?php if($selectLatestTime == 3 || $selectLatestTime == 2){ echo 'style="display: none;"'; } ?>>
                                                            <td><input type="radio" <?php if($selectLatestTime == 1){ echo 'checked'; } ?> name="time" value="1"/></td>
                                                            <td>09:00 AM to 11:00 AM</td>
                                                            <td>Today Morning</td>
                                                        </tr>
                                                        <tr <?php if($selectLatestTime == 3){ echo 'style="display: none;"'; } ?>>
                                                            <td><input type="radio" <?php if($selectLatestTime == 2){ echo 'checked'; } ?> name="time" value="2"/></td>
                                                            <td>07:00 PM to 09:00 PM</td>
                                                            <td>Today Evening</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" <?php if($selectLatestTime == 3){ echo 'checked'; } ?> name="time" value="3"/></td>
                                                            <td>09:00 AM to 11:00 AM</td>
                                                            <td>Tommorrow Morning</td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="time" value="4"/></td>
                                                            <td>07:00 PM to 09:00 PM</td>
                                                            <td>Tommorrow Evening</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <h2 class="fs-title"><b>Select Payment Mode</b></h2>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Select</th>
                                                                <th>Payment Mode</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><input type="radio" name="mode" value="02" checked/></td>
                                                            <td>COD(Cash On Delivery)</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div> 
                                                <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                                <input type="button" name="make_payment" id="final-submit" class="next action-button" value="Confirm" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title text-center">Success !</h2> <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
                                                    </div> <br><br>
                                                    <div class="row justify-content-center">
                                                        <div class="col-7 text-center">
                                                            <h5>You Have Successfully Placed The Order</h5><br>
                                                            <h5><a href="<?php echo $routes['my-orders']; ?>">Click Here to Track</a></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="finalPincode" value="700026" />
        <input type="hidden" id="finalFullName" value="700026" />
        <input type="hidden" id="finalNumber" value="700026" />
        <input type="hidden" id="finalHouseNo" value="700026" />
        <input type="hidden" id="finalFullAdd" value="700026" />
        <input type="hidden" id="finalLandMark" value="700026" />
        <input type="hidden" id="finalCity" value="700026" />
        <input type="hidden" id="finalState" value="700026" />
        <input type="hidden" id="finalDeliveryTiming" value="<?php echo $selectLatestTime; ?>" />
        <input type="hidden" id="finalPaymentMode" value="02" />
        <input type="hidden" id="finalCouponCodeName" value="<?php echo $_SESSION['user']['coupon_name']; ?>" />
        <input type="hidden" id="finalDiscountApplied" value="<?php echo $_SESSION['user']['discount_price']; ?>" />
        <input type="hidden" id="finalDeliveryFee" value="<?php echo $_SESSION['user']['delivery_fee']; ?>" />
        <input type="hidden" id="finalTotalAmount" value="<?php echo $_SESSION['user']['total_amount']; ?>" />
        <input type="hidden" id="finalExtraInfo" value="<?php echo $_SESSION['user']['extra_info']; ?>" />
        <input type="hidden" id="numberVerification" value="0" />
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
        <script src="js/checkOut-PincodeLogic.js" type="text/javascript" ></script>
        <script src="js/checkOut-AddressData.js" type="text/javascript"></script>
        <script src="js/checkOut-FinalSubmit.js" type="text/javascript"></script>
        <script src="js/verification-Otp.js" type="text/javascript"></script>
    </body>
</html>

