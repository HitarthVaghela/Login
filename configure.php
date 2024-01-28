<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "hitarth";

$conn = mysqli_connect($servername, $username, $password ,$database);

if(!$conn)
{
    die("Sorry we fail to connect");
}
?>