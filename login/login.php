<?php
session_start();
include '../function.php';

$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from customer where email = \"$email\"";


$result = execute($query);
$num = total_rows($result);

if ($num == 0)
{
    $_SESSION['errorMessage']="This user does not exist ";
    header("Location:../index.php#error");
    exit;
}

$query = "select * from customer where email = \"$email\" and validated = 1";
$result = execute($query);
$num = total_rows($result);
if ($num == 0)
{
    $_SESSION['errorMessage']="The account is not active";
    header("Location:../index.php#error");
    exit;
}

$query = "select * from customer where email = \"$email\" and password = \"$password\"";
$result = execute($query);
$num = total_rows($result);
if ($num == 0)
{
    $_SESSION['errorMessage']="Username and password do not match";
    header("Location:../index.php#error");
    exit;
}

echo "<script>console.log(\"Reached session checking\")</script>";

$query = "select * from customer where email = \"$email\"" ;
$res = execute($query);
$arr = fetch_array($res);
$_SESSION['loggedInUser'] = $arr['id'];
echo "<script>console.log(\"login user: ".$_SESSION['loggedInUser']."\")</script>";
print_r($_SESSION);
header("location:../index.php");
exit;
?>