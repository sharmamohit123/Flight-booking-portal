hello;
<?php

    if($_SERVER['REQUEST_METHOD']=='POST'){
        echo $_POST['flight'].$_POST['user'].$_POST['amount'];
    }
?>