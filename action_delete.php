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

    $flag = 0;




if($flag == 0){
   //$path=$_SERVER['DOCUMENT_ROOT']; 
    include_once $path."/common/base.php";
    include_once $path."/inc/class.users.inc.php";
        $users = new bookingUsers($db);
        // echo ;
        if($users->deleteAccount()==TRUE){
            echo "<meta http-equiv='refresh' content='3; url=/logout.php'>";
            ?>
            <script>
                alert('Account successfully deleted!');
            </script>
            <?php
        $tmp="SignUp Successfull!!";
            //echo $tmp;
      }
      else{
       // $err ="Username already exists";
           // echo "<meta http-equiv='refresh' content='3; url=/signup.php'>";
           // $nameerr = $users->createAccount();
           $emailerr = "Error updating email address!";
          // echo "Email already in use!";
          ?>
          <script>
              document.getElementById('err2').innerHTML="Error deleting account!";
              </script>
              <style>
                  #id05{
                      display: block;
                  }
                </style>
            <?php
      }
     // unset($_POST['email']);
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