<?php
//including connection file 
include 'connection.php';
//include links file
include 'constant-links.php';
if(isset($_POST['query'])){
    $inputText = $_POST['query'];
    $query = "SELECT c.id AS id, c.ci_img As img, c.ci_name AS c_name, s.id AS sId, s.sc_name AS s_name FROM category_item AS c INNER JOIN secondary_category AS s"
            . " ON c.ci_sc_id = s.id WHERE ci_name LIKE '%$inputText%' LIMIT 5";
    
    $result = $mysqli->query($query);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo '<p style="width: 100%; margin: auto; padding: 2%; background-color: white" ><image src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="35px" height="40px"/><a href="'.$routes['s-s-pro'].'?qS='.urlencode(base64_encode($row['sId'])).'&qC='.urlencode(base64_encode($row['id'])).'" >                  '.$row['c_name'].' in <span style="font-size: 120%; color: #E8D020;"><b>'.$row['s_name'].'</b></span></a></p>';
        }
    }
    else{
        echo '<p class="bg-light; background-color: white" style="width: 100%; margin: auto; padding: 2%;">No match found.</p>';
    }
}