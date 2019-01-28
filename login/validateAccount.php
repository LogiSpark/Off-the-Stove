<?php
include ("../function.php");

if (isset($_GET['id'])){
    session_start();
    update(array("validated"=>1),$_GET,"customer");
    $_SESSION['loggedInUser'] =$_GET['id'];
}
header("location:../index.php");

?>