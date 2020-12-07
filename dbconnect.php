<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindb";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_error()):
    echo "Connection error: ".mysqli_connect_error();
endif;
?>