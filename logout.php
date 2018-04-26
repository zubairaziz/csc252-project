<?php

session_start();
$_SESSION = array();
session_unset();
session_destroy();
//deleting cookies
setcookie("email", "", time() - 1, "/");
setcookie("password", "", time() - 1, "/");
//Redirect to login
header("Location: login.php");
