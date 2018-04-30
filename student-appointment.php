<?php

if (!isset($_SESSION)) {
    session_start();
}

$title = "Dashboard";

$date = date('Y-m-d');
$date = (string) $date;

$email = $_SESSION['email'];
$userID = $_SESSION['userID'];
$studentID = $userID;

require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';


// List all profs
$query = "SELECT * FROM users WHERE status = 1 ORDER BY firstName";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

//Once Prof is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professorID = $_POST['professorID'];

    $getAvail = "SELECT * FROM availability WHERE availability.professorID = $professorID ORDER BY day";
    $availability = mysqli_query($connect, $getAvail);
    $rows2 = mysqli_num_rows($availability);
}

require_once 'includes/head.php';

?>

    <body>

        <?php

require 'components/navbar.php';

?>

            <div class="container">

                <h3>Schedule an Appointment</h3>
                <div>
                    <div>
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
        <form >
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

}

?>
                    </div>

                    <?php

require 'components/footer.php';

?>

                        <?php

require 'includes/scripts.php';

?>

                            <script>


                              function processHrs() {
                          			$('form').on('submit', function (e) {

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

    </body>

    </html>
