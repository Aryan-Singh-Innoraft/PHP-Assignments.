<?php include "../../auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./CSS/design.css">
    <title>Welcome Page</title>
</head>
<body>
    <?php include '../../navbar.php' ?>
    <section class="welcome-page">
        <div class="container">
            <div class="welcome-wrapper">
            <?php
            $target_dir="upload/";
            $target_file=$target_dir . basename($_FILES["imageToUpload"] ["name"]);
            $uploadOk=1;
            $imageFileType=strtolower(pathinfo($target_file,$PATHINFO_EXTENSION));
            // checking whether it is an actual image or fake 
            if(isset($_POST["submit"])){
                $check=getimagesize($_FILES["imageToUpload"]["tmp_name"]);
                if($check!==FALSE){
                    $uploadOk=1;
                }
                else{
                    echo "File is not an image.";
                    $uploadOk=0;
                }
            }
            ?>
            <?php
            if($uploadOk==0){
                echo "Sorry try again.";
            }
            // uploading image 
            else{
                if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"],$target_file)){
                    echo "<img src='$target_file' alt='Uploaded Image' class='uploaded-image'>";//displaying image
                }
                else{
                    echo "File has not been uploaded";
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $firstName = htmlspecialchars($_POST["firstname"]);
                $lastName = htmlspecialchars($_POST["lastname"]);
            ?>
            <h1 class="heading">Hello <?php echo $firstName." ".$lastName;?></h1>
            <?php
                }
            ?>
            </div>
        </div>
    </section>
</body>
</html>
