<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $firstname=htmlspecialchars($_POST["firstname"]);
    $lastname=htmlspecialchars($_POST["lastname"]);
?>

<h1>Hello <?php echo $firstname." ".$lastname;?></h1>

<?php } ?>
