<?php

session_start();

define('SITEURL','http://localhost/food-order/');

$db_hostname='127.0.0.1';
$db_username='root';
$db_password='';
$db_name='food-order';

$conn = mysqli_connect ($db_hostname,$db_username,$db_password,$db_name);
?>