<?php 
//connect to the mysql
$mysqli = new mysqli('127.0.0.1', 'root', '', 'fast_and_safe');
//check for the connection
if( $mysqli->connect_error){
    echo "Database Connection error ..!!!";
    die( 'Connect Error' .$mysqli->connect_errno .' : '.$mysqli->connect_error );
}
