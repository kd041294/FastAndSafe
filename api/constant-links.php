<?php

define('BASE_URL', 'http://localhost/fast_safe_4.0_np/');
define("encryption_method", "AES-128-CBC");
define("key", "FAST_AND_SAFE_14_JAN_2023_8910414656");

$routeFacebookPage = 'https://www.facebook.com/FastAndSafeDaily';
$routeInstagramPage = 'https://www.instagram.com/fastandsafedaily/';
$routeTwitterPage = 'https://twitter.com/FastAndSafe20?t=w6EU5sPrm9Un13G0xI96bA&s=09';
$routeLinkedIn = 'https://www.linkedin.com/company/75626126';

$routes = [
    'index' => BASE_URL,
    'home' => BASE_URL.'home.php',
    'landing' => BASE_URL.'landing.php',
    'started' => BASE_URL.'get-started.php',
    'signin' => BASE_URL.'sign-in.php',
    'signup' => BASE_URL.'sign-up.php',
    'home' => BASE_URL.'home.php',
    'bag' => BASE_URL.'bag.php',
    'address' => BASE_URL.'my-address.php',
    'new-add-add' => BASE_URL.'add-new-address.php',
    'orders' => BASE_URL.'my-orders.php',
    'orders-details' => BASE_URL.'my-order-details.php',
    'about' => BASE_URL.'about-us.php',
    'offers' => BASE_URL.'offers.php',
    'items' => BASE_URL.'item-list.php',
    'support' => BASE_URL.'support.php',
    'confirmation' => BASE_URL.'order-confirmation.php',
    ];
 ?>


