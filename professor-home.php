<?php

$title = "Dashboard";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';

if (!isset($_SESSION)) {
    session_start();
}


$date = date('Y-m-d');
$date = (string) $date;


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
                <h3>Your Dashboard</h3>
                <a href="professor-availability.php">Add your availabilities</a>
                <div class="dashboard">
                    <div id=#item1>
                        <h4>Curent Appointments: </h4>


                        <div class="appointments" id="appointments">
                        		<div>
                        		<span class="up_app"><h3>Upcoming Appointments</h3></span>
                        		</div>
                        		<br>

                        		<table id="appointment_table">
                        			<tr id="pet_tr">
                        				<th id="pet_th">Student Name</th>
                                <th id="pet_th">Date</th>
                        				<th id="pet_th">Start Time</th>
                        				<th id="pet_th">End Time</th>
                        				<th id="pet_th">Purpose</th>
                                <th id="pet_th">Status</th>
                        				<th id="pet_th"></th>
                        			</tr>
                              <!-----
                        			<tr id="schedule_tr">
                        				<td id="schedule_td">James Mark James</td>
                                <td id="schedule_td"> 04/25/2018</td>
                        				<td id="schedule_td"> 23232:222</td>
                        				<td id="schedule_td">23232:222</td>
                                <td id="schedule_td"> I need help with my course schedule</td>
                        				<td id="schedule_td"> Not completed</td>
                        				<td id="schedule_td"><span class="view_cancelled" onclick="cancelAppointment()" id="view_cn">Cancel</span></td>
                        			</tr>
                            -->

                        		</table>
                         </div>


                    </div>
                    <div id=#item2>
                        <h4>Today:
                            <?php echo $date ?>
                        </h4>

                    </div>
                </div>
            </div>

            <?php

require 'components/footer.php';

?>

                <?php

require 'includes/scripts.php';

?>

    </body>

    </html>
