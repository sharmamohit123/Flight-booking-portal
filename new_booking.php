<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "BOOK FLIGHT";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php include_once $path.'/common/new_booking.php';?>

<?php include_once $path.'/common/footer.php';?>