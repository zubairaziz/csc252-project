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
$sql = "SELECT * FROM Users;";

$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0){
?>
<table class="table table-striped">
    <tr>
        <th>User ID</th>
        <th>E-mail</th>
        <th>Password</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>status</th>
    </tr>

    <?php
    while ($row= mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['userID'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo $row['firstName'] ?></td>
            <td><?php echo $row['lastName'] ?></td>
            <td><?php echo $row['status'] ?></td>        </tr>
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
