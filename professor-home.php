<?php

require_once 'includes/db.php';
if (!isset($_SESSION)) {session_start();}
$profID = $_SESSION['userID'];
//Query
$sql = "SELECT * FROM appointment a, users u WHERE a.professorID = $profID and a.studentID=u.userID;";
//gets appointments for professor
$resultapp = mysqli_query($connect, $sql);

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
while ($row = mysqli_fetch_assoc($resultapp)) {
    ?>
                    <tr>
                        <td>
                            <?php echo $row['firstName'] ?> </td>
                        <td>
                            <?php echo $row['lastName'] ?> </td>
                        <td>
                            <?php echo $row['date'] ?>
                        </td>
                        <td>
                            <?php echo $row['starts'] ?> </td>
                        <td>
                            <?php echo $row['ends'] ?> </td>
                        <td>
                            <?php echo $row['purpose'] ?> </td>
                        <td>
                            <?php echo $row['status'] ?> </td>
                    </tr>
                    <?php
}
?>

<?php
$date = date('Y-m-d');
$date = (string)$date;
//getting appointments for today
require_once 'includes/db.php';
if (!isset($_SESSION)) {session_start();}
$profID = $_SESSION['userID'];
//Query
$sqltoday = "SELECT * FROM appointment a, users u WHERE a.professorID = $profID and a.studentID=u.userID and date= '$date';";
$resulttoday = mysqli_query($connect, $sqltoday);

?>
   
            </table>
        </div>
        <div id=#item2>
            <h4>Today: <?php echo $date ?></h4>
        <?php 
       // if($resulttoday->num_rows > 0){
            while ($row = mysqli_fetch_assoc($resulttoday)) {
        ?>
            <ul>
                <li>First Name : <?php echo $row['firstName']; ?> </li>
                <li>Last Name : <?php echo $row['lastName']; ?> </li>
                <li>Start Time:<?php echo $row['starts']; ?> </li>
                <li>End Time:<?php echo $row['ends']; ?>  </li>
                <li>Purpose: <?php echo $row['purpose']; ?> </li>
                <li>Status:<?php echo $row['status']; ?> </li>
            </ul>
    <?php }
        //} else {
          //  echo "You have no appointments today !";
        //}
     ?>        
        </div>
    </div>