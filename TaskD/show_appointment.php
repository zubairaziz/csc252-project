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

require_once('setupdb.php'); // **

//Query
$sql = "SELECT * FROM Appointment;";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0){
?>
<table class="table table-striped">
    <tr>
        <th>Professor ID</th>
        <th>Student ID</th>
        <th>date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Appointment ID</th>
        <th>Purpose</th>
        <th>Status</th>
    </tr>

    <?php
    while ($row= mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['professorID'] ?></td>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['starts'] ?></td>
            <td><?php echo $row['ends'] ?></td>
            <td><?php echo $row['apptID'] ?></td>
            <td><?php echo $row['purpose'] ?></td>
            <td><?php echo $row['status'] ?></td>        
        </tr>
        <?php
    }
    }else {
        echo "<p>Item not found.</p>";
    }
?>

</table>

<?php
$conn->close();
?>

</body>
</html>