<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'zabaziz');
define('DB_PASSWORD', 'proj1');
define('DB_NAME', 'zabaziz_1');

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connect) {
    die("ERROR: Database connection failed. " . $connect->connect_error);
}
