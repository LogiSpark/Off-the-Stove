<?php
include 'function.php';
$result=listWhere($_GET['category'],array("id"=>$_GET['id']));
$arr=fetch_array($result);
if ($_GET['category']=='recipe'){
    $price=$arr['price'];
}else{
    $price=getPackagePrice($arr['id']);
}
echo " <h4 class=\"modal-title\">".$arr['name']."</h4>";
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="input-group">
                <form class = "form-horizontal" method="POST" enctype="multipart/form-data" action="cartAdd.php?category=<?php echo $_GET['category']?>&page=<?php echo $_GET['page']?>&id=<?php echo $_GET['id']?>">
                    <div class="form-group">
                        <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="2" min="1" max="100">
                        <span class="input-group-btn">
                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </span>
                        <input type="text" id="price" name="price" class="form-control input-number" value="<?php echo $price?>">
                        <input type="hidden" id="init_price" name="init_price" class="form-control input-number" value="<?php echo $price?>">

                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" role="button" value="Submit" type="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            var price =parseInt($('#init_price').val());
            if(quantity<12) {
                $('#quantity').val(quantity + 2);
            }
            var quantity = parseInt($('#quantity').val());
            $('#price').val(price*(quantity/2));
        });
        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            var price =parseInt($('#init_price').val());
            if(quantity>2){
                $('#quantity').val(quantity - 2);
            }
            var quantity = parseInt($('#quantity').val());
            $('#price').val(price*(quantity/2));
        });
    });
</script>
