<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "MY ACCOUNT";
//session_start();
//include_once $path.'/common/header.php';
?>
<?php include_once $path.'/my_account.php';?>
<?php
$passerr = "";

if($_SERVER['REQUEST_METHOD']=="POST"){ 

    $flag = 0;


$pass1 = test_input($_POST['new1']);
if(!preg_match("/^[a-zA-Z0-9+&@#\/%?=~_|!:,.;]*$/",$pass1)){
        ?>
<style>
    #id03{
        display: block;
    }
</style>
<script>
    document.getElementById('err1').innerHTML = "Invalid password!";
</script>

<?php
    $passerr = "Invalid password.";
    $flag = 1;
}

if(!preg_match("#[a-zA-Z]+#",$pass1)){
        ?>
<style>
    #id03{
        display: block;
    }
</style>
<script>
    document.getElementById('err1').innerHTML = "Password must include atleast one letter!";
</script>
<?php
   $passerr = "Password must include atleast one letter.";
    $flag = 1;
}

if(!preg_match("#[0-9]+#",$pass1)){
            ?>
<style>
    #id03{
        display: block;
    }
</style>
<script>
    document.getElementById('err1').innerHTML = "Password must include atleast one number!";
</script>
<?php
   $passerr = "Password must include atleast one number.";
    $flag = 1;
}


$pass2 = test_input($_POST['new2']);
if($pass1!=$pass2){
            ?>
<style>
    #id03{
        display: block;
    }
</style>
<script>
    document.getElementById('err1').innerHTML = "Passwords don't match!";
</script>
<?php
    $passerr = "Passwords don't match";
    $flag = 1;
}

if(strlen($pass1)<8){
            ?>
<style>
    #id03{
        display: block;
    }
</style>
<script>
    document.getElementById('err1').innerHTML = "Password must be greator than 8 characters!";
</script>
<?php
    $passerr = "Password must be greator than 8 characters.";
    $flag = 1;
}


if($flag == 0){
   //$path=$_SERVER['DOCUMENT_ROOT']; 
    include_once $path."/common/base.php";
    include_once $path."/inc/class.users.inc.php";
        $users = new bookingUsers($db);
        // echo ;
        if($users->changePass()==TRUE){
            echo "<meta http-equiv='refresh' content='3; url=/my_account.php'>";
        $tmp="SignUp Successfull!!";
            //echo $tmp;
      }
      else{
       // $err ="Username already exists";
           // echo "<meta http-equiv='refresh' content='3; url=/signup.php'>";
           // $err = "Error updating email address!";
          // echo "Email already in use!";
          $passerr = "Error updating password"
          ?>
          <style>
        #id03{
        display: block;
    }
    </style>
    <script>
    document.getElementById('err1').innerHTML = "Error updating password";
    </script>
            <?php
      }
     // unset($_POST['email']);
}
}
else{
   $passerr = "";
 }
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>