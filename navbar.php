<?php
    session_start();
    include 'api/connection.php';
    include 'api/constant-links.php';
    include 'api/get-cart-value.php';
    
    $sqlPriCat = "SELECT * FROM  primary_category";
    $resultPri = mysqli_query($mysqli, $sqlPriCat);
?>
<link href="css/navbar-style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="js/add-referral-code.js" type="text/javascript"> </script>
<script src="js/search-bar.js" type="text/javascript"></script>
<script src="js/popper.js" type="text/javascript"> </script>
<div class="overlay"></div>
<div class="utility-nav d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="small"><i class="bx bx-envelope"></i> support@fastandsafe.in | <i class="bx bx-phone"></i> +91 - 790 892 0442 / +91 - 801 396 1194
                </p>
            </div>
            <div class="col-12 col-md-6 text-right">
                <p class="small">Minimum Order Value For Free Shipping is Rs. 500</p>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-md navbar-light bg-light main-menu" style="box-shadow:none;">
    <div class="container-fluid" style="background-color: #EAE2DC; padding: 1%">
        <button type="button" id="sidebarCollapse" class="btn btn-link d-block d-md-none">
        <i class="bx bx-menu icon-single"></i>
        </button>
        <a class="navbar-brand" href="<?php echo $routes['index']; ?>">
            <h5><b>Fast And Safe</b></h5>
        </a>
        <ul class="navbar-nav ml-auto d-block d-md-none">
            <li class="nav-item">
            <a class="btn btn-link" href="<?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ echo $routes['login']; } else{ echo $routes['cart']; }  ?>"><i class="bx bxs-cart icon-single"></i> <span class="badge badge-danger" id="count"><?php echo $cartItemCount; ?></span></a>
            </li>
        </ul>
        <div class="collapse navbar-collapse">
            <div class="form-inline my-2 my-lg-0 mx-auto" style="position: relative;">
                <input class="form-control" type="search" id="search" placeholder="Search for products..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div id="show-list" style="position: absolute; top: 100%; width: 100%;">
                </div>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-link" href="<?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ echo $routes['login']; } else{ echo $routes['cart']; }  ?>"><i class="bx bxs-cart icon-single"></i> <p class="badge badge-danger" id="count"><?php echo $cartItemCount; ?></p></a>
                    <span>Rs. <?php echo $totalPrice; ?></span>
                </li>
                <li class="nav-item ml-md-3 dropdown" style="padding-top: 3%;">
                <?php
                    if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){
                ?>
                    <a class="btn btn-primary" href="<?php echo $routes['login']; ?>"><i class="bx bxs-user-circle mr-1"></i> Log In / Register</a>
                <?php
                    }else{
                ?>
                    <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="navbarDropdown"><i class="fa fa-user mr-1"  aria-hidden="true"></i> My Account</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo $routes['my-orders']; ?>"><b>My Orders</b></a>
                        <a class="dropdown-item" href="#"><b>Log Out</b></a>
                    </div>
                <?php
                    }
                ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-light sub-menu">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item <?php if( $current == BASE_URL || $current == BASE_URL.'index.php'){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?php echo $routes['index']; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($q1 == 1){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?php echo $routes['gro']; ?>">Groceries</a>
                </li>
                <li class="nav-item <?php if($q1 == 2){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?php echo $routes['vegFru']; ?>">Vegetables & Fruits</a>
                </li>
                <li class="nav-item <?php if($q1 == 3){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?php echo $routes['meatFish']; ?>">Meat & Fish</a>
                </li>
                <li class="nav-item <?php if($q1 == 4){ echo 'active'; } ?>">
                    <a class="nav-link" href="<?php echo $routes['dclean']; ?>">Detergents & Cleaners</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="search-bar d-block d-md-none">
    <div class="container">
        <div class="row">
            <div class="form-inline my-2 my-lg-0 mx-auto" style="position: relative;">
                <input class="form-control" type="search" id="search-mob" placeholder="Search for products..." aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div id="show-list-mob" style="position: absolute; top: 100%; width: 100%;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10 pl-0">
                    <?php
                        if(!isset($_SESSION['user']['refer_number']) && empty($_SESSION['user']['refer_number'])){
                            $rNum = "NA";
                        }
                        else{
                            $rNum = $_SESSION['user']['refer_number'];
                        }
                        if(!isset($_SESSION['user']['refer']) | empty($_SESSION['user']['refer']) || $_SESSION['user']['refer'] == ""){
                            $rBCode = '<span class="add-code" id="add-code">'.'<b>Click to Add Code</b>'.'</span>';
                        }
                        else{
                            $rBCode = $_SESSION['user']['refer'];
                        }
                        if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){
                    ?>
                        <a class="btn btn-primary" href="<?php echo $routes['login']; ?>"><i class="bx bxs-user-circle mr-1"></i> Log In / Register</a>
                    <?php
                        }else{
                    ?>
                        <a href="#"><i class="fa fa-user mr-1" aria-hidden="true"></i> My Account</a>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-2 text-left">
                    <button type="button" id="sidebarCollapseX" class="btn btn-link">
                        <i class="bx bx-x icon-single"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <ul class="list-unstyled components links">   
        <li class="active">
            <a class="nav-link" href="<?php echo $routes['index']; ?>"><i class="bx bx-home mr-3"></i> Home</a>
        </li> 
        <li class="nav-item">
            <?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ ?> <a><span style="color: grey;">My Orders</span></a> <?php } else{ ?> <span style="color: black;"><a class="nav-link" href="<?php echo $routes['my-orders']; ?>">My Orders</a></span><?php } ?>
        </li>
        <li class="nav-item">
            <?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ ?> <a><span style="color: grey;">My Cart<span class="badge badge-danger float-right">0</span><i class="bx bxs-cart icon-single float-right"></i></a></span></span></a> <?php } else{ ?> <span style="color: black;"><a class="nav-link" href="<?php echo $routes['cart']; ?>">My Cart<span class="badge float-right" id="cartTotal"> Rs. <?php echo $totalPrice; ?></span><p class="badge badge-danger float-right" id="countMob"><?php echo $cartItemCount; ?></p><i class="bx bxs-cart icon-single float-right"></i></a></span><?php } ?>
        </li>
        <li class="nav-item">
            <?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ ?> <a><span style="color: grey;">My Offers</span></a><?php } else{ ?><span style="color: black;"><a class="nav-link" href="<?php echo $routes['my-offers']; ?>">My Offers</a></span><?php } ?>
        </li>
        <li class="nav-item">
            <?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ ?> <a><span style="color: grey;">My Referral Code : NA</span></a><?php } else{ ?><span style="color: black;"><a class="nav-link">My Referral  Code : <?php echo $rNum; ?></a></span><?php } ?>
        </li>
        <li class="nav-item">
            <?php if(!isset($_SESSION['user']['id']) && empty($_SESSION['user']['id'])){ ?> <a><span style="color: grey;">Refer By : NA</span></a><?php } else{ ?><span style="color: black;"><a class="nav-link">Refer By : <?php echo $rBCode; ?></a><a><div class="row" id="add-code-form" style="display: none;"><input class="col-8" type="text" placeholder="Enter Code" id="add-code-value"/><button class="col-4 btn btn-primary" id="add-code-but">ADD</button></div></a></span><?php } ?>
        </li>
    </ul>
    <ul class="list-unstyled components links">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Select Category
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo $routes['gro']; ?>">Groceries</a>
                <a class="dropdown-item" href="<?php echo $routes['vegFru']; ?>">Fruits & Vegetables</a>
                <a class="dropdown-item" href="<?php echo $routes['meatFish']; ?>">Meat & Fish</a>
                <a class="dropdown-item" href="<?php echo $routes['dclean']; ?>">Detergents & Cleaners</a>
            </div>
        </li>
    </ul>
    <ul class="list-unstyled components links">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $routes['faqs']; ?>">FAQS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $routes['about']; ?>">About US</a>
        </li>
    </ul>
    <ul class="social-icons">
        <li><a href="<?php echo $routeFacebookPage; ?>" target="_blank" title=""><i class="bx bxl-facebook-square"></i></a></li>
        <li><a href="<?php echo $routeTwitterPage; ?>" target="_blank" title=""><i class="bx bxl-twitter"></i></a></li>
        <li><a href="<?php echo $routeLinkedIn; ?>" target="_blank" title=""><i class="bx bxl-linkedin"></i></a></li>
        <li><a href="<?php echo $routeInstagramPage; ?>" target="_blank" title=""><i class="bx bxl-instagram"></i></a></li>
    </ul>
</nav>
<script type="text/javascript">
    $("#add-code").click(function(){
        $("#add-code-form").show();
        $("#add-code").hide();
    });
</script>