<?php

define('BASE_URL', 'http://localhost/version_3.0/');

$c_items = urlencode(base64_encode('category-items.php'));
$s_products = urlencode(base64_encode('show-search-products.php'));



$gro = base64_encode(1);
$veg = base64_encode(2);
$meat = base64_encode(3);
$clean = base64_encode(4);
$service = 'our-services.php'; 
$userOffers = 'my-offers.php';

//social media link
$routeFacebookPage = 'https://www.facebook.com/FastAndSafeDaily';
$routeInstagramPage = 'https://www.instagram.com/fastandsafedaily/';
$routeTwitterPage = 'https://twitter.com/FastAndSafe20?t=w6EU5sPrm9Un13G0xI96bA&s=09';
$routeLinkedIn = 'https://www.linkedin.com/company/75626126';


//for the spices
$urlSpic = BASE_URL.'category-items.php?q='.urlencode(base64_encode("3")).'&query='.$gro;

//links for fruits and vegetables
$vegetables = BASE_URL.'category-items.php?q='.urlencode(base64_encode("16")).'&query='.$veg;
$fruits = BASE_URL.'category-items.php?q='.urlencode(base64_encode("17")).'&query='.$veg;

//links for groceries
$atta_maida = BASE_URL.'category-items.php?q='.urlencode(base64_encode("1")).'&query='.$gro;
$cooking_oils = BASE_URL.'category-items.php?q='.urlencode(base64_encode("4")).'&query='.$gro;
$spices = BASE_URL.'category-items.php?q='.urlencode(base64_encode("3")).'&query='.$gro;
$rice = BASE_URL.'category-items.php?q='.urlencode(base64_encode("2")).'&query='.$gro;
$daal_pulse = BASE_URL.'category-items.php?q='.urlencode(base64_encode("20")).'&query='.$gro;
$sugar_salt = BASE_URL.'category-items.php?q='.urlencode(base64_encode("8")).'&query='.$gro;
$tea_coffee = BASE_URL.'category-items.php?q='.urlencode(base64_encode("9")).'&query='.$gro;
$biscuits_cookies = BASE_URL.'category-items.php?q='.urlencode(base64_encode("5")).'&query='.$gro;
$honey_chyamnparash = BASE_URL.'category-items.php?q='.urlencode(base64_encode("15")).'&query='.$gro;
$drinks_juice = BASE_URL.'category-items.php?q='.urlencode(base64_encode("7")).'&query='.$gro;
$dry_fruits = BASE_URL.'category-items.php?q='.urlencode(base64_encode("10")).'&query='.$gro;
$noodles_vermecelli = BASE_URL.'category-items.php?q='.urlencode(base64_encode("18")).'&query='.$gro;
$dairy_products = BASE_URL.'category-items.php?q='.urlencode(base64_encode("14")).'&query='.$gro;
$bread_eggs = BASE_URL.'category-items.php?q='.urlencode(base64_encode("6")).'&query='.$gro;

//links for meat and fish
$mutton = BASE_URL.'category-items.php?q='.urlencode(base64_encode("13")).'&query='.$meat;
$chicken = BASE_URL.'category-items.php?q='.urlencode(base64_encode("11")).'&query='.$meat;
$fish = BASE_URL.'category-items.php?q='.urlencode(base64_encode("12")).'&query='.$meat;

//links for detergents and cleaners
$detBar = BASE_URL.'category-items.php?q='.urlencode(base64_encode("21")).'&query='.$clean;
$handSan = BASE_URL.'category-items.php?q='.urlencode(base64_encode("22")).'&query='.$clean;
$cleans = BASE_URL.'category-items.php?q='.urlencode(base64_encode("23")).'&query='.$clean;

//routes to vegetables and fruits
$routesVegFru = [
    'veg' => $vegetables,
    'fruits' => $fruits
];

//routes to groceries
$routesGorceries = [
    'a_m' => $atta_maida,
    'c_o' => $cooking_oils,
    's_p' => $spices,
    'r_e' => $rice,
    'd_p' => $daal_pulse,
    's_s' => $sugar_salt,
    't_c' => $tea_coffee,
    'b_c' => $biscuits_cookies,
    'h_c' => $honey_chyamnparash,
    'd_j' => $drinks_juice,
    'd_f' => $dry_fruits,
    'n_v' => $noodles_vermecelli,
    'd_p' => $dairy_products,
    'b_e' => $bread_eggs
];

//routes to meat and fish
$routesMF = [
    'm' => $mutton,
    'c' => $chicken,
    'f' => $fish
];

//routes to detergents and cleaners
$routeDetClen = [
    'd' => $detBar,
    'hd' => $handSan,
    'c' => $cleans
];

$routes = [
    'index' => BASE_URL,
    'services' => BASE_URL.$service,
    'gro' => BASE_URL.'groceries.php?query='.$gro,
    'vegFru' => BASE_URL.'vegetables-and-fruits.php?query='.$veg,
    'meatFish' => BASE_URL.'meat-and-fish.php?query='.$meat,
    'dclean' => BASE_URL.'detergents-and-cleaners.php?query='.$clean,
    'cart' => BASE_URL.'my-cart.php',
    'my-offers' => BASE_URL.$userOffers,
    'my-orders' => BASE_URL.'my-orders.php',
    'my-order-details' => BASE_URL.'my-order-details.php',
    'checkOut' => BASE_URL.'check-out-page.php',
    'login' => BASE_URL.'login.php',
    'atta-maida' => $atta_maida,
    'veg' => $vegetables,
    'orders' => BASE_URL.'orders.php',
    'category' => BASE_URL.'categories.php',
    'gifts' => BASE_URL.'user-gifts.php',
    'ord-det' => BASE_URL.'order-details.php',
    'c-items' => BASE_URL.base64_decode($c_items),
    's-s-pro' => BASE_URL.base64_decode($s_products),
    'profile' => BASE_URL.'profile.php',
    'contact' => BASE_URL.'contact.php',
    'order-list' => BASE_URL.'user-order-list.php',
    'check-out' => BASE_URL.'check-out-page.php',
    'o-success' => BASE_URL.'order-successful.php',
    'o-failure' => BASE_URL.'order-failure.php',
    'faqs' => BASE_URL.'faqs.php',
    'about' => BASE_URL.'about-us.php',
    'logout' => BASE_URL.'logout.php'
    ];
 ?>


