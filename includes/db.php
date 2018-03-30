<?php

$db_host = "localhost"; // Host name
$db_username = "proj1"; // Mysql username
$db_password = "proj1"; // Mysql password
$db_name = "proj1"; // Database name

$connect = new mysqli($db_host, $db_username, $db_password, $db_name);

if (!$connect) {
    die("Database Connection Failed" . mysqli_error());
}
