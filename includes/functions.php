<?php

require_once "db.php";

function createTable($name, $query)
{
    mysqli_query($connect, "CREATE TABLE IF NOT EXISTS $name($query)");
}

function sanitizeString($var)
{
    global $connect;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connect->real_escape_string($var);
}

function check_cookie()
{
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
}

function authenticate()
{
    if (!isset($_SESSION['email'])) {
        session_start();
    }
    if (!isset($_SESSION['email'])) {
        header("Location: login.php");
    }
}

function redirect()
{
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        header('Location: index.php');
    }
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        header('Location: index.php');
    }
}

function destroySession()
{
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();
    //deleting cookies
    setcookie("email", "", time() - 1, "/");
    setcookie("password", "", time() - 1, "/");
    header("Location: ../login.php");
}
