<?php

include_once "connectdb.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirmPassword = mysqli_real_escape_string($conn, $_POST['cofirmPassword']);

if (!empty($name) && !empty($email) && !empty($password) && !empty($confirmPassword)) {
    if ($password == $confirmPassword) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // if email is valid
            $sql =  mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "This email already existe!";
            } else {
                $passhash = password_hash("$password", PASSWORD_DEFAULT);
                $sql2 = mysqli_query($conn, "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('{$name}', '{$email}', '{$passhash}')");
                if ($sql2) {
                    $id = mysqli_insert_id($conn);
                    $sql3 = "CREATE TABLE IF NOT EXISTS `user_$id` (
                        `sno` INT(8) NOT NULL AUTO_INCREMENT,
                        `title` VARCHAR(255) NOT NULL,
                        `description` TEXT NOT NULL,
                        `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        `imp` BOOLEAN NOT NULL DEFAULT 0,
                        PRIMARY KEY (`sno`)
                    )";
                    $result = mysqli_query($conn, $sql3);

                    if ($sql3) {
                        echo "success";
                    } else {
                        echo "Something went wrong";
                    }
                } else {
                    echo "Something went wrong";
                }
            }
        } else {
            echo "This is not a valid email";
        }
    } else {
        echo "Password doesnot Match";
    }
} else {
    echo "All the input fields are required!";
}
