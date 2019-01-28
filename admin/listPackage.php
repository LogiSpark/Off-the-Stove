<?php
include 'includes/adminheader.php'
?>
<div id="page-content-wrapper">
    <div class="title-section-wrapper">
        <h3>Package List</h3>
    </div>
    <div class="section-wrapper">
        <table class="table">
            <thead>
            <th>Name</th>
            <th>No. of Recipe</th>
            <th>Total Price</th>
            <th></th>
            <th></th>
            </thead>
            <tbody>
            <?php
            $result=listAll("package");
            while ($row=fetch_array($result)){
                $result1=listWhere("package_detail",array('package_id'=>$row['id']));
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".total_rows($result1)."</td>";
                echo "<td>".getPackagePrice($row['id'])."</td>";
                echo "<td><a href='editPackage.php?id=".$row['id']."'>Edit</a></td>";
                echo "<td><a href='recipe/deletePackage.php?id=".$row['id']."'>Delete</a> </td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>