<?php
include '../function.php';
$id = $_GET['cart_id'];
$query = "update cart_detail set active = 0 where cart_id =".$id;
echo $query;
$res = execute($query);

//header("Location:../...php");
exit;
