<?php
include 'database.php';
require 'PHPMailerAutoload.php';
$mail = new PHPMailer(true);
try {
   $email = $_GET['mail'];
   $emailcheck = mysqli_query($conn, "SELECT * FROM `login` WHERE `email` = '".$email."' ");
   $check=mysqli_num_rows($emailcheck);
   
   if ($check >0) { 
      $path = mysqli_fetch_array($emailcheck);
      try {
         //Server settings
         $mail->SMTPDebug = 0; // 0 - Disable Debugging, 2 - Responses received from the server
         $mail->isSMTP(); // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
         $mail->SMTPAuth = true; // Enable SMTP authentication
         $mail->Username = 'pythonprojectmail@gmail.com'; // SMTP username
         $mail->Password = 'python#2020'; // SMTP password
         $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS; Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
         $mail->Port = 587; // TCP port to connect to
      
         //Recipients
         $mail->setFrom('pythonprojectmail@gmail.com', 'Antique Oyster');
         $mail->addAddress($email, $path["fname"]); // Add a recipient
      
         // Content
         $mail->isHTML(true); // Set email format to HTML
         $mail->Subject = 'Rest Password';
         $mail->Body = 'Hii '.$path["fname"].' '.$path["lname"].'!!'.' <br/>Click on the link below to reset your password<br/><a href="localhost/antiqueoyster/modal/resetcust.php">RESET PASSWORD</a>';
         $mail->AltBody = 'A test email from makitweb.com'; // Plain text for non-HTML mail clients
      
         // Attachement 
      //    $mail->addAttachment('upload/file.pdf');
      //    $mail->addAttachment('upload/image.png', 'image 1');    // Optional name
      //    $mail->send();
         if($mail->send()){$response['status']="A link to reset your password has been sent on your email address.";}
         else{$response['status']="An account on this email doesn't exist. catch";}
      } catch (Exception $e) {
         $response['status']="An account on this email doesn't exist.";
      }
   }
   else{
      $response['status']="An account on this email doesn't exist.";
   }


} catch (\Throwable $th) {
   //
}
echo json_encode($response);
?>
