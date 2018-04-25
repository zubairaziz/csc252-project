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

$title = "Student";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
require_once 'includes/head.php';

?>

    <body>



            <?php

require 'components/navbar.php';

?>

<div class="container">

                <section id="view">

                </section>

        </div>

        <?php

require 'components/footer.php';

?>

            <?php

require 'includes/scripts.php';

?>

    </body>

    </html>