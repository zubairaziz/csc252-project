<?php

if (isset($_GET['view'])) {
    $view = ($_GET['view']);
} else {
    $view = 'professor-home';
}

switch ($view) {
    case "professor-home":
        $title = "Home";
        break;
    case "professor-availabilities":
        $title = "Your Availabilities";
        break;
    case "professor-confirm":
        $title = "Confirmation";
        break;
    default:
        $title = "Home";
        break;
}

?>

	<section id="view">

	</section>
