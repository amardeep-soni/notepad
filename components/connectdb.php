<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notepad";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $userTable = "user_${id}";
}
$conn = mysqli_connect($servername, $username, $password, $dbname);
