<?php
$loginStatus = true;
$currentPage = "welcome";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:login.php");
    exit;
} else {
    $user = $_SESSION['username'];
    include 'components/connectdb.php';
    $sql = "CREATE TABLE IF NOT EXISTS `user_$user` (`sno` INT(8) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `description` TEXT NOT NULL , PRIMARY KEY (`sno`))";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Notepad --> Welcome</title>
</head>

<body>
    <!-- narbar -->
    <?php
    include 'components/nav.php';
    ?>

    <h1>Welcome <?php echo $_SESSION['username']; ?></h1>

    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>