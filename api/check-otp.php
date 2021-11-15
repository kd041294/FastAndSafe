<?php

//starting session
session_start();

$submitOtp = (int)$_POST['sOtp'];
$validOtp = (int)$_POST['vOtp'];

if($submitOtp == $validOtp){
    echo "true";
}
else{
    echo "false";
}
