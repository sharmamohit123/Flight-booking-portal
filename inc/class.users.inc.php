<?php

class bookingUsers{

    private $_db;

    public function __construct($db=NULL)
    {
        if(is_object($db)){
            $this->_db = $db;
        }
        else{
             $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }

    public function createAccount()
    {
        $u=$this->test_input($_POST['uname']);
        $e=$this->test_input($_POST['email']);
        $p1=MD5($this->test_input($_POST['pass1'])); 
        $p2=MD5($this->test_input($_POST['pass2']));

        if($p1!=$p2){
            echo "<h2>Password do not match.</h2>";
            return;
        }
        $sql = "SELECT COUNT(Username) as theCount FROM User WHERE Username=:uname OR Email=:email";
        if($stmt = $this->_db->prepare($sql)){
            $stmt->bindParam(":uname",$u,PDO::PARAM_STR);
            $stmt->bindParam(":email",$e,PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if($row['theCount']!=0){
                $err = "Sorry, Username or Email is already in use!";
                //echo $err;
                return;
            }
        }

        $sql = "INSERT INTO User(Username, Password, Email)
                VALUES(:uname,:pass, :email)";
        if($stmt = $this->_db->prepare($sql)){
            $stmt->bindParam(":uname",$u, PDO::PARAM_STR);
            $stmt->bindParam(":pass",$p1, PDO::PARAM_STR);
            $stmt->bindParam(":email",$e, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
          //  echo "yo";
            return TRUE;
        }
        else{
             echo "<h2> Error </h2><p> Couldn't insert the "
                . "user information into the database. </p>";
				// include_once $path."/common/footer.php";
				// echo "<meta http-equiv='refresh' content='3; url=/main.php'>";
				return;
        }
    }

    public function accountLogin()
    {
        $sql = "SELECT * FROM User WHERE Username=:uname AND Password=MD5(:psw) LIMIT 1";

        try{
            $u = $this->test_input($_POST['uname']);
            $p = $this->test_input($_POST['pass']);
            $stmt = $this->_db->prepare($sql);
            $stmt->bindParam(":uname",$u, PDO::PARAM_STR);
            $stmt->bindParam(":psw",$p, PDO::PARAM_STR);
            $stmt->execute(); 

            if($stmt->rowCount()==1){
                $_SESSION['Username'] = htmlentities($this->test_input($_POST['uname']), ENT_QUOTES);
                $_SESSION['LoggedIn'] = 1;
                return TRUE; 
            }

            else{
                return FALSE;
            }   
        }
        catch(PDOException $e){
            return FALSE;
        }
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}