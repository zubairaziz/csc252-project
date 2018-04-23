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
require_once 'includes/functions.php';
authenticate();
check_cookie();

require_once 'includes/head.php';

?>

    <body>

        <div class="container">

            <?php

require 'components/navbar.php';

?>

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