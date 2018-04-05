<?php

$servername = "localhost";
$username = "gnaven";
$password = "Scooternut1";
$db_name = "gnaven_1";

$conn =  new mysqli($servername, $username, $password, $db_name);

if ($conn -> connect_error){
    die ("Connection_falied: " . $conn->connect_error);
}

?>
