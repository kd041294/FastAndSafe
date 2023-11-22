<?php
    session_start();
    require './api/constant-links.php';
    require './api/connection.php';
    $id = $_SESSION['user']['id'];
    $sql = "SELECT id AS id, ua_full_name AS fName, ua_mobile_number AS mNumber, ua_flat_number AS fNo, ua_full_address AS fAdd, ua_city AS city, ua_pincode AS pin, ua_state AS uState, ua_type AS uType, ua_default_add AS dAdd, ua_address_create_dt AS cDate, ua_status AS uStatus FROM fns_user_address AS u_add WHERE u_add.ua_user_id = '$id'";
    $result = mysqli_query($mysqli, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        // output data of each row
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
        <link href="css/loader.css" rel="stylesheet">
        <link href="vendor/sidebar/demo.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div id="cover-spin"></div>
        <?php include 'nav.php'; ?>
        <div class="p-3 shadow-sm bg-warning danger-nav osahan-home-header sticky-top">
            <div class="font-weight-normal mb-0 d-flex align-items-center">
                <h6 class="fw-normal mb-0 text-dark d-flex align-items-center">
                    <a class="text-dark me-3 fs-4" href="<?php echo $routes['home']; ?>"><i class="bi bi-chevron-left"></i></a>
                    Add new address
                </h6>
                <div class="ms-auto d-flex align-items-center">
                    <a class="toggle osahan-toggle fs-4 text-dark ms-auto" href="#"><i class="bi bi-list"></i></a>
                </div>
            </div>
        </div>
        <div class="bg-white m-2 rounded shadow p-3">
            <h6 class="mb-3 text-black fw-bold">Delivery Address</h6>
            <?php
                for($i=0 ; $i<$num_rows; $i++){
            ?>
            <div class="btn-group osahan-btn-group w-100 d-flex flex-column mb-1" role="group" aria-label="Basic radio toggle button group">
                <label class="btn btn-outline-light d-flex align-items-center gap-3 rounded px-3 py-2" for="btnradio1">
                    <i class="bi bi-house"></i>
                    <span class="text-start">
                        <h6 class="mb-0 fw-bold"><?php echo $data[$i]['uType']; ?></h6>
                        <div class="small"><?php echo $data[$i]['fNo']; ?> , <?php echo $data[$i]['fAdd']; ?>,
                        <?php echo $data[$i]['city']; ?> - <?php echo $data[$i]['pin']; ?>, <?php echo $data[$i]['uState']; ?></div>
                    </span>
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
        <?php include 'fixed-bottom.php'; ?>
        <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
        <script type="text/javascript" src="vendor/sidebar/hc-offcanvas-nav.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
        <script type="text/javascript" src="js/select-default-address.js"></script>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#cover-spin").hide(0);
            const name = $('#name').val();
            const number = $('#num').val();
            const add = $('#add').val();
            const city = $('#city').val();
            const pincode = $('#pin').val();
        
        });
    </script>
</html>