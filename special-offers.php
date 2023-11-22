<?php
    require 'api/connection.php';
    $userId = $_SESSION['USER']['ID'];
    $sql = "SELECT fci.id AS ID, fci.ci_pri_id AS PRI_ID, fci.ci_name AS I_NAME, fci.ci_des AS I_DES, fci.ci_quant AS I_QUANTITY, fci.ci_quant_type AS I_QUANTITY_TYPE, fci.ci_mrp_price AS I_MRP, fci.ci_off_price AS I_OFFER, 
    fci.ci_image AS I_IMAGE, COALESCE(fub.ub_item_quantity, 0) AS I_BAG_COUNT FROM fns_category_item AS fci INNER JOIN fns_special_offers AS fso ON fso.so_ci_id = fci.id 
    LEFT JOIN fns_user_bag AS fub ON fub.ub_item_id = fso.so_ci_id AND fub.ub_cust_id = '$userId'";
    $result = mysqli_query($mysqli, $sql);
?>

<div class="border-bottom px-3 d-flex align-items-center justify-content-between mt-3">
    <h6 class="mb-2 text-black fw-bold ">Special Offers</h6>
    <a class="text-success text-decoration-none" href="<?php echo $routes['items']; ?>">SEE ALL <i class="bi bi-arrow-right-circle-fill"></i></a>
</div>
<?php 
    while($row = $result->fetch_assoc()){
        if($row['I_BAG_COUNT'] == "0"){
?>
<div class="bg-white shadow m-2 rounded p-3">
    <div class="card od-card border-0">
        <div class="d-flex bag-item">
            <div class="bag-item-left">
                <div class="slider-for border rounded-3 mx-1 mb-1">
                    <div class="product1"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['I_IMAGE']); ?>"
                    class="img-fluid rounded-3" alt="">
                    </div>
                </div>
            </div>
            <div class="bag-item-right w-100" style="font-size: 80%">
                <div class="card-body pe-0 py-0">
                    <p class="card-text mb-0 mt-1 text-black fw-bold"><?php echo $row['I_NAME']; ?></p>
                    <p class="card-title mt-2 text-black fw-bold">₹ <?php echo $row['I_OFFER']; ?>
                    <small class="text-decoration-line-through text-muted text-danger fw-light">₹ <?php echo $row['I_MRP']; ?></small></p>
                    <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="size-btn ">
                        <div>
                            <button type="button" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo $row['I_QUANTITY'].' '. $row['I_QUANTITY_TYPE']; ?></button>
                        </div>
                    </div>
                    <div class="quantity-btn" >
                        <form id="form-val"> 
                            <div class="input-group input-group-sm border rounded overflow-hiddem">
                                <input type="button" class="form-control text-center text-white box border-0 bg-success rounded" onclick="itemAddIstTime(<?php echo $row['ID']; ?>, <?php echo $row['I_BAG_COUNT']; ?>)" value="ADD" placeholder="" />
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }else{
?>
<div class="bg-white shadow m-2 rounded p-3">
    <div class="card od-card border-0">
        <div class="d-flex bag-item">
            <div class="bag-item-left">
                <div class="slider-for border rounded-3 mx-1 mb-1">
                    <div class="product1"><img src="data:image/jpeg;base64,<?php echo base64_encode($row['I_IMAGE']); ?>"
                    class="img-fluid rounded-3" alt="">
                    </div>
                </div>
            </div>
            <div class="bag-item-right w-100" style="font-size: 80%">
                <div class="card-body pe-0 py-0">
                    <p class="card-text mb-0 mt-1 text-black fw-bold"><?php echo $row['I_NAME']; ?></p>
                    <p class="card-title mt-2 text-black fw-bold">₹ <?php echo $row['I_OFFER']; ?>
                    <small class="text-decoration-line-through text-muted text-danger fw-light">₹ <?php echo $row['I_MRP']; ?></small></p>
                    <div class="d-flex align-items-center justify-content-between gap-3">
                    <div class="size-btn ">
                        <div>
                            <button type="button" class="btn btn-light btn-sm border d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo $row['I_QUANTITY'].' '. $row['I_QUANTITY_TYPE']; ?></button>
                        </div>
                    </div>
                    <div class="quantity-btn">
                        <div class="input-group input-group-sm border rounded overflow-hiddem">
                            <div class="btn btn-light text-success minus border-0 bg-white" onclick="return changeItemDeValue(<?php echo $row['ID']; ?>, <?php echo $row['I_BAG_COUNT']; ?>)"><i class="bi bi-dash"></i></div>
                            <input type="text" class="form-control text-center box border-0 bg-white" value="<?php echo $row['I_BAG_COUNT']; ?>" readonly/>
                            <div class="btn btn-light text-success plus border-0 bg-white" onclick="return changeItemInValue(<?php echo $row['ID']; ?>, <?php echo $row['I_BAG_COUNT']; ?>)"><i class="bi bi-plus"></i></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>