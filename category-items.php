<?php  
    $q = base64_decode(urldecode($_GET['q']));
    $query = $_GET['query'];
    $q1 = base64_decode($query);
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
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <link href="css/loader.css" rel='stylesheet' type='text/css' />
        <link href="css/category-items.css" rel='stylesheet' type='text/css' />
        <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.2/css/boxicons.min.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="cover-spin"></div>
        <div class="content" style="display: none;">
        <?php include 'navbar.php'; ?>
            <div class="container">
                <div class="row special-offr-head pt-3 pl-3">
                    <p><b>Search related products</b></p>
                </div>
                <div class="row special-items">
                    <?php 
                        $sql = "SELECT * FROM category_item WHERE ci_sc_id = '$q'";
                        $result = mysqli_query($mysqli, $sql);
                        while($row = $result->fetch_assoc()){
                    ?>
                        <div class="col-12 col-sm-4 mt-2 special-cards shadow bg-white rounded">
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
                                    <div class="row">
                                        <img class="item-img shadow bg-white rounded" src="data:image/jpeg;base64,<?php echo base64_encode($row['ci_img']) ?>" width="100" height="100" alt="<?php echo $row['ci_name']; ?>"/>
                                    </div>
                                    <div class="row" style="margin-top: 8%; padding-left: 10%; font-size: 110%;">
                                        <p><?php if((int)$row['ci_mr_price'] > (int)$row['ci_fs_price']){ ?><b><span style="color: red;">Market Price : <del><i class="fa fa-rupee"></i> <span><?php echo $row['ci_mr_price']; } ?> </del></span><br><span style="color: green;"><b>F&S Price : <i class="fa fa-rupee"></i> <?php echo $row['ci_fs_price'] ?></b></span></b></p>
                                    </div> 
                                </div>
                                <div class="col-sm-7 col-6 input-item">
                                    <div class="row" style="font-size: 140%;padding: 0;">
                                        <p><b><?php echo $row['ci_name']; ?></b></p>
                                        <input type="hidden" id="item-id" value="<?php echo $row['id']; ?>" />
                                    </div>
                                    <div class="row" style="font-size: 100%; width: 100%;">
                                        <p><b>Description : </b><?php echo $row['ci_des']; ?></p>
                                    </div>
                                    <div class="row">
                                        <p>Quantity : <span><?php echo $row['ci_quantity'].' '.$row['ci_quantity_type']; ?></span></p>
                                    </div>
                                    <form class="row">
                                        <div class="col-sm-6 col-6">
                                            <input type="text" class="form-control input-number" id="quantity" value="1" min="1" max="5">
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
        <script type="text/javascript">
            $(document).ready(function () {
                $("#cover-spin").hide();
                $(".content").show();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
        <script src="js/add-to-cart.js" type="text/javascript" ></script>
    </body>
</html>

