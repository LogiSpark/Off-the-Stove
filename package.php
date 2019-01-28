<?php
include 'includes/header.php';
?>
<div class="wrapper page-title">
    <h3 class="heading heading-page center" >Recipe</h3>
</div>
</div>

<div class="wrapper bgded overlay " >
    <main class="hoc container clear">
        <!-- main body -->
        <div id="introblocks">
            <ul class="nospace group ">
                <?php
                $result=listAllDesc("recipe");
                $i=0;
                while ($row=fetch_array($result)){
                    if ($i%3==0){
                        echo "<li class=\"one_third first marginTop2\">";
                    }else{
                        echo "<li class=\"one_third marginTop2\" >";
                    }
                    echo "<article><div>";
                    echo "<h6 class=\"heading\">".$row['name']."</h6>";
                    echo "<p>Ready-In: ".$row['ready']." mins</p>";
                    echo "</div>";
                    echo "<img src=\"images/recipe/".$row['photo']."\" alt=\"\">";
                    echo "<footer><a href=\"recipeDetail.php?id=".$row['id']."\">More Details</a></footer>";
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
<?php
include 'includes/footer.php';
?>
