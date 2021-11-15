<?php
    $sql = "SELECT ci.id AS id, ci.ci_name AS i_name, ci.ci_des AS i_des, ci.ci_quantity AS quant, ci.ci_quantity_type AS quant_type, ci.ci_mr_price AS 
            mPrice, ci.ci_fs_price AS fPrice, ci.ci_img AS i_image, so.so_dis_price AS dis FROM 
            category_item AS ci INNER JOIN special_offers AS so ON so.so_ci_id = ci.id";
    $result = mysqli_query($mysqli, $sql);
?>
<link href="css/special-off-style.css" rel='stylesheet' type='text/css' />
<div class="container">
    <div class="row pl-4">
        <h3><b>Special Offers</b></h3>
    </div>
    <div class="row special-items">
        <?php 
            while($row = $result->fetch_assoc()){
        ?>
            <div class="col-12 col-sm-4 special-cards shadow  bg-white rounded">
                <div class="row">
                    <div class="col-sm-8 col-8" class="top-right" >
                        <img src="img/g_mart/g_mart.jpg" width="100px" height="25px" />
                    </div>
                    <div class="col-sm-4 col-4">
                        <?php
                            $disPrice = (int)(((int)$row['dis']/(int)$row['mPrice'])*100);
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
                            <img class="item-img shadow  bg-white rounded" src="data:image/jpeg;base64,<?php echo base64_encode($row['i_image']) ?>" width="100" height="100" alt="<?php echo $row['i_name']; ?>"/>
                        </div>
                        <div class="row" style="padding-top: 5%; padding-left: 10%; font-size: 110%;">
                            <p><b><span style="color: red;">Market Price : <del><i class="fa fa-rupee"></i> <span><?php echo $row['mPrice'].'</del></span><br><span style="color: green;">F&S Price : <i class="fa fa-rupee"></i> '.$row['fPrice']; ?></span></b></p>
                        </div> 
                    </div>
                    <div class="col-sm-7 col-6 input-item" >
                        <div class="row" style="font-size: 150%;">
                            <p><b><?php echo $row['i_name']; ?></b></p>
                            <input type="hidden" id="item-id" value="<?php echo $row['id']; ?>" />
                        </div>
                        <div class="row" style="font-size: 100%; width: 100%;">
                            <p><b>Description : </b><?php echo $row['i_des']; ?></p>
                        </div> 
                        <div class="row">
                            <p>Quantity : <span><?php echo $row['quant'].' '.$row['quant_type']; ?></span></p>
                        </div>   
                        <form class="row">
                            <div class="col-sm-6 col-6">
                                <input type="text" class="form-control input-number" style="text-align: center;" id="quantity" value="1" min="1" max="5">
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