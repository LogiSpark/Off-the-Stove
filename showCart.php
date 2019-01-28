<?php
include 'includes/header.php';
//$result1=listWhere("cart",array("customer_id" => $_SESSION['loggedInUser']));
//$cust_id = $_SESSION['loggedInUser'];
$cust_id = 1;
?>
<html>
<body>
<div class="wrapper page-title">
    <h3 class="heading heading-page center">My Cart</h3>
</div>
<div  class="wrapper bgded overlay">
    <main class="hoc container clear" style="background-color: #efefef;margin-top: 2%; margin-bottom: 2%; ">

        <button><a href="cart/addCart.php?cust_id=<?php echo $cust_id?>"> Submit</a></button>
        <table class="table table-stripped">
            <thead>
            <th>Cart ID</th>
            <th>Category</th>
            <th>Serving</th>
            <th></th>
            </thead>
            <tbody>
            <?php
            $result=listAllActive($cust_id);
            while ($row=fetch_array($result)){
                echo "<tr><td>".$row['cart_id']."</td><td>".$row['category']."</td><td>".$row['serving']."</td><td>"?><a href="cart/deleteCart.php?cart_id=<?php echo $cart_id?>"> Delete</a></td>";
                <?php
            }
            ?>
            </tbody>
            <tfoot><tr>
                <th >Total :</th>
                <td></td><td></td><td></td><td><b></b></td><td><b>".$total_markedprice."</b></td><td></td><td></td><td></td><td></td>
            </tr>
            </tfoot>";
        </table>
    </main>
</div>
</body>
</html>