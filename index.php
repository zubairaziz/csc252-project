<?php

if (!isset($_SESSION['email'])) {
    session_start();
}
$title = "Home";
require 'includes/functions.php';
check_cookie();

require 'includes/head.php';

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