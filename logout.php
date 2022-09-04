<?php include 'inc/init.php';
unset($_SESSION);
session_destroy();
session_unset();
header('location:index.php');
?>