<?php
include 'includes/adminheader.php'
?>
<div id="page-content-wrapper">
    <div class="title-section-wrapper">
        <h3>Add Recipe</h3>
    </div>
    <div class="section-wrapper">
        <form class = "form-horizontal" method="POST" enctype="multipart/form-data" action="recipe/addRecipe.php">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Category*</label>
                <div class="col-sm-3">
                    <select class="form-control" id='cuisine' name='cuisine'>
                    <?php
                    $result = listAll("cuisine");
                    while ($row = fetch_array($result)) {
                        echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
                    }
                    ?>
                    </select>

                </div>

                <button class="btn btn-primary col-md-1" onclick='alertmsg()'>Add Cuisine</button>
                <script>
                    function alertmsg() {
                        var response = prompt('Enter new cuisine:');
                        window.location.href = 'recipe/addCuisine.php?name=' + response;
                    }
                </script>
                <label for="name" class="control-label col-sm-1">Photo*</label>
                <div class="col-sm-3">
                    <input type = "file" class="form-control"  name="photo" id="photo" accept="image/*" required>

                </div>

            </div>
            <div class="form-group">
                <label for = "name" class = "control-label col-sm-2">Name*</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <label for = "name" class = "control-label col-sm-1">Price*</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
            </div>

            <div class="form-group">
                <label for = "time" class = "control-label col-sm-3 col-sm-offset-4"><h4>Time Required (in mins)</h4></label>
            </div>
            <div class="form-group">
                <label for = "name" class = "control-label col-sm-1 col-sm-offset-1">Prep*</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="prep" name="prep" required>
                </div>
                <label for = "name" class = "control-label col-sm-1">Cook*</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="cook" name="cook" required>
                </div>
                <label for = "name" class = "control-label col-sm-1">Ready*</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="ready" name="ready" required>
                </div>
            </div>
            <div class = "form-group">
                <label for = "title" class = "control-label col-sm-2">Category1*</label>
                <div class = "col-sm-2">
                    <select class = "form-control" name = "category1"  required>
                        <?php
                        $category1=array('Breakfast','Lunch','Dinner','Appetizer','Drinks');
                        for ($i=0;$i<sizeof($category1);$i++){
                            echo " <option value='".$category1[$i]."'>".$category1[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>
                <label for = "title" class = "control-label col-sm-1">Category2*</label>
                <div class = "col-sm-2">
                    <select class = "form-control" name = "category2"  required>
                        <?php
                        $category2=array('Veg','Non-Veg','Hard','Soft');
                        for ($i=0;$i<sizeof($category2);$i++){
                            echo " <option value='".$category2[$i]."'>".$category2[$i]."</option>";
                        }
                        ?>
                    </select>
                </div>
                <label for = "name" class = "control-label col-sm-1">Calories*</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="calories" name="calories" required>
                </div>
            </div>
            <div class="form-group">
                <label for="ingredient" class="control-label col-sm-2">Ingredients*</label>
                <div class = "col-sm-8">
                <textarea class="ckeditor" name="ingredient" id="ingredient"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="ingredient" class="control-label col-sm-2">Direction*</label>
                <div class = "col-sm-8">
                <textarea class="ckeditor" name="direction" id="direction"></textarea>
                </div>
            </div>



            <div class = "form-group">
                <div class = "col-sm-2 col-sm-offset-2">
                    <input class="btn btn-primary" role="button" value="Submit" type="submit">
                </div>
            </div>
        </form>
    </div>
</div>