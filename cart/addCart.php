<?php
include "../function.php";

//session_start();
//echo $_GET['cust_id'];
$id=insertOrder($_GET['cust_id']);
$result=listAllActive($_GET['cust_id']);
while ($row=fetch_array($result)){
    update(array("active"=>0,"order_id" => $id),array("cart_id"=>$row['cart_id']),"cart_detail");
}

exit;
?>