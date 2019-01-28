<?php
$current_page="Package";
include 'includes/header.php';
if (isset($_SESSION['cartAdded'])){
    echo "<script>$.notify('Successfully added to cart', 'success');</script>";
    unset($_SESSION['cartAdded']);
}
?>
<div class="wrapper page-title">
    <h3 class="heading heading-page center" >Package</h3>
</div>
</div>

<div class="wrapper bgded overlay " >
    <main class="hoc container clear">
        <!-- main body -->
        <div id="introblocks">
            <ul class="nospace group ">
                <?php
                $result=listNotExpiredPackage(0);
                $i=0;
                while ($row=fetch_array($result)){
                    $price=getPackagePrice($row['id']);
                    if ($i%3==0){
                        echo "<li class=\"one_third first marginTop2\">";
                    }else{
                        echo "<li class=\"one_third marginTop2\" >";
                    }
                    echo "<article><div>";
                    echo "<div style=\"float: left\">
                                    <h6 class=\"heading\">".$row['name']."</h6>
                                    <p style='float: left'><i>Expire Date: ".$row['expire_date']."</i></p>
                                </div>
                                <div style=\"float: right\">
                                    <p><span class='addToCart' title='Add to Cart'>
                                    <a onclick='displayModel(".$row['id'].")'><i class='fa fa-cart-plus'></i></a>
                                    </span></p>
                                    <p style='float: right'>Rs: ".$price."</p>
                                </div>";
                    echo "<div class='maxIngredientDetail'><p>".$row['description']."</p></div>";
                    echo "</div>";
                    echo "<img src=\"images/recipe/".$row['photo']."\" alt=\"\">";
                    echo "<footer><a href=\"packageDetail.php?id=".$row['id']."\">More Details</a></footer>";
                    echo "</article></li>";
                    $i++;
                }
                ?>
            </ul>
        </div>

        <!-- / main body -->
        <div class="clear"></div>
    </main>
</div>
<div class="modal fade addToCartModal" id="addToCartModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function displayModel(id,category){
        <?php
        if (isset($_SESSION['loggedInUser'])){
            echo "$('.modal-body').load('showCartInfo.php?category=package&page=index&id='+id,function(){
                        $('#addToCartModal').modal({show:true});
                        });";
        }else{
//            $_SESSION['cartMessage']='Login to continue';
            echo " $(\"#id01\").modal('show');";
        }

        ?>

    }
</script>
<?php
include 'includes/footer.php';
?>
