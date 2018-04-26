<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $getAvail = "SELECT * FROM Availability WHERE profID = '$profID' ORDER BY day";
    $availability = mysqli_query($connect, $getAvail);
    $rows2 = mysqli_num_rows($availability);
    $row2 = mysqli_fetch_assoc($availability);

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

    if ($rows2 > 0) {
        echo "<ul>";

        while ($row2 = mysqli_fetch_assoc($availability)) {
            echo "<li>" . $row2['day'] . ": " . $row2['starts'] . "</li>";

        }

        echo "</ul>";
    }
}
