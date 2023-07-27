<?php
session_start();
include_once "./connectdb.php";
$userId = $_SESSION['id'];
$notesId = mysqli_real_escape_string($conn, $_POST['id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$desc = mysqli_real_escape_string($conn, $_POST['desc']);
if (isset($_POST['imp'])) {
    $imp = true;
} else {
    $imp = false;
}
if (!empty($title) && !empty($desc)) {
    if ($notesId) {
        // update
        $sql2 = mysqli_query($conn, "UPDATE `$userTable` SET `title` = '$title', `description` = '$desc', `imp` = '$imp' WHERE `sno` = $notesId");
    } else {
        // add
        $sql2 = mysqli_query($conn, "INSERT INTO `$userTable` (`title`, `description`, `imp`) VALUES ('$title', '$desc', '$imp')");
    }
    header("Location: ../note.php");
} else {
    echo "Please Fill all Fields";
}
