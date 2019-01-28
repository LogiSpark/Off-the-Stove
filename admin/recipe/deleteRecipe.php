<?php
include '../function.php';
delete("recipe",$_GET);
header("Location: ../listRecipe.php");
?>