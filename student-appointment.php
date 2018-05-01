<?php

if (!isset($_SESSION)) {
    session_start();
}

$email = $_SESSION['email'];
$userID = $_SESSION['userID'];
$studentID = $userID;

require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';

<<<<<<< HEAD

require_once 'includes/head.php';
=======
// List all profs
$query = "SELECT * FROM users WHERE status = 1 ORDER BY firstName";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

//Once Prof is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professorID = $_POST['professorID'];
>>>>>>> fa80d1e84862cf41fb67455ddf40572c12adf847

?>
<script>
function schedule() {
  $('form').on('submit', function (e) {

    e.preventDefault();
    var time = $(this).find('option:selected').val();
    var date = document.getElementById("date").value;
    var purpose = document.getElementById("purpose").value;
    //alert(purpose);
    processAppointment(date, time, purpose);
  });
}

  function viewAvailability() {
    $('form').on('submit', function (e) {

      e.preventDefault();
      var profID = $(this).find('option:selected').val();
      var date = document.getElementById("date").value;
      //alert(date);
      viewHrs(profID, date);
      var x = document.getElementById("profHrs");
      x.style.display = "block";
    });
  }

$(document).ready(function(){
  fetch_data();
    function fetch_data()
    {
        $.ajax({
            url:"db/select.php",
            method:"POST",
            success:function(data){
        $('#prof').html(data);
            }
        });
    }



});
</script>
    <body>


        <?php
          require 'components/navbar.php';
        ?>

            <div class="container">

                <h3>Schedule an Appointment</h3>
                <div>
                    <div>
<<<<<<< HEAD
                        <h4>Select Professor: </h4>
=======
                        <h4>Select: </h4>
                        <form action="" method="POST">
                            <label for="professorID">Professor: </label>
                            <select name="professorID">
                                <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['userID'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
}
?>
                            </select>
                            <input type="submit" name="submit" value="View Availabilities">
                        </form>
                    </div>

                    <div>
                        <?php

if ($rows2 > 0) {

    $getProfile = "SELECT users.firstName, users.lastName, courses.courseName  FROM users
    INNER JOIN teach ON users.userID = teach.professorID
    INNER JOIN courses ON teach.courseID = courses.courseID
    WHERE users.userID = $professorID";
    $profProfile = mysqli_query($connect, $getProfile);
    $profileData = mysqli_fetch_assoc($profProfile);
    $firstName = $profileData["firstName"];
    $lastName = $profileData["lastName"];
    $courseName = $profileData["courseName"];

    echo
        "
        <br>
        <form id='addApt'>
        <h4>Availabilities for " . $firstName . " " . $lastName . "</h4>
        <p>Courses taught: </p>
        <ul>
        <li>" . $courseName .
        "</li>
        </ul>
        <input type='checkbox' checked hidden name='professorID' value='$professorID'>
        <input type='checkbox' checked hidden name='studentID' value='$studentID'>
        <select name='start'>
        ";

    while ($row2 = mysqli_fetch_assoc($availability)) {
        echo
            '<option id="day" name= "day" value="' . $row2['day'] . '">';
        switch ($row2['day']) {
            case 1:
                echo "Monday";
                break;
            case 2:
                echo "Tuesday";
                break;
            case 3:
                echo "Wednesday";
                break;
            case 4:
                echo "Thursday";
                break;
            case 5:
                echo "Friday";
                break;
            default:
                # NULL
                break;
        }
        echo
            '</option>'
        ;
    }
/*
while ($row2 = mysqli_fetch_assoc($availability)) {
echo
'<option value="' . $row2['starts'] . '">';
switch ($row2['day']) {
case 1:
echo "Monday";
break;
case 2:
echo "Tuesday";
break;
case 3:
echo "Wednesday";
break;
case 4:
echo "Thursday";
break;
case 5:
echo "Friday";
break;
default:
# NULL
break;
}
echo
" - " . $row2['starts'] . '</option>'
;
}
 */

    echo
        "
        </select>
        <br>
        <br>
        <label for='date'> Select a day that corresponds to availability</label>
        <input type='date' name='date' id='date'>
        <br>
        <br>
        <div name='hours'>

        </div>
        <input type='submit' name='viewhr' value='View Hours' onclick='processHrs()''><br />
        <label for='purpose'>Purpose: </label>
        <input type='text' name='purpose' id='purpose' cols='15' rows='5'>
        <br>
        <br>

        </form>
        ";
>>>>>>> fa80d1e84862cf41fb67455ddf40572c12adf847

                        <form>
                          <div id="prof">

                          </div>
                          <input type="submit" name="submit" value="View Availabilities" onclick="viewAvailability()">
                        </form>
                    </div>
                    <div class="profHrs" id="profHrs">
                        <form>
                              <h4>Select Appointment Time: </h4>
                              <select id="select_hrs"></select><br />
                              <h4>Purpose of Appointment: </h4>
                              <input type="text" name="purpose" id="purpose" /><br />
                              <div>
                                <input type="submit" name="submit" value="Schedule Appointment" onclick="schedule()">
                              </div>

                        </form>


                    </div>
              </div>

            </div>

<<<<<<< HEAD
=======
                            <script>
                                function processHrs() {
                                    $('#addApt').on('submit', function (e) {

                                        e.preventDefault();
                                        var day = document.getElementById("day").value;
                                        viewHrs(<?php echo $_SESSION['userID']; ?>, day);
                                    });
                                }


                                $(document).on('click', '#btn_submit', function () {
                                    var purpose = $('#purpose').text();
                                    alert($('day').value());
                                    // if (purpose == '') {
                                    //     alert("Enter Purpose for Appointment");
                                    //     return false;
                                    // }
                                    $.ajax({
                                        url: "db/insert-appointment.php",
                                        method: "POST",
                                        data: {
                                            professorID: professorID,
                                            studentID: studentID,
                                            start: start,
                                            end: end,
                                            date: date,
                                            purpose: purpose
                                        },
                                        dataType: "text",
                                        success: function (data) {
                                            alert(data);
                                            fetch_data();
                                        }
                                    })
                                });
                            </script>
>>>>>>> fa80d1e84862cf41fb67455ddf40572c12adf847

    </body>

    </html>