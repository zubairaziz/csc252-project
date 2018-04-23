<?php

$title = "Home";
require_once 'includes/db.php';
require_once 'includes/authenticate.php';
require_once 'includes/cookie-check.php';
require_once 'includes/head.php';

?>

    <body>

        <div class="container">

            <?php

require 'components/navbar.php';

?>

                <h2>Welcome
                    <?php echo $_SESSION['firstName'] ?>
                </h2>

                <?php

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    echo "<p>Go to your <a href='professor.php'>Dashboard</a></p>";
} else {
    echo "<p>Go to your <a href='student.php'>Dashboard</a></p>";
}

?>

        </div>

        <?php

require 'components/footer.php';

?>

            <?php

require 'includes/scripts.php';

?>

    </body>

    </html>