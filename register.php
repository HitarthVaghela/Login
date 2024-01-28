<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>

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
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'infiniteai127@gmail.com';
        $mail->Password   = 'fmde rztn wbgp vsme';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
    
        $mail->setFrom('infiniteai127@gmail.com', 'InfiniteAI');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Confirmation Mail';
        $mail->Body    = 'Thank you for Registering into our Website';
    
        $mail->send();
        // echo 'Message has been sent';
    } 
    catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
    <div class="container">
        <div class="box form-box">
            <?php
                include ("configure.php");
                if(isset($_POST['submit']))
                {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $password = $_POST['password'];
                    $verify_query = mysqli_query($conn,"SELECT email FROM details WHERE email= '$email'");
                    if(mysqli_num_rows($verify_query) !=0 ){
                        echo "<div class='message'>
                                    <p>User already exists!</p>
                              </div> <br>";
                        header("Location: login.php");    
                    }
                    else{
                        $query="INSERT INTO `details` (`username`,`email`,`phone`,`password`) VALUES('$username','$email','$phone','$password')";
                        mysqli_query($conn,$query);
                        sendMail($_POST['email']);
                        echo "<div class='message'>
                                    <p>Registration was successful!</p>
                              </div> <br>";
                        header("Location: login.php");    
                    }
                }
                else{
                ?>
                <header>Register</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="field input">
                        <label for="phone">Phone No.</label>
                        <input type="text" name="phone" id="phone" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Sign In">
                    </div>

                    <div class="links">
                        Already registered? <a href="login.php">Login Now</a>
                    </div>
                </form>
            </div>
        <?php }?>
    </div>
</body>
</html>