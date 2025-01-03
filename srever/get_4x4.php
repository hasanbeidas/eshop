<?php 
include('connection.php');

$STMT= $conn -> prepare("SELECT * FROM products WHERE product_category='4x4' LIMIT 4 ");

$STMT ->execute();

$car4x4= $STMT -> get_result();
