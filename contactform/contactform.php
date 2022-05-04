<?php
   use PHPMailer\PHPMailer\PHPMailer;

   if(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){
       $email = $_POST['email'];
       $subject = $_POST['subject'];
       $message = $_POST['message'];
       $name = $_POST['name'];

       require_once "PHPMailer/PHPMailer.php";
       require_once "PHPMailer/SMTP.php";
       require_once "PHPMailer/Exception.php";

       $mail = new PHPMailer();
       
       $mail->isSMTP();                                      // Set mailer to use SMTP
       $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
       $mail->Username = 'mv.sigauke@gmail.com';                 // SMTP username
       $mail->Password = '';                           // SMTP password
       $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
       $mail->Port = 587;  

       $mail->isHTML(true); 
       $mail->setFrom($email, $name);
       $mail->addAddress('mv.sigauke@gmail.com', 'Alice contractors'); 
       $mail->Subject = $subject;
       $mail->Body    =  $message; 

       if(!$mail->send()) {
         $status = 'failed';
         $response = 'Message could not be sent, Internal server error.';
       } else {
         $status = 'success';
         $response = 'Message has been sent.';
       }
       echo $response;
   }
?>