<?php 
    //start secction
    session_start();

    //Create Constants to store non repeating values
    define('SITEURL', 'http://localhost/coffee-shop/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'phpwebsite_cfs');

    $con = mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error($con));
    $db_select = mysqli_select_db($con, DB_NAME) or die(mysqli_error($con));
?>