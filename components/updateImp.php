<?php
session_start();
include_once "./connectdb.php";
$userId = $_SESSION['id'];
$notesId = mysqli_real_escape_string($conn, $_POST['noteId']);
$imp = mysqli_real_escape_string($conn, $_POST['imp']);
if ($imp == 1) {
    $imp = false;
} else {
    $imp = true;
}
$sql2 = mysqli_query($conn, "UPDATE `$userTable` SET `imp` = '$imp' WHERE `sno` = $notesId");
if ($sql2) {
    echo "success";
}
