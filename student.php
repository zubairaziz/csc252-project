<?php

if (isset($_GET['view'])) {
    $view = ($_GET['view']);
} else {
    $view = 'student-home';
}

switch ($view) {
    case "student-home":
        $title = "Home";
        break;
    case "student-appointment":
        $title = "Make an Appointment";
        break;
    case "student-confirm":
        $title = "Confirmation";
        break;
    default:
        $title = "Home";
        break;
}

?>

	<section id="view">

	</section>
