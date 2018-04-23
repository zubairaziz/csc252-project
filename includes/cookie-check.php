<?php

//if the cookie is set, use those values to login!
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    if (!isset($_SESSION)) {
        session_start();
    }
    //using cookies to set the session variables!
    $email = $_SESSION['email'] = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    $query = "SELECT * FROM Users WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($connect, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $profile = mysqli_fetch_assoc($result);
        $_SESSION['userID'] = $profile['userID'];
        $_SESSION['firstName'] = $profile['firstName'];
        $_SESSION['lastName'] = $profile['lastName'];
        $_SESSION['status'] = $profile['status'];
    }
}
