<?php 
require_once 'config.php';
unset($_SESSION['userId']);
header('Location: admin.php');
?>