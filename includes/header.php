<!DOCTYPE html>
<html>
<head>
    <title>Off-the-Stove<?php if (isset($current_page) && $current_page!='Home'){ echo " | ".$current_page;}?></title>
    <link rel="icon" type="image/x-icon" href="images/logo_small.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="admin/style/css/style.css" rel="stylesheet" type="text/css" media="all">

    <script src="layout/scripts/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/jquery.flexslider-min.js"></script>
    <script src="layout/scripts/notify.min.js"></script>

</head>
<?php
include "function.php";
session_start();
if (isset($_SESSION['loggedInUser']))
    include "includes/top_bar_login.php";
else
    include "includes/top_bar.php";
?>
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('images/carrots-cucumber-delicious-1640777.jpg');">
    <div class="wrapper row1">
        <header id="header" class="hoc clear">
            <div id="logo" class="fl_left" style="width: 23%; margin-top: 0!important;">
                <h1><a href="index.php"><img src="images/off-the-stove-logo_final.png" style="width: 100%;height: 100%"></a>
                </h1>
            </div>
            <nav id="mainav" class="fl_right">
                <ul class="clear">
                    <?php
                    $menu=array('Home','Recipe','Package','Demo');
                    for ($i=0;$i<sizeof($menu);$i++){
                        $location=strtolower($menu[$i]);
                        if ($menu[$i]=="Home"){
                            $location="index";
                        }
                        if (isset($current_page) && $current_page==$menu[$i]) {
                            echo "<li class='active'><a href=\"" . $location . ".php\">" . $menu[$i] . "</a></li>";
                        }else{
                            echo "<li><a href=\"" . $location . ".php\">" . $menu[$i] . "</a></li>";
                        }
                    }
                    ?>
                </ul>
            </nav>
        </header>
    </div>

    <script>
        function panel() {
            console.log("Inside");
//            document.getElementById("myDropdown").style.display("block");
            document.getElementById("myDropdown").classList.toggle("show");

        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.fa-shopping-cart')) {
                console.log("Inside here");
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        };
    </script>