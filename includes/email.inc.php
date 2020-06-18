<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../PHPMailer/src/Exception.php';
  require '../PHPMailer/src/PHPMailer.php';
  require '../PHPMailer/src/SMTP.php';

  // Instantiation and passing true enables exceptions
  $mail = new PHPMailer(true);

  //Server settings
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host = 'mail.brucegan.net';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'admin@butterytablebakery.com';                  // SMTP username
      $mail->Password   = 'buttery9597!';                       // SMTP password
      $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above
      // $mail->From = $email;
      //Recipients
      $mail->setFrom('butterytablebakery@gmail.com', "ButteryTable");
      $mail->addAddress('butterytablebakery@gmail.com', 'Butterytable');     // Add a recipient
   
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $enquiry_subject;
      $mail->Body    = $message;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
?>