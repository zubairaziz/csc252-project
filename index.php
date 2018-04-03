<?php

$title = "Home";
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

                <h2>Welcome
                    <?php echo $_SESSION['firstName'] ?>
                </h2>

                <?php

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    require_once "professor.php";
} else {
    require_once "student.php";
}

?>

        </div>

        <?php

require 'components/footer.php';

?>

    <script src="js/jquery.js"></script>
    <script>
            showView();

            function showView() {
                $(document).ready(function () {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo $view ?>.php",
                        success: function (result) {
                            $("#view").html(result);
                        }
                    });
                });
            }
        </script>

            <?php

require 'includes/scripts.php';

?>

    </body>

    </html>