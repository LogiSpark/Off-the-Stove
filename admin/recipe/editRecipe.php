<?php
include "../function.php";

if (basename($_FILES["image1"]["name"])==""){
    echo "empty";
     updateRecipe($_POST,$_GET);
}
else{
    $allow = array("jpg", "jpeg", "gif", "png");
    $target_dir = '../../images/news_images/';

    if(isset($_FILES['image1']))
    {
        $target_file = $target_dir . basename($_FILES["image1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image1"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo  "File is not an image.";
                $uploadOk = 0;
            }
        }

        if (file_exists($target_file)) {
            //                session_start();
            //        echo "Sorry, the file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "tif") {
            //    echo $imageFileType;
            //                session_start();
            //                $_SESSION['error'][] =  "Sorry, only JPG, JPEG, PNG, TIF & GIF files are allowed.";
            echo "Sorry, only JPG, JPEG, PNG, TIF & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your image was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file)) {

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    print_r($_POST);
    $_POST['photo']= basename($_FILES["image1"]["name"]);
    updateRecipe($_POST,$_GET);
}

header("Location: ../listRecipe.php");
?>