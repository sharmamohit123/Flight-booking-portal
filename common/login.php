
 <?php
 if($_SERVER['REQUEST_METHOD']=='POST'){

 	if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])){
		echo "<script> alert('You are already loged in.'); </script>";
	 }
 
	elseif(!empty($_POST['uname']) && !empty($_POST['pass'])){
	 	$path = $_SERVER['DOCUMENT_ROOT'];
	 	include_once $path.'/common/base.php'; 
	 	include_once $path.'/inc/class.users.inc.php'; 
	 	$users = new bookingUsers($db);
	 	if($users->accountLogin()==TRUE){
			//echo "<h1> You have Successfully Logged In.</h1>";
			//if($set){
				//$set = FAlSE;
			echo "<meta http-equiv='refresh' content='0; url=/new_booking.php'>";
			//}
			//else{
			//echo "<meta http-equiv='refresh' content='3; url=/new_booking.php'>";				
			//}
		 }
	 	else{

			echo "<script> alert('Login failed'); </script>";
		 }
		 // unset($_POST['email']);
	}
 }
?>

 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login.css">

<div class="wrapper">
	<div class="container">
		<h1>LOGIN</h1>
		
		<form class="form" method="POST" acton="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			<input type="text" placeholder="Username" required name="uname" class="icon11">
			<input type="password" placeholder="Password" required name="pass" class="icon2">
			<button type="submit" id="login-button" method="POST">Login</button><br /><br /><br /><br />
			<b>New to MyFlight?</b><br /><br />
			<button type="button" id="login-button" onclick="myFunction()">Create Your Account</button>
		</form>
	</div>
	
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
<script>
function myFunction() {
	document.getElementById('change').innerHTML="<meta http-equiv='refresh' content='3; url=/signup.php'>"; 
}
</script>
