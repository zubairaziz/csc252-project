<!DOCTYPE html>
<html>
<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

require_once('includes/db.php'); 
if(!isset($_SESSION)) { session_start(); } 
$profID = $_SESSION['userID'];
//Query
$sql = "SELECT * FROM appointment a, users u WHERE a.professorID = $profID and a.studentID=u.userID;";
$result = mysqli_query($connect, $sql);

?>
<h3>Your Dashboard</h3>
<a href="?view=professor-availability">Add your availabilities</a>
<div class="dashboard">
    <div id=#item1>
        <h4>Curent Appointments: </h4>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Purpose</th>
                <th>Status</th>
            </tr>
            <?php
                while ($row= mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['firstName'] ?> </td>
                <td><?php echo $row['lastName'] ?> </td>
                <td><?php echo $row['date'] ?></td>
                <td><?php echo $row['starts'] ?> </td>
                <td><?php echo $row['ends'] ?> </td>
                <td><?php echo $row['purpose'] ?> </td>
                <td><?php echo $row['status'] ?> </td>
            </tr>
            <?php
            } 
            ?>
        </table>
    </div>
    <div id=#item2>
        <h4>Today: </h4>
        <ul>
            <li>Student: </li>
            <li>Date: </li>
            <li>Start Time: </li>
            <li>End Time: </li>
            <li>Purpose: </li>
            <li>Status: </li>
        </ul>
    </div>
</div>
