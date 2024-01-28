<?php
session_start();
if(!empty($_SESSION['uname'])){
    // header('Location: login.php');
    $name1 = $_SESSION['uname'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="logout.php">
            <?php echo "Welcome<br>" . $name1; ?>
            <input type="submit" class="btn" name="submit" value="Logout">
        </form>
    </body>
    </html>
    <?php
}
else{
    echo "Please Login First";
}
?>