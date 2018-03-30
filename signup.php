<?php

$title = 'Sign Up';

require 'includes/db.php';

if (isset($_POST['username']) && (isset($_POST['password']) == isset($_POST['password2']))) {
    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $email = stripslashes($_POST['email']);
    $unhashedpass = stripslashes($_POST['password']);
    $password = stripslashes(md5($_POST['password']));

    if ($firstname == '' || $lastname == '' || $username == '' || $email == '' || $password == '') {
        echo '<div>Your form was missing information.</div>';
        echo '<a href="register.php">Return to Registration</a>';
    } elseif (strlen($unhashedpass) < 8) {
        echo '<div>You have submitted an invalid password.</div>';
        echo '<a href="register.php">Return to Registration</a>';
    } else {
        $query = "INSERT INTO Users (firstname, lastname, username, password, email) VALUES ('$firstname', '$lastname', '$username', '$password', '$email')";
        $usercheck = "SELECT * FROM Users WHERE username='$username'";
        $result = mysqli_query($connect, $usercheck);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            echo '<h3>Please use another username<h3>
            <div class="lead">Click here to <a href="register.php">try again</a></div>';
        } else {
            $result = mysqli_query($connect, $query);
            if ($result) {
                echo '
                <h3>Registered successfully.</h3>
                <div>Click here to <a href="login.php">login</a></div>
                ';
            } else {
                echo '
                <h3>Failed to register.</h3>
                <div>Click here to <a href="register.php">try again</a></div>
                ';
            }
        }
    }
}

require 'includes/head.php';

?>

    <body>

        <?php

require 'components/navbar.php';

?>

            <div class="contaier form-grid">

                <form action="" method="POST" name="signup">
                    <h2>Sign Up</h2>
                    <div>
                            <input type="text" class="" name="firstname" id="firstname" placeholder="First name">
                            <input type="text" class="" name="lastname" id="lastname" placeholder="Last name">
                    </div>
                    <div >
                            <input type="email" class="span"  name="email" id="email" aria-describedby="emailHelp" placeholder="Email address">
                        <small>We won't share your email with anyone.</small>
                    </div>
                    <div>
                            <input type="password" class="span" name="password" id="password" placeholder="Desired password">
                        <span id="passwordResult"></span>
                        <small>Password must be at least 8 characters long</small>
                        <input type="password" class="span" name="password2" id="password2" placeholder="Verify password">
                    </div>
                    <button type="submit" name="submit">SUBMIT</button>
                </form>

            </div>
            <?php

require 'components/footer.php';

?>

    </body>