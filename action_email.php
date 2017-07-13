<?php
$path=$_SERVER['DOCUMENT_ROOT']; 
$pageTitle = "MY ACCOUNT";
//session_start();
//include_once $path.'/common/header.php';
?>
<?php include_once $path.'/my_account.php';?>
<?php
$emailerr = "";

if($_SERVER['REQUEST_METHOD']=="POST"){
    //$emailerr= ""; 

    $flag = 0;


$email = test_input($_POST['new']);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    ?>
    <style>
        #id01{
            display: block;
        }
    </style>
      <script>
              document.getElementById('err').innerHTML = "Invalid email format!";
        </script>

<?php
    $emailerr = "Invalid email format.";
    $flag = 1;
}


if($flag == 0){
   //$path=$_SERVER['DOCUMENT_ROOT']; 
    include_once $path."/common/base.php";
    include_once $path."/inc/class.users.inc.php";
        $users = new bookingUsers($db);
        // echo ;
        if($users->changeEmail()==TRUE){
            echo "<meta http-equiv='refresh' content='3; url=/my_account.php'>";
        $tmp="SignUp Successfull!!";
            //echo $tmp;
      }
      else{
       // $err ="Username already exists";
           // echo "<meta http-equiv='refresh' content='3; url=/signup.php'>";
           // $nameerr = $users->createAccount();
           $emailerr = "Error updating email address!";
         // echo $users->changeEmail();
          ?>
          <script>
              document.getElementById('err').innerHTML = "Error updating email address!";
        </script>
           <style>
        #id01{
            display: block;
        }
    </style> 
         <?php
      }
      //unset($_POST['pass']);
      //unset($_POST['new']);
}
}
else{
   $emailerr = "";
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

 
