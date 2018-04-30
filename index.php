<?php

$title = "Home";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
require_once 'includes/head.php';

$date = date('Y-m-d');
$email = $_SESSION['email'];
$userID = $_SESSION['userID'];

?>

    <body>

        <?php

require 'components/navbar.php';

?>

            <div class="container">

                <h2>Welcome
                    <?php echo $_SESSION['firstName'] ?>
                </h2>

                <?php

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    echo "<p>Go to your <a href='professor-home.php'>Dashboard</a></p>";
    echo "<p><a href='professor-availability.php'>Add your availabilities</a></p>";
    $query = "SELECT * FROM Appointment WHERE professorID = '$userID' AND date = '$date' ";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "
            <h4>Today's appointments: </h4>
            <ul>
				<li>Student: " . $row['studentID'] . "</li>
				<li>Time: " . $row['starts'] . " - " . $row['ends'] . "</li>
				<li>Purpose:  " . $row['purpose'] . "</li>
				<li>Status:  " . $row['status'] . "</li>
			</ul>
            ";
        }
    } else {
        echo "
        <p>Nothing scheduled for today</p>
        ";
    }
} else {
    echo "<p>Go to your <a href='student-home.php'>Dashboard</a></p>";
    echo "<p><a href='student-appointment.php'>Schedule an appointment</a></p>";
    echo "<p>Today : $date</p>";
    $query = "SELECT * FROM Appointment WHERE studentID = '$userID' AND date = '$date' ";
    $result = mysqli_query($connect, $query);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "
            <h4>Today's appointments: </h4>
            <ul>
				<li>Professor: " . $row['professorID'] . "</li>
				<li>Time: " . $row['starts'] . " - " . $row['ends'] . "</li>
				<li>Purpose:  " . $row['purpose'] . "</li>
				<li>Status:  " . $row['status'] . "</li>
			</ul>
            ";
        }
    } else {
        echo "
        <p>Nothing scheduled for today</p>
        ";
    }
}
?>

            </div>

            <?php

require 'components/footer.php';

?>

                <?php

require 'includes/scripts.php';

?>

    </body>

    </html>