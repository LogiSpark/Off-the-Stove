<?php
include 'includes/adminheader.php';
$result=listWhere("recipe",$_GET);
while ($row=fetch_array($result)) {


    ?>
    <div id="page-content-wrapper">
        <div class="title-section-wrapper">
            <h3>Edit Recipe</h3>
        </div>
        <div class="section-wrapper">
            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="recipe/editRecipe.php?id=<?php echo $_GET['id']?>">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2"></label>
                    <div class="col-sm-3">
                        <img src="../images/recipe/<?php echo $row['photo']?>" style="height: 20%;width: auto">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Category*</label>
                    <div class="col-sm-3">
                        <select class="form-control" id='cuisine' name='cuisine'>
                            <?php
                            $result = listAll("cuisine");
                            while ($row1 = fetch_array($result)) {
                                if ($row['name']==$row1['name']){
                                    echo "<option value='" . $row1["name"] . "' selected>" . $row1["name"] . "</option>";
                                }else{
                                    echo "<option value='" . $row1["name"] . "'>" . $row1["name"] . "</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>

                    <button class="btn btn-primary col-md-1" onclick='alertmsg()'>Add Cuisine</button>
                    <script>
                        function alertmsg() {
                            var response = prompt('Enter new cuisine:');
                            if (response!=null) {
                                window.location.href = 'recipe/addCuisine.php?category=cuisine&name=' + response;
                            }
                        }
                    </script>
                    <label for="name" class="control-label col-sm-1">Photo*</label>
                    <div class="col-sm-3">
                        <input type="file" class="form-control" name="image1" id="image1" accept="image/*">

                    </div>

                </div>
                <input type="hidden" name="photo" id="photo" value="<?php echo $row['photo']?>">
                <div class="form-group">
                    <label for="name" class="control-label col-sm-2">Name*</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']?>" required>
                    </div>
                    <label for="name" class="control-label col-sm-1">Price*</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['price']?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="time" class="control-label col-sm-3 col-sm-offset-4"><h4>Time Required (in mins)</h4>
                    </label>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label col-sm-1 col-sm-offset-1">Prep*</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="prep" name="prep" value="<?php echo $row['prep']?>" required>
                    </div>
                    <label for="name" class="control-label col-sm-1">Cook*</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="cook" name="cook" value="<?php echo $row['cook']?>" required>
                    </div>
                    <label for="name" class="control-label col-sm-1">Ready*</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="ready" name="ready" value="<?php echo $row['ready']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="control-label col-sm-2">Category1*</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="category1" required>
                            <?php
                            $category1=array('Breakfast','Lunch','Dinner','Appetizer','Drinks');
                            for ($i=0;$i<sizeof($category1);$i++){
                                if ($row['category1']==$category1[$i]) {
                                    echo " <option value='" . $category1[$i] . "' selected>" . $category1[$i] . "</option>";
                                }else{
                                    echo " <option value='" . $category1[$i] . "'>" . $category1[$i] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label for="title" class="control-label col-sm-1">Category2*</label>
                    <div class="col-sm-2">
                        <select class="form-control" name="category2" required>
                            <?php
                            $category2=array('Veg','Non-Veg','Hard','Soft');
                            for ($i=0;$i<sizeof($category2);$i++){
                                if ($row['category2']==$category2[$i]) {
                                    echo " <option value='" . $category2[$i] . "' selected>" . $category2[$i] . "</option>";
                                }else{
                                    echo " <option value='" . $category2[$i] . "'>" . $category2[$i] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label for="name" class="control-label col-sm-1">Calories*</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="calories" name="calories" value="<?php echo $row['calories']?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ingredient" class="control-label col-sm-2">Ingredients*</label>
                    <div class="col-sm-8">
                        <textarea class="ckeditor" name="ingredient" id="ingredient"><?php echo $row['ingredient']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ingredient" class="control-label col-sm-2">Direction*</label>
                    <div class="col-sm-8">
                        <textarea class="ckeditor" name="direction" id="direction"><?php echo $row['direction']?></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-2">
                        <input class="btn btn-primary" role="button" value="Submit" type="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>