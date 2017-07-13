<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "MY ACCOUNT";
session_start();
include_once $path.'/common/header.php';?>
<?php include_once $path.'/common/navbar.php';?>
<?php
    include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$user = new bookingUsers($db);
        $list = $user->getUser();
    ?>
<?php include_once $path.'/change_user.php';?>
<?php include_once $path.'/change_pass.php';?>
<?php include_once $path.'/delete_acc.php';?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login1.css">

  <div class="wrapper" style="min-height:100px;height:300px">
	<div class="container" style="min-width:900px">
        <img src="./images/profile.png" height="100px" width="100px">
		<h1 style="color:#00004d">Welcome <?php echo $_SESSION['Username']; ?></h1>
		<h2 style="color:#00004d"><?php echo $list['email']; ?></h2><br><br>

	</div>
	<br>
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
<div style="background-color:#00004d;min-height:600px">
    <a href="#" onclick="call1()" >Change Email Address</a><br>
    <a href="#" onclick="call2()" >Change Password</a><br>
    <a href="#" onclick="call3()" >Delete Account</a><br>
    <a href="./logout.php">Logout</a><br>
</div>
<script>
    function call1(){
        document.getElementById('id01').style.display='block';
        document.getElementById('id03').style.display='none';
        document.getElementById('id05').style.display='none';
    }
    function call2(){
        document.getElementById('id01').style.display='none';
        document.getElementById('id03').style.display='block';
        document.getElementById('id05').style.display='none';
    }
    function call3(){
        document.getElementById('id01').style.display='none';
        document.getElementById('id03').style.display='none';
        document.getElementById('id05').style.display='block';
    }
</script>