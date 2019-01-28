<?php
include '../function.php';
insert($_GET,"cuisine");
header("Location: ../addRecipe.php");
?>