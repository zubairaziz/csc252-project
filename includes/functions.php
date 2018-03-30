<?php

require "/includes/db.php";

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
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        if (!isset($_SESSION)) {
            session_start();
        }
        //using cookies to set the session variables!
        $username = $_SESSION['username'] = $_COOKIE['username'];
        $password = $_COOKIE['password'];

        $query = "SELECT * FROM Users WHERE username='$username' and password = '$password'";

        $result = mysqli_query($connect, $query) or die(mysqli_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $profile = mysqli_fetch_assoc($result);
            $_SESSION['firstname'] = $profile['firstname'];
            $_SESSION['lastname'] = $profile['lastname'];
            $_SESSION['email'] = $profile['email'];
        }
    }
}

function redirect()
{
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        header('Location: index.php');
    }
    if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
        header('Location: index.php');
    }
}
