<?php 
session_start();
session_destroy();
header("Location: ../Assets/login.php");
?>