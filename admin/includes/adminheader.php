<html>
<head>
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/font-awesome.min.css">

    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/css/responsive.css">

    <link rel="stylesheet" href="style/css/style.css">

    <link rel="stylesheet" href="style/css/sidebar.css">
</head>

<body>

<div id="wrapper">
    <!--        Horizontal Header-->
    <div class="header ">
        <div class="logo-box">
            <img src="../images/off-the-stove-logo_final.png" class="logo">
        </div>
        <?php include 'function.php'?>
    </div>
    <div id="sidebar-wrapper-default">
        <ul class="sidebar-nav-default">
            <li  style="">
                <a href="#" class="" id="recipe">
                    <i class="icon_desktop"></i>
                    <span><i class="fa fa-file "></i>Recipe</span>
                    <span class="fa fa-angle-down pull-right"></span>
                </a>
                <ul class="sub-report" id="recipe-list" style="list-style-type:none">
                    <li><a href="addRecipe.php"><i class="fa fa-fw fa-plus"></i> Add Recipe</a></li>
                    <li><a href="listRecipe.php"><i class="fa fa-fw fa-list"></i> List Recipe </a></li>
                </ul>
            </li>

            <li  style="">
                <a href="#" class="" id="package">
                    <i class="icon_desktop"></i>
                    <span><i class="fa fa-file "></i>Package</span>
                    <span class="fa fa-angle-down pull-right"></span>
                </a>
                <ul class="sub-report" id="package-list" style="list-style-type:none">
                    <li><a href="addPackage.php"><i class="fa fa-fw fa-plus"></i> Add Package</a></li>
                    <li><a href="listPackage.php"><i class="fa fa-fw fa-list"></i> List Package </a></li>
                </ul>
            </li>

            <li class="sub-menu"><a href="billing.php"><i class="fa fa-pencil"></i> Order</a></li>
            <li class="sub-menu"><a href="revert.php"><i class="fa fa-repeat"></i> Revert</a></li>
            <li class="sub-menu"><a href="customer_info.php"><i class="fa fa-user-o"></i> Customer</a></li>
        </ul>
    </div>
    <!--        Default side nav bar ends here-->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script>
        $(function () {
            $('#recipe').click(function () {
                $('#recipe-list').slideToggle();
            });
            $('#package').click(function () {
                $('#package-list').slideToggle();
            });


            $('#articles').click(function () {
                $('#article-list').slideToggle();
            });

            $('#department').click(function () {
                $('#department-list').slideToggle();
            });


            $('#faculty').click(function () {
                $('#faculty-list').slideToggle();
            });

            $('#contact').click(function () {
                $('#contact-list').slideToggle();
            });

            $('#video').click(function () {
                $('#video-list').slideToggle();
            });

            $('#inquiry').click(function () {
                $('#inquiry-list').slideToggle();
            });

            $('#open-house').click(function () {
                $('#open-house-list').slideToggle();
            });

            $('#documents').click(function () {
                $('#document-list').slideToggle();
            });

            $('#customize').click(function () {
                $('#customize-list').slideToggle();
            });

        });

        //        script for logout starts

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.user-name-header')) {

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

        //        script for logout ends
    </script>




