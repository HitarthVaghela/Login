<?php 

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendMail($email)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'emailsender2727@gmail.com';                     //SMTP username
        $mail->Password   = 'ptlauqkvljrxlbct';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('emailsender2727@gmail.com', 'Thank you for registratoin');
        $mail->addAddress('$email');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Subject Line';
        $mail->Body    = 'BOdy Content';

        $mail->send();
        echo 'Message has been sent';
        // return true;
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        // return false;
    }
}

?>
