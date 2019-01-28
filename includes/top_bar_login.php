<body id="top">
<div class="wrapper row0">
    <div id="topbar" class="hoc clear">
        <div class="cart">
            <div class="cart-in">
                <i class="fa fa-shopping-cart cart-icon" onclick="panel()"></i>
                <span class="num">
                    <?php
                    $query=listWhere("cart",array("customer_id"=>$_SESSION['loggedInUser']));
                    $arr=fetch_array($query);
                    $result=listCartItem($arr['id']);
                    $num=mysqli_num_rows($result);
                    echo $num;
                    ?>
                </span>
            </div>
        </div>
        <div class="fl_left">
            <ul>
                <li><i class="fa fa-phone"></i> +977 9860 261777</li>
                <!--                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>-->
            </ul>
        </div>
        <div class="fl_right">
            <ul>
                <li>Hello, <?php echo userName($_SESSION['loggedInUser'])?>!!</li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="myDropdown" class="dropdown-content w3-container w3-center w3-animate-right">
    <div class="arrow-up"></div>
    <div class="col-md-12 pad-top no-side-pad ">
        <?php

        $query=listWhere("cart",array("customer_id"=>$_SESSION['loggedInUser']));
        $arr=fetch_array($query);
        $result=listCartItem($arr['id']);
        $num=mysqli_num_rows($result);
        if ($num==0){
            echo "<div class=\"cart-panel\">";
            echo "<h6>Explore and place your first order.</h6>";
            echo "</div>";
        }else{
            while ($row=fetch_array($result)){
                $result1=listWhere($row['category'],array("id"=>$row['o_id']));
                while ($row1=fetch_array($result1)){
                    if ($row['category']=="recipe"){
                        $price=$row1['price']*$row['serving'];
                    }else{
                        $price=getPackagePrice($row1['id']*$row['serving']);
                    }
                    echo "<div class=\"cart-panel\">";
                    echo "<div class=\"cart-img\">
                         <img src=\"images/".$row['category']."/".$row1['photo']."\" class=\"round-img\">
                      </div>";
                    echo "<div class=\"cart-details\">
                          <h6>".$row1['name']."</h6>
                          <ul class=\"\">
                             <li>Price: ".$price."</li>
                             <li>Quantity:".$row['serving']."</li>
                          </ul>
                        </div>";
                    echo "</div>";
                }
            }
            echo "<a href=\"showCart.php\">View All<i class=\"fa fa-arrow-right\"></i></a>";
        }
        ?>
    </div>

</div>

