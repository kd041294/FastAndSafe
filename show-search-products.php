<!doctype html>
<html lang="en">
    <head>
        <title>Fast and Safe | Free Home Delivery | Online Supper Market </title>
        <meta property="og:title" content="Vide" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
        <link href="css/show-search-product-style.css" rel='stylesheet' type='text/css' />
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
            <?php
                $qS = $_GET['qS'];
                $idS = base64_decode($qS);
                $qC = $_GET['qC'];
                $idC = base64_decode($qC);
                $sqlCat = "SELECT * FROM category_item WHERE id = '$idC'";
                $resultCat = mysqli_query($mysqli, $sqlCat);
                $sqlSec = "SELECT * FROM category_item WHERE ci_sc_id = '$idS'";
                $resultSec = mysqli_query($mysqli, $sqlSec);
            ?>
            <div class="pt-4">
                <div class="container shadow p-3 special-cards shadow bg-white rounded">
                    <?php 
                        while($row = $resultCat->fetch_assoc()){
                    ?>
                    <div class="row" style="padding: none;">
                        <div class="col-sm-4 col-4" id="img-section">
                            <img class="single-image shadow bg-white rounded" src="data:image/jpeg;base64,<?php echo base64_encode($row['ci_img']) ?>" alt="<?php echo $row['ci_name']; ?>" width="80%" height="90%">
                        </div>
                        <div class="col-sm-8 col-8" id="product-details">
                            <div class="input-item" style="font-size: 100%;">
                                <p class="title"><?php echo $row['ci_name']; ?></p>
                                <input type="hidden" id="item-id" value="<?php echo $row['id']; ?>" />
                                <p>Quantity : <span><?php echo $row['ci_quantity'].'('.$row['ci_quantity_type'].')'; ?></span></p>
                                <p><b><del>Market Price : Rs. <span><?php echo $row['ci_mr_price']; ?></span></del></b></p>
                                <p><b>F&S Price : Rs. <span><?php echo $row['ci_fs_price']; ?></span></b></p>
                                <form class="row">
                                    <div class="col-sm-6 col-6">
                                        <input type="text" class="form-control input-number " id="quantity" value="1" min="1" max="5">
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <button type="button" class="btn btn-success btn-number add" data-type="plus" data-field="quant[2]">ADD</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <hr>
                <div class="container">
                    <div class="row heading-related-pro">
                        <p class="pl-3"><b>Related products</b></p>
                    </div>
                    <div class="row">
                        <?php 
                            while($row = $resultSec->fetch_assoc()){
                        ?>
                            <div class="col-12 col-sm-4 mt-2 mb-2 special-cards shadow bg-white rounded" style="font-size: 70%; padding: 2%;">
                                <div class="row">
                                    <div class="col-sm-8 col-8" class="top-right" >
                                        <img src="img/g_mart/g_mart.jpg" width="100px" height="25px" />
                                    </div>
                                    <div class="col-sm-4 col-4">
                                        <?php
                                            $dis = (int)$row['ci_mr_price'] - (int)$row['ci_fs_price'];
                                            $disPrice = (int)(((int)$dis/(int)$row['ci_mr_price'])*100);
                                            if((int)$disPrice > 0){
                                        ?>
                                        <p class="rounded" style="padding: 5%; background-color: #EF0E59; width: 50%; color: white;"><b><?php echo $disPrice; ?>% Off</b></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row"  style="padding: 2%;">
                                    <div class="col-sm-5 col-5">
                                        <img class="item-img shadow bg-white rounded" src="data:image/jpeg;base64,<?php echo base64_encode($row['ci_img']) ?>" width="100" height="100" />
                                    </div>
                                    <div class="col-sm-7 col-6 input-item" >
                                        <div class="row" style="font-size: 140%; padding: 0;">
                                            <p><b><?php echo $row['ci_name']; ?></b></p>
                                            <input type="hidden" id="item-id" value="<?php echo $row['id']; ?>" />
                                        </div>
                                        <div class="row">
                                            <p>Quantity : <span><?php echo $row['ci_quantity'].' '.$row['ci_quantity_type']; ?></span></p>
                                        </div> 
                                        <div class="row">
                                            <p><b>Price : <del style="color: red">Rs. <span><?php echo $row['ci_mr_price'].'</del> Rs. '.$row['ci_fs_price']; ?></span></b></p>
                                        </div>   
                                        <form class="row">
                                            <div class="col-sm-6 col-6">
                                                <input type="text" class="form-control input-number " id="quantity" value="1" min="1" max="5">
                                            </div>
                                            <div class="col-sm-6 col-6">
                                                <button type="button" class="btn btn-success btn-number add" data-type="plus" data-field="quant[2]">ADD</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }   
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#cover-spin").hide();
                $(".content").show();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/add-to-cart.js" type="text/javascript" ></script>
    </body>
</html>

