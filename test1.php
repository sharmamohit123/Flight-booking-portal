<?php
//$path = $_SERVER['DOCUMENT_ROOT'];
$to = "a.com";
$subject = "HTML email";

$message = "How are you!";

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

if(!$mail->Send()){
    echo "failure";
}
else{
    echo "success";
}
?>