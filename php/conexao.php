<?php
$servername = "localhost";
$username = "root";
$password = "root";
$banco = "agenda";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $banco);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>