<?php 
session_start();
session_unset("admin");
$_SESSION['admin']="";
session_destroy();
header("Location: ../index.php");
?>