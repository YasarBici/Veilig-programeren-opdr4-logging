<?php

    include "db.php";

    $email = $_POST['email'];
    $password = $_POST['password'];

    $ip = $_SERVER['REMOTE_ADDR'];

    $logfile = "login_info.log";
    $fh = fopen($logfile, "a") or die("Could not open log file.");

    $myConn = new DB;

    $check = "SELECT * FROM user WHERE `email`='$email' and `password`='$password'";
    

    $result = $myConn->executeSQL($check);


    if (isset($_POST['login']) && !empty($email) 
    && !empty($password)) {

        if (!empty($result)) { 
            echo "<br> Login as $email <br>";
            echo "<br> This was a valid login attempt <br>";
            fwrite($fh, date("d-m-Y, H:i")." - $ip"." - $email"." Succefully logged in.\n") or die("Could not write file!");
            fclose($fh);
        } else {
            echo "<br> Invalid login! <br>";
            fwrite($fh, date("d-m-Y, H:i")." - $ip"." - $email"." Failed to log in.\n") or die("Could not write file!");
            fclose($fh);
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Enter Email and Password</h2>

    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

</body>
</html>
