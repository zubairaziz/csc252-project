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