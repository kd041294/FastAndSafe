<?php
//session starting
session_start();
//if user not logged in 
if(empty($_SESSION['user']['id'])){
    echo "false";
}
else{
    echo "true";
}