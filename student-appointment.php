<?php

$title = "Dashboard";

$date = date('Y-m-d');
$email = $_SESSION['email'];
$userID = $_SESSION['userID'];

require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';

if (!isset($_SESSION)) {
    session_start();
}

$professorID = $_POST['professor'];

// List all profs
$query = "SELECT * FROM Users WHERE status = 1 ORDER BY firstName";
$result = mysqli_query($connect, $query);
$rows = mysqli_num_rows($result);

//Once Prof is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $professorID = $_POST['professor'];

    $getAvail = "SELECT * FROM Availability WHERE professorID = $professorID ORDER BY day";
    $availability = mysqli_query($connect, $getAvail);
    $rows2 = mysqli_num_rows($availability);

    switch ($row2['day']) {
        case 1:
            $day = "Monday";
            break;
        case 2:
            $day = "Tuesday";
            break;
        case 3:
            $day = "Wednesday";
            break;
        case 4:
            $day = "Thursday";
            break;
        case 5:
            $day = "Friday";
            break;
    }

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
                        <form action="<?php ($_SERVER[" PHP_SELF "]);?>" method="POST">
                            <label for="professor">Professor: </label>
                            <select name="professor">
                                <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<option value="' . $row['userID'] . '">' . $row['firstName'] . " " . $row['lastName'] . '</option>';
}
?>
                            </select>
                            <input type="submit" name="submit" value="View Availabilities">
                        </form>
                    </div>

                    <div id="availability">

                    </div>

                    <div>
                        <?php

if ($rows2 > 0) {
    echo "
    <table>
    <tr>
    <th>Day</th>
    <th>Time</th>
    <th>Purpose</th>
    <th>Confirm</th>
    </tr>
    ";

    while ($row2 = mysqli_fetch_assoc($availability)) {
        echo
            "<tr>" .
            "<td>" . $row2['day'] . "</td>" .
            "<td>" . $row2['starts'] . " - " . $row2['ends'] . "</td>" .
            "<td id='purpose' contenteditable style='width: 50%;'></td>" .
            "<td>" . "<button name='btn_add' id='btn_add" . $row2['id'] . "'>Add</button>" . "</td>" .
            "</tr>"
        ;
    }

    echo "</ul>";
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
                                $(document).on('click', '#btn_add', function () {
                                    var purpose = $('#purpose').text();
                                    if (purpose == '') {
                                        alert("Enter Purpose for Appointment");
                                        return false;
                                    }
                                    $.ajax({
                                        url: "includes/insert.php",
                                        method: "POST",
                                        data: {
                                            first_name: first_name,
                                            last_name: last_name
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