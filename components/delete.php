<?php
session_start();
include_once "./connectdb.php";
$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = mysqli_query($conn, "DELETE FROM $userTable where `sno`= '$id'");
header("Location: ../note.php");
