<?php

$title = "Availability";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
$proffesorID = $_SESSION['userID'];

if (!isset($_SESSION)) {
    session_start();
}

//require_once 'includes/head.php';
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


  <link rel="stylesheet" type="text/css" href="css/prof.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/navigation.css">
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

                <h3>Professor Availability</h3>
                    <div class="schedule" id="schedule">
                		<form name="schedule_form">
                		<br>
                		<table id="schedule_table">
                			<tr id="pet_tr">
                				<th id="pet_th"></th>
                				<th id="pet_th">Mon</th>
                				<th id="pet_th">Tue</th>
                				<th id="pet_th">Wed</th>
                				<th id="pet_th">Thur</th>
                				<th id="pet_th">Fri</th>
                			</tr>
                			<!----
                			<tr id="schedule_tr">
                				<td id="schedule_td"><input type="text" name="schedule_time"></td>
                				<td id="schedule_td"><input type="text" name="schedule_time"></td>
                				<td id="schedule_td"><input type="text" name="schedule_time"></td>
                				<td id="schedule_td"><input type="text" name="schedule_time"></td>
                				<td id="schedule_td"><input type="text" name="schedule_time"></td>
                			</tr>
                			---->

                		</table>
                		<div>
                			<span id="sub_button" class="sch_bt"><input type="submit" value="Submit" onclick="processSchedule()"></span><span></span>
                			<span class="sch_bt" onclick="addRow()" id="addmore">Add Row</span>
                			<p><span class="error" id="submitScheduleErr"></span></p>
                		</div>
                		</form>
                	</div>

            </div>

<?php

require 'components/footer.php';
require 'includes/scripts.php';

?>
</body>

</html>
