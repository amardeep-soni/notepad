<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    $location = "login";
    $user = "!";
} else {
    $location = "welcome";
    $user = ", ".$_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amardeep Notepad</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="index">
    <div id="background"></div>
    <div id="main">
        <p class="text">Hi<?php echo $user ?></p>
        <p class="text">Welcome to Amardeep Notepad</p>
        <div id="btn">
            <a href="<?php echo $location; ?>.php">Get Started</a>
        </div>
    </div>
</body>

</html>