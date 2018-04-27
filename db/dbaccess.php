<?php

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'proj1');

define('DB_PASSWORD', 'proj1');

define('DB_NAME', 'proj1');


/* Attempt to connect to MySQL database */
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
