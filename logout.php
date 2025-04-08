<?php
session_start();
session_unset();
session_destroy();
header("Location: http://formaryan.com/login.php"); 
exit();
?>