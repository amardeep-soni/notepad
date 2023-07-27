<?php

include_once "./connectdb.php";
session_start();
$userId = isset($_SESSION['id']);
$notesId = mysqli_real_escape_string($conn, $_POST['noteId']);
$imp = mysqli_real_escape_string($conn, $_POST['imp']);
if ($imp == 1) {
    $imp = false;
} else {
    $imp = true;
}
$sql2 = mysqli_query($conn, "UPDATE `user_{$userId}` SET `imp` = '$imp' WHERE `sno` = $notesId");
if ($sql2) {
    echo "success";
}
