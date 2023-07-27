<?php
session_start();
$userId = $_SESSION['id'];
include_once "./connectdb.php";
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = mysqli_query($conn, "DELETE FROM user_$userId where `sno`= '$id'");
header("Location: ../note.php");
