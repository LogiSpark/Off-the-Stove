<?php
include 'includes/adminheader.php'
?>
<div id="page-content-wrapper">
    <div class="title-section-wrapper">
        <h3>Recipe List</h3>
    </div>
    <div class="section-wrapper">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Price</th>
                <th>Category1</th>
                <th>Category2</th>
                <th>Cuisine</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
            <?php
            $result=listAll("recipe");
            while ($row=fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "<td>".$row['category1']."</td>";
                echo "<td>".$row['category2']."</td>";
                echo "<td>".$row['cuisine']."</td>";
                echo "<td><a href='editRecipe.php?id=".$row['id']."'>Edit</a></td>";
                echo "<td><a href='recipe/deleteRecipe.php?id=".$row['id']."'>Delete</a> </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>