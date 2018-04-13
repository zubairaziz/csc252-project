<?php

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'proj1');

define('DB_PASSWORD', 'proj1');

define('DB_NAME', 'proj1');

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$connect) {
    die("ERROR: Database connection failed. " . $mysqli->connect_error);
}
