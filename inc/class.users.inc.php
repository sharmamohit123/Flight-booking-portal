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
       // $u = trim($_POST['uname']);
        $v = sha1(time());
        $p1=MD5($this->test_input($_POST['pass1'])); 
        $p2=MD5($this->test_input($_POST['pass2']));

        if($p1!=$p2){
            //echo "<h2>Password do not match.</h2>";
            return;
        }
        $sql = "SELECT COUNT(Username) as theCount FROM User WHERE Username=:uname OR Email=:email";
        if($stmt = $this->_db->prepare($sql)){
            $stmt->bindParam(":uname",$u,PDO::PARAM_STR);
            $stmt->bindParam(":email",$e,PDO::PARAM_STR);
            $stmt->execute();
            $row = $stmt->fetch();
            if($row['theCount']!=0){
                $err = "Username or Email is already in use!";
                //echo $err;
                return;
            }
            if(!$this->sendVerificationEmail($e,$v)) {
                return;
            }
            //$stmt->closeCursor();
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

     private function sendVerificationEmail($email,$ver)
    {
      $to = $email;
$subject = "Account verfication";

$message = "Your account has been verified on myFlight.".$ver;

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->IsSmtp();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->IsHTML(false);
$mail->Username = "ms892075@gmail.com";
$mail->Password = "pranjaldon";
$mail->SetFrom("ms892075@gmail.com");
$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($to);
return $mail->send();

    }

    private function verify($ver){
        $code = $this->test_input($_POST['code']);
        if($code == $ver){
            return TRUE;
        }
        else{
            return False;
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

class populate{

    private $_db;

    public function __construct($db=NULL){

        if(is_object($db))
        {
            $this->_db = $db;
        }
        else{
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }

    public function showFlights(){
        
        $conn = $this->_db;
        $src = $this->test_input($_POST['source']);
        $dsn = $this->test_input($_POST['destination']);
        $date = $this->test_input($_POST['date']);

 /*        $sql = "INSERT INTO flights (brand, name, source, destination, date, timing)
    VALUES ('AIR INDIA', 'A3-149', 'JAIPUR', 'HYDERABAD', '2017-07-08', '17:35 HRS-19:03 HRS')";
    // use exec() because no results are returned
    $conn->exec($sql);*/

        $flights = $conn->prepare("SELECT * FROM flights WHERE source=:src AND destination=:dsn AND date=:date");
        $flights->bindParam(':src',$src,PDO::PARAM_STR);
        $flights->bindParam(':dsn',$dsn,PDO::PARAM_STR);
        $flights->bindParam(':date',$date,PDO::PARAM_STR);
        $flights->execute();
        //echo $flights->rowCount();
        $data = $flights->fetchAll();
        //echo $data;
      /*  foreach ($data as $row){
           // echo $src.$dsn.$date;
            //echo "Hello";
            echo $row['source'].$row['destination'];
        }*/
       /* echo $data[0]['name'];
        $name = "INDIGO";
        $filter = $conn->prepare("SELECT * FROM $data WHERE name=:name");
        $filter->bindParam(':name',$name,PDO::PARAM_STR);
        $filter->execute();
        $new = $filter->fetchAll();*/
        return $data;

    }

     public function getFlight(){
        
        $conn = $this->_db;
        $id = $this->test_input($_POST['flight']);

 /*        $sql = "INSERT INTO flights (brand, name, source, destination, date, timing)
    VALUES ('AIR INDIA', 'A3-149', 'JAIPUR', 'HYDERABAD', '2017-07-08', '17:35 HRS-19:03 HRS')";
    // use exec() because no results are returned
    $conn->exec($sql);*/

        $flights = $conn->prepare("SELECT * FROM flights WHERE flightId=:id");
        $flights->bindParam(':id',$id,PDO::PARAM_STR);
        $flights->execute();
       // echo $flights->rowCount();
        $data = $flights->fetchAll();
        //echo $data['source'];
        return $data[0];
     }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>

