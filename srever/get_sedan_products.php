<?php 
include('connection.php');

$STMT= $conn -> prepare("SELECT * FROM products WHERE product_category='sedan' LIMIT 4 ");

$STMT ->execute();

$sedan_products= $STMT -> get_result();