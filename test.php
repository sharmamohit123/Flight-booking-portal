 <?php

 define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'myDBPDO');
  
try {
   $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $conn = new PDO($dsn, DB_USER, DB_PASS);
    $sql = "SELECT * form MyGuests";
    // use exec() because no results are returned
    //$last = 'Doe';
    //$data = $conn->prepare($sql);
    //$data->bindParam(':last',$last,PDO::PARAM_STR);
    $conn->execute($sql);
    echo $conn->rowCount();
    $row = $conn->fetchAll();
    //echo "New record created successfully";
    foreach ($row as $me){
        echo $me['firstname'];
    }
    }
catch(PDOException $e)
    {
    echo "error.";
    }

    $os = array("Mac", "NT", "Irix", "Linux");
    //echo $os[0];
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
if (in_array("mac", $os)) {
    echo "Got mac";
}

$conn = null;
?> 