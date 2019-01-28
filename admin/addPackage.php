<?php
include 'includes/adminheader.php'
?>
<div id="page-content-wrapper">
    <div class="title-section-wrapper">
        <h3>Add Package</h3>
    </div>
    <div class="section-wrapper">
        <form class = "form-horizontal" method="POST" enctype="multipart/form-data" action="recipe/addRecipe.php">
            <div class="form-group">
                <label for = "name" class = "control-label col-sm-1">Name*</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <label for = "name" class = "control-label col-sm-2">Discount*</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="discount" name="discount" required>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label col-sm-1">Photo*</label>
                <div class="col-sm-5">
                    <input type = "file" class="form-control"  name="photo" id="photo" accept="image/*" required>
                </div>
                <label for = "name" class = "control-label col-sm-2">Expire Date*</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" id="expire_date" name="expire_date" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ingredient" class="control-label col-sm-1">Description*</label>
                <div class = "col-sm-10">
                   <textarea class="ckeditor" name="description" id="description" required></textarea>
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