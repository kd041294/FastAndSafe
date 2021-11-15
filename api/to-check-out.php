<?php
session_start();
$_SESSION['user']['coupon_name'] = $_POST['code'] == "" ? "XXXXXX" : $_POST['code'];
$_SESSION['user']['discount_price'] = $_POST['discount'];
$_SESSION['user']['delivery_fee'] = $_POST['deliveryFees'];
$_SESSION['user']['total_amount'] = $_POST['amt'];
$_SESSION['user']['extra_info'] = $_POST['exInfo'] == "" ? "XXXXXX" : $_POST['exInfo'];

echo 'true';