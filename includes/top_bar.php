<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* Full-width input fields */
    input[type=text], input[type=password], input[type=email],textarea {
        width: 30%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 30%;
    }

    button:hover {
        opacity: 0.8;
    }

    .container {
        padding: 5%;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
        padding-top: 60px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 30%; /* Could be more or less, depending on screen size */
    }

    /* The Close Button (x) */
    .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: red;
        cursor: pointer;
    }
    .scroll{
        overflow-y: auto;
        width: 108% !important;
    }
    /* Add Zoom Animation */
    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }
        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }
        to {
            transform: scale(1)
        }
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }
</style>
<body id="top">
<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <div class="fl_left">
            <ul>
                <li><i class="fa fa-phone"></i> +977 9860 261777</li>
                <!--                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>-->
            </ul>
        </div>
        <div class="fl_right">
            <ul>
                <li><a onclick="document.getElementById('id01').style.display='block'">Login</a></li>
                <li><a onclick="document.getElementById('id02').style.display='block'">Register</a></li>
            </ul>
        </div>

    </div>
</div>


<div id="id01" class="modal">
    <form class="modal-content animate" method="post" action="login/login.php">
        <div class="container">
            <h1>Sign In</h1>
            <?php
            if (isset($_SESSION['errorMessage'])) {
                echo "<p style='color: maroon'><i class=\"fa fa-exclamation-triangle\"></i>" . $_SESSION['errorMessage'] . "</p>";
                unset($_SESSION['errorMessage']);
            }
            if (isset($_SESSION['cartMessage'])){
                echo "<p style='color: orangered'><i class=\"fa fa-info-circle\"></i> " . $_SESSION['cartMessage'] . "</p>";
                unset($_SESSION['cartMessage']);
            }
            ?>
            <div class="form-group">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Enter Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <!--            <label>-->
            <!--                <input type="checkbox" checked="checked" name="remember"> Remember me-->
            <!--            </label>-->
        </div>
    </form>
</div>


<div id="id02" class="modal scroll">
    <form class="modal-content" method="post" action="login/register.php">
        <div class="container">
            <div class="form-group">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>

            <h1>Sign Up</h1>
            <?php
            if (isset($_SESSION['errorMessageRegister'])) {
                echo "<p style='color: maroon'><i class=\"fa fa-exclamation-triangle\"></i>" . $_SESSION['errorMessageRegister'] . "</p>";
                unset($_SESSION['errorMessageRegister']);
            }
            ?>
            <p>Please fill in this form to create an account.</p>
            <hr style="width: 30%">
            <div class="form-group">
                <input type="text" placeholder="Enter Name" id="name" name="name" required>
            </div>
            <div class="form-group">
                <input type="email" placeholder="Enter Email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input name="password" id="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" name="password_two" id="password_two" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
            </div>
            <div class="form-group">
                <input type="text" placeholder="Enter Contact" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <textarea placeholder="Enter Address (Explain in detail) " name="address" id="address" required></textarea>
            </div>

                <!--            <label>-->
<!--                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me-->
<!--            </label>-->
            <p style="color: orangered"><i class="fa fa-info-circle"></i> Validate your account via email.</p>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="clearfix">
                <button type="submit" class="signupbtn">Sign Up</button>
            </div>
        </div>
    </form>
</div>



