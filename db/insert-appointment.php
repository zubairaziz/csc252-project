<?php
require_once "dbaccess.php";

$professorID = $_POST["professorID"];
$studentID = $_POST["studentID"];
$date = $_POST["date"];
$starts = $_POST["starts"];
$ends = $_POST["ends"];
$purpose = $_POST["purpose"];

$sql = "INSERT INTO appointment(professorID, studentID, date, starts, ends, purpose)
VALUES('$professorID', '$studentID', '$date', '$starts ', '$ends', '$purpose')";
if (mysqli_query($connect, $sql)) {
    echo 'Appointment Added';
}
