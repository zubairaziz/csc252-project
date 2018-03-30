<?php

require '/includes/db.php';

if (isset($_POST['username']) && (isset($_POST['password']) == isset($_POST['password2']))) {
    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $username = stripslashes($_POST['username']);
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
