<?php
   $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")."://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<div class="fixed-bottom shadow-sm osahan-footer p-3">
   <div class="row m-0 footer-menu overflow-hiddem bg-success rounded shadow links">
      <div class="col-3 p-0 text-center">
         <a class="p-2 d-inline-block <?php if($link == $routes["home"]){ echo 'text-warning'; }else{ echo 'text-white'; }?> w-100" href="<?php echo $routes['home']; ?>">
            <span><i class="bi bi-house h4"></i></span>
            <p class="m-0 small">HOME</p>
         </a>
      </div>
      <div class="col-3 p-0 text-center">
         <a class="p-2 d-inline-block <?php if($link == $routes["bag"]){ echo 'text-warning'; }else{ echo 'text-white'; }?> w-100" href="<?php echo $routes['bag']; ?>">
            <span><i class="bi bi-basket h4"></i></span>
            <p class="m-0 small">BAG</p>
         </a>
      </div>
      <div class="col-3 p-0 text-center">
         <a class="p-2 d-inline-block <?php if($link == $routes["offers"]){ echo 'text-warning'; }else{ echo 'text-white'; }?> w-100" href="<?php echo $routes['offers']; ?>">
            <span><i class="bi bi-gift h4"></i></span>
            <p class="m-0 small">OFFERS</p>
         </a>
      </div>
      <div class="col-3 p-0 text-center">
         <a class="p-2 d-inline-block <?php if($link == $routes["orders"]){ echo 'text-warning'; }else{ echo 'text-white'; }?> w-100" href="<?php echo $routes['orders']; ?>">
            <span><i class="bi bi-bag h4"></i></span>
            <p class="m-0 small">Orders</p>
         </a>
      </div>
   </div>
</div>