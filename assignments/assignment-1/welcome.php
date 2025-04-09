<?php include "../../auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <?php
        include '../../navbar.php' ;
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $firstname=htmlspecialchars($_POST["firstname"]);
            $lastname=htmlspecialchars($_POST["lastname"]);
        ?>

        <h1>Hello <?php echo $firstname." ".$lastname;?></h1>

    <?php } ?>
</body>
</html>

