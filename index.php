<?php

include 'includes/head.php';

?>

<body>

<?php

include 'components/navbar.php';

?>

<h1>Welcome</h1>

<?php

require_once 'includes/db.php';

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($mysqli->connect_error) {
    die(
        'Connect Error (' . $mysqli->connect_errno . ') ' .
        $mysqli->connect_error
    );
}
echo '<p>Connection OK ' . $mysqli->host_info . '</p>';
echo '<p>Server ' . $mysqli->server_info . '</p>';
$mysqli->close();

?>


<?php

include 'components/footer.php';

?>

<?php

include 'includes/scripts.php';

?>

</body>
</html>
