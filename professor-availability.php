<?php

$title = "Availability";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
$proffesorID = $_SESSION['userID'];

if (!isset($_SESSION)) {
    session_start();
}

$professorID = $_SESSION['userID'];
$getcancelavail = "SELECT * FROM Availability WHERE professorID=$professorID ORDER BY day ";
$profavail = mysqli_query($connect, $getcancelavail);

if (isset($_POST['submitavail'])){
    $day = stripslashes($_POST['day']);
    $start = stripslashes($_POST['starttime']);
    $endtime = stripslashes($_POST['endtime']);
    $insertquery = "INSERT INTO availability VALUES ('$professorID', '$day', '$start', '$endtime')";
    $queryinsert = mysqli_query($connect,$insertquery);
    if ($queryinsert) {
       // echo "<script>alert('Time slot has been added to your availability.');</script>";
    } else {
        echo "Sorry, please try again.";
    }
}

require_once 'includes/head.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.js"></script>


  <link rel="stylesheet" type="text/css" href="../CSS/snack.css">
  <link rel="stylesheet" type="text/css" href="css/prof.css">
  <script type="text/javascript" src="js/script.js"></script>

  <script>
        $(document).ready(function() {
            getAppointments(<?php echo $_SESSION['userID']; ?>);
        });
  </script>

</head>


    <body>

        <?php
          require 'components/navbar.php';
        ?>

            <div class="container">

                <h3>
                    Professor Availability</h3>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                    <label for="day">Day: </label>
                    <select name="day" id="day">
                        <option value="1">Monday</option>
                        <option value="2">Tuesday</option>
                        <option value="3">Wednesday</option>
                        <option value="4">Thursday</option>
                        <option value="5">Friday</option>
                    </select>
                    <br>
                    <label for="starttime">From: </label>
                    <select name="starttime" id="starttime">
                        <option value="8:00">8:00 AM</option>
                        <option value="9:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                    </select>
                    <br>
                    <label for="endtime">To: </label>
                    <select name="endtime" id="endtime">
                        <option value="9:00">9:00 AM</option>
                        <option value="10:00">10:00 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="13:00">1:00 PM</option>
                        <option value="14:00">2:00 PM</option>
                        <option value="15:00">3:00 PM</option>
                        <option value="16:00">4:00 PM</option>
                        <option value="17:00">5:00 PM</option>
                        <option value="18:00">6:00 PM</option>
                    </select>
                    <br>
                    <input type="submit" name="submitavail" value="Add Availability">
                </form>

            </div>

<?php

require 'components/footer.php';
require 'includes/scripts.php';

?>
</body>

</html>
