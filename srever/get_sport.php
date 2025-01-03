<?php 
include('connection.php');

$STMT= $conn -> prepare("SELECT * FROM products WHERE product_category='sport' LIMIT 4 ");

$STMT ->execute();

$sport_products= $STMT -> get_result();
