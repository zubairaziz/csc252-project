<?php
require_once "db.php";
$sql = "INSERT INTO appointment(professorID, studentID, date, starts, ends, purpose)
VALUES('" . $_POST["name"] . "', '" . $_POST["email"] . $_POST["frequency"] . "', '" . $_POST["favorite"] . "')";
if (mysqli_query($connect, $sql)) {
    echo 'Data Inserted';
}
