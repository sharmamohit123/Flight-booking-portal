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
               // $_SESSION['Email'] = htmlentities($this->test_input($_POST['email']), ENT_QUOTES);
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

    public function getUser(){
        
        $conn = $this->_db;
        $user = $this->test_input($_SESSION['Username']);

 /*        $sql = "INSERT INTO flights (brand, name, source, destination, date, timing)
    VALUES ('AIR INDIA', 'A3-149', 'JAIPUR', 'HYDERABAD', '2017-07-08', '17:35 HRS-19:03 HRS')";
    // use exec() because no results are returned
    $conn->exec($sql);*/

        $flights = $conn->prepare("SELECT * FROM User WHERE Username=:name");
        $flights->bindParam(':name',$user,PDO::PARAM_STR);
        $flights->execute();
       // echo $flights->rowCount();
        $data = $flights->fetchAll();
        //echo $data['source'];
        return $data[0];
     }

     public function changeEmail(){
         $conn = $this->_db;
         $p = $this->test_input($_POST['pass']);
         $e2 = $this->test_input($_POST['new']);
         $n = $this->test_input($_SESSION['Username']);
        $stmt = "SELECT COUNT(Username) as theCount FROM User WHERE email=:email";
        $num = $conn->prepare($stmt);
        $num->bindParam(':email',$e2,PDO::PARAM_STR);
        $num->execute();
        $num1 = $num->fetch();
        if($num1['theCount']==0){
         
         $sql = "UPDATE User SET email=:newemail WHERE Username=:name AND Password=MD5(:pass)";

         if($change = $conn->prepare($sql)){
         $change->bindParam(':newemail',$e2,PDO::PARAM_STR);
         $change->bindParam(':name',$n,PDO::PARAM_STR);
         $change->bindParam(':pass',$p,PDO::PARAM_STR);
         $change->execute();
         if($change->rowCount()==1){
         return TRUE;
         }
         else{
             return FALSE;
         }
         }
         else {
             return FALSE;
         }
        }
        else{
            return FALSE;
        }
     }

     public function changePass(){
         $conn = $this->_db;
         $op = $this->test_input($_POST['old']);
         $np1 = $this->test_input($_POST['new1']);
         $np2 = $this->test_input($_POST['new2']);
         $name = $this->test_input($_SESSION['Username']);
         if($sql = $conn->prepare("UPDATE User SET Password=MD5(:pass) WHERE Username=:name AND Password=MD5(:pass1)")){
             $sql->bindParam(':pass',$np1,PDO::PARAM_STR);
             $sql->bindParam(':name',$name,PDO::PARAM_STR);
             $sql->bindParam(':pass1',$op,PDO::PARAM_STR);
             $sql->execute();
             if($sql->rowCount()==1){
             return TRUE;
             }
             else{
                 return FALSE;
             }

         }
         else{
             return FALSE;
         }
     }

     public function deleteAccount(){
         $conn = $this->_db;
        // $op = $this->test_input($_POST['old']);
         $np1 = $this->test_input($_POST['pass']);
         //$np2 = $this->test_input($_POST['new2']);
         $name = $this->test_input($_SESSION['Username']);
         echo "yo";
         if($sql = $conn->prepare("DELETE FROM User WHERE Username=:name AND Password=MD5(:pass)")){
             echo "yo";
             $sql->bindParam(':name',$name,PDO::PARAM_STR);
             $sql->bindParam(':pass',$np1,PDO::PARAM_STR);
             //$sql->bindParam(':pass1',$op,PDO::PARAM_STR);
             $sql->execute();
             echo $sql->rowCount();
             if($sql->rowCount()==1){
             return TRUE;
             }
             else{
                 return FALSE;
             }

         }
         else{
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

     public function change_date(){

         $conn = $this->_db;
         $sql = "SELECT * from flights";
         $new = $conn->prepare($sql);
         $new->execute();
         $n = $new->rowCount();
         //echo $n;
         $data = $new->fetchAll();
         for($x=0; $x<$n ;$x++){
             //$row['date'] = strtotime("+1 days", $row['date']);
             //$dt = $row['date'];
             $stmt = $conn->prepare("UPDATE flights SET date=:dt WHERE flightId=:id");
             $dt = strtotime($data[$x]['date']);
             $y = date('Y', $dt);
             $m = date('m', $dt);
             $d = date('d', $dt)+1;
             //echo $y.$m.$d;
             $data[$x]['date'] = mktime(0, 0 , 0, $m, $d, $y);
             $ds = date('Y-m-d',$data[$x]['date']);
             $id = $x+1;
             $stmt->bindParam(':dt',$ds,PDO::PARAM_STR);
             $stmt->bindParam(':id',$id,PDO::PARAM_STR);
             $stmt->execute();
         }
         //echo date('Y/m/d',$data[0]['date']);
     }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>

