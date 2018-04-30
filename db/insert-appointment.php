<?php
require_once "dbaccess.php";
$sql = "INSERT INTO appointment(professorID, studentID, date, starts, ends, purpose)
VALUES('" . $_POST["professorID"] . "', '" . $_POST["studentID"] . "', '" . $_POST["date"] . "', '" . $_POST["starts"] . "', '" . $_POST["ends"] . "', '" . $_POST["purpose"] . "')";
if (mysqli_query($connect, $sql)) {
    echo 'Appointment Added';
}
