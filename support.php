<?php
	session_start();
	error_reporting(0);
	require './api/constant-links.php';
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
		<div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
			<div class="font-weight-normal mb-0 d-flex align-items-center">
				<h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
				<a class="text-dark me-3 fs-4" href="<?php echo $_SESSION["USER"]["CURRENT_URL"]; ?>"><i class="bi bi-chevron-left"></i></a>
				Support
				</h6>
				<div class="ms-auto d-flex align-items-center">
				<a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
				</div>
			</div>
		</div>
		<div class="px-3 py-4">
			<p class="text-muted small">We are here to help you with any information and problems through our <b>Support center</b></p>
			<div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded mb-2">
				<i class="icofont-facebook-messenger me-3 h5 mb-0 text-success"></i>
				<p class="mb-0 small"><b>@</b> +91 89104 14656</p>
			</div>
			<div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded mb-2">
				<i class="icofont-envelope-open me-3 h5 mb-0 text-success"></i>
				<p class="mb-0 small"><b>@</b> customer_care@fastandsafe.in</p>
			</div>
			<div class="messenger bg-white shadow-sm p-3 d-flex align-items-center rounded mb-2">
				<i class="icofont-support me-3 h5 mb-0 text-success"></i>
				<p class="mb-0 small"><b>@</b> +91 89104 14656</p>
			</div>
		</div>
		<?php include 'fixed-bottom.php'; ?>
		<?php include 'nav.php'; ?>
		<script type="text/javascript" src="js/custom.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
		<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
	</body>
</html>