<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "LOGIN";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php include_once $path.'/common/login.php';?>

<?php include_once $path.'/common/footer.php';?>