<?php
 
    session_start();
 
    unset($_SESSION['LoggedIn']);
    unset($_SESSION['Username']);
 
?>
 
<meta http-equiv="refresh" content="0;main.php">
<script>
    alert('You are successfully logged out');
</script>