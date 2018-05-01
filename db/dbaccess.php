<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'zabaziz');
define('DB_PASSWORD', 'proj1');
define('DB_NAME', 'zabaziz_1');

/* Attempt to connect to MySQL database */
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
