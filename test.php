 <?php

 define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'myDPDO');
  
try {
   $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
        $conn = new PDO($dsn, DB_USER, DB_PASS);
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
    VALUES ('mohit', 'Doe', 'john@example.com')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo "error.";
    }

$conn = null;
?> 