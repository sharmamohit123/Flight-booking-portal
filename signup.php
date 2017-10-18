<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "SIGNUP";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php include_once $path.'/common/signup.php';?>

<?php include_once $path.'/common/footer.php';?>
<?php include_once $path.'/common/close.php';?>