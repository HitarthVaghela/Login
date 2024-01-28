<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript">
        function preventBack(){window.history.forward()};
        setTimeout("preventBack()",0);
        window.onunload=function(){null;}
    </script>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php
                include ("configure.php");
                if(isset($_POST['submit']))
                {
                    session_start();
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $result = mysqli_query($conn,"SELECT * FROM details WHERE username='$username' AND password='$password' ");
                    $row = mysqli_fetch_assoc($result);
                    if(is_array($row) && !empty($row)){
                        // $data = mysqli_fetch_array($result);
                        // $name = $data['username'];
                        $_SESSION['uname'] = $_POST['username'];
                        header("Location: welcome.php");
                    }
                    else{
                        echo "<div class='message'>
                                <p>Wrong Username or Password </p>
                                </div> <br>";
                        header("Location: login.php");    
                    }
                }
                else{
                ?>
                <header>Login</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="links">
                        Don't have account yet? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>