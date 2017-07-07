<?php
$nameerr = $emailerr = $passerr = "";
$name = $email = $pass1 = $pass2 = "";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $flag = 0;
$name = test_input($_POST['uname']);
if(!preg_match("/^[a-zA-Z ]*$/",$name)){
    $nameerr = "Only letters and white spaces allowed.";
    $flag = 1;
}

$email = test_input($_POST['email']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailerr = "Invalid email format.";
    $flag = 1;
}

$pass1 = test_input($_POST['pass1']);
if(!preg_match("/^[a-zA-Z0-9+&@#\/%?=~_|!:,.;]*$/",$pass1)){
    $passerr = "Invalid password.";
    $flag = 1;
}

if(!preg_match("#[a-zA-Z]+#",$pass1)){
    $passerr = "Password must include atleast one letter.";
    $flag = 1;
}

if(!preg_match("#[0-9]+#",$pass1)){
    $passerr = "Password must include atleast one number.";
    $flag = 1;
}


$pass2 = test_input($_POST['pass2']);
if($pass1!=$pass2){
    $passerr = "Passwords don't match";
    $flag = 1;
}

if(strlen($pass1)<8){
    $passerr = "Password must be greator than 8 characters.";
    $flag = 1;
}

if($flag == 0){
   $path=$_SERVER['DOCUMENT_ROOT']; 
    include_once $path."/common/base.php";
    include_once $path."/inc/class.users.inc.php";
        $users = new bookingUsers($db);
        // echo ;
        if($users->createAccount()==TRUE){
            echo "<meta http-equiv='refresh' content='3; url=/main.php'>";
        $tmp="SignUp Successfull!!";
      }
      else{
       // $err ="Username already exists";
           // echo "<meta http-equiv='refresh' content='3; url=/signup.php'>";
            $nameerr = "Username or Email already exists";
      }
      unset($_POST['email']);
}
}
else{
   $nameerr = $emailerr = $passerr = "";
    $name = $email = $pass1 = $pass2 = "";
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/login.js"></script>
<link rel="stylesheet" href="css/login.css">

<div class="wrapper">
	<div class="container">
		<h1>SIGNUP</h1><br />
        All fields required.
		
		<form class="form" method="POST" acton="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<input type="text" placeholder="Username" required name="uname" value="<?php echo $name; ?>">
            <?php echo $nameerr; ?>
			<input type="text" placeholder="Email" required name="email" value="<?php echo $email; ?>">
            <?php echo $emailerr; ?>
			<input type="password" placeholder="Password" required name="pass1" value="<?php echo $pass1; ?>">
            <?php echo $passerr; ?>
			<input type="password" placeholder="Re-type Password" required name="pass2" value="<?php echo $pass2; ?>">
			<button type="submit" id="login-button">Signup</button>
		</form>
       Alredy have an account?<a href="www.google.com">Login here.</a>
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
  