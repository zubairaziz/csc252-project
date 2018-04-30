<?php

$title = "Dashboard";
if (!isset($_SESSION)) {
    session_start();
}

$date = date('Y-m-d');
$date = (string) $date;

$email = $_SESSION['email'];
$userID = $_SESSION['userID'];

require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';

require_once 'includes/head.php';

?>

        <script>
            $(document).ready(function () {
                getAppointments(<?php echo $_SESSION['userID']; ?>);
            });
        </script>

    <body>

        <?php
require 'components/navbar.php';
?>

            <div class="container">
                <h3>Your Dashboard</h3>
<<<<<<< HEAD
                <a href="professor-availability.php">Manage your availabilities</a>
=======
                <p><a href="professor-availability.php">Add your availabilities</a></p>
>>>>>>> 93615e8430045dcd91c4ddb7f7dce9fbc51c13f9
                <div class="dashboard">
                    <div id=#item1>
                        <h4>Curent Appointments: </h4>

                        <div class="appointments" id="appointments">
                            <div>
                                <span class="up_app">
                                    <h3>Upcoming Appointments</h3>
                                </span>
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