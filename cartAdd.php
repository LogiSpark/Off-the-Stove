<?php
include 'function.php';
session_start();
$result=listWhere("cart",array("customer_id"=>$_SESSION['loggedInUser']));
$arr=fetch_array($result);
insert(array("o_id"=>$_GET['id'],"category"=>$_GET['category'],"serving"=>$_POST['quantity'],"cart_id"=>$arr['id']),"cart_detail");
$_SESSION['cartAdded']=1;
header("Location: ".$_GET['page'].".php");
?>