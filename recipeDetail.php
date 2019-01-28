<?php
include 'includes/header.php';
$result=listWhere("recipe",$_GET);
while ($row=fetch_array($result)) {
    ?>
    <div class="wrapper page-title">
        <h3 class="heading heading-page center"><?php echo $row['name'];?></h3>
    </div>
    </div>
    <div class="wrapper bgded overlay">
        <main class="hoc container clear" style="background-color: #efefef;margin-top: 2%; margin-bottom: 2%; ">
            <div class="ingredient">
                <div class="img-ingredient">
                    <img src="images/recipe/<?php echo $row['photo']?>">
                    <div class="receipe-time">
                        <div class="ingredient-icon">
                            <i class="fa fa-clock-o text-black"></i>
                        </div>
                        <div class="insights">
                            <h4 class="no-pad text-black">Prep</h4>
                            <p><?php echo $row['prep'];?>m</p>
                        </div>
                        <div class="insights">
                            <h4 class="no-pad text-black">Cook</h4>
                            <p><?php echo $row['cook'];?>m</p>
                        </div>
                        <div class="insights">
                            <h4 class="no-pad text-black">Ready-in</h4>
                            <p><?php echo $row['ready'];?>m</p>
                        </div>

                    </div>
                </div>
                <div class="text-ingredient">
                    <h6 class="heading recipe-heading">Ingredients</h6>
                    <?php echo $row['ingredient'];?>
                </div>
            </div>

            <div class="ingredient-desciption">
                <h6 class="heading recipe-heading">Directions:</h6>
                <?php echo $row['direction'];?>
            </div>
        </main>
    </div>
    <?php
}
include 'includes/footer.php';
?>