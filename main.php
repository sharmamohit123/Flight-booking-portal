
<?php
session_start();    
    date_default_timezone_set("Asia/Bangkok");
//echo "The time is " . date("h:i:sa");
//echo date("d/m/Y");
//unset($_SESSION['time']);
$d = strtotime("today");
if(!isset($_SESSION['time'])){
$_SESSION['time'] = strtotime("July 11 2017");
}
//echo date('Y', $d);
if($d>$_SESSION['time']){
        $path = $_SERVER['DOCUMENT_ROOT'];
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$users = new populate($db);
        $users->change_date();
        $_SESSION['time'] = $d;
}
?>
<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "MyFlight";
//session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php include_once $path.'/common/carousel.php';?>
<?php include_once $path.'/common/footer.php';?>
<?php include_once $path.'/common/close.php';?>