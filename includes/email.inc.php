<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  // Instantiation and passing true enables exceptions
  $mail = new PHPMailer(true);

  try
  {
  //Server settings
      $mail->IsSMTP(); // telling the class to use SMTP
      $mail->Host = 'mail.brucegan.net';                    // Set the SMTP server to send through
      $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'demo@brucegan.net';                  // SMTP username
      $mail->Password   = 'Firaga12345!';                       // SMTP password
      $mail->SMTPSecure = 'ssl';        // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for PHPMailer::ENCRYPTION_SMTPS above

      //Recipients
      $mail->setFrom('demo@brucegan.net', 'Hello, this is a test');
      $mail->addAddress('ghuijie95@gmail.com', 'Hui Jie');     // Add a recipient
   

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the subject';
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();

    echo 'Message has been sent';
  }
  catch(Exception $e)
  {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }

?>