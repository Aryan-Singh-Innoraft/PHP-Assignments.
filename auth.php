<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: http://formaryan.com/login.php");
    exit();
}
?>
