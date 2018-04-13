<?php

$title = 'Sign Up';

require_once 'includes/db.php';
require_once 'includes/functions.php';
check_cookie();
redirect();

// Check if required fields are filled
if (isset($_POST['email']) && (isset($_POST['password']) == isset($_POST['password2']))) {
    // Defining variables
    $email = stripslashes($_POST['email']);
    $unhashedpass = stripslashes($_POST['password']);
    $password = stripslashes(md5($_POST['password']));
    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $status = stripslashes($_POST['status']);
    $room = stripslashes($_POST['room']);
    if ($firstname == '' || $lastname == '' || $email == '' || $password == '') {
        echo '<div>Your form was missing information.</div>';
        echo '<a href="signup.php">Return to Registration</a>';
    } elseif (strlen($unhashedpass) < 6) {
        echo '<div>You have submitted an invalid password.</div>';
        echo '<a href="signup.php">Return to Registration</a>';
    } else {
        $query = "INSERT INTO Users (email, password, firstName, lastName, status ) VALUES ('$email', '$password', '$firstname', '$lastname', '$status')";
        // Validate email
        $usercheck = "SELECT * FROM Users WHERE email = '$email'";
        $result = mysqli_query($connect, $usercheck);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            echo '<h3>That email is already in use<h3>
                <div class="lead">Click here to <a href="signup.php">try again</a></div>';
        } else {
            $result = mysqli_query($connect, $query);
            if ($result) {
                echo '
                <h3>Registered successfully.</h3>
                <div>Click here to <a href="login.php">login</a></div>
                ';
                $profID = "SELECT userID FROM Users WHERE email = '$email'";
                $query2 = "INSERT INTO ProfRoom (professorID, roomNumber ) VALUES ('$profID', '$room')";
            } else {
                echo '
                <h3>Failed to register.</h3>
                <div>Click here to <a href="signup.php">try again</a></div>
                ';
            }
        }
    }
} else {

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
                    <div>
                        <input type="email" class="span" name="email" id="email" aria-describedby="emailHelp" placeholder="Email address">
                        <small>We won't share your email with anyone.</small>
                    </div>
                    <div>
                        <input type="password" class="span" name="password" id="password" placeholder="Desired password">
                        <span id="passwordResult"></span>
                        <small>Password must be at least 6 characters long</small>
                        <input type="password" class="span" name="password2" id="password2" placeholder="Verify password">
                    </div>
                    <div>
                        <p>Are you a: </p>
                        <input type="radio" name="status" id="professor" value="1">
                        <label for="professor">Professor</label>
                        <div class="reveal-if-active">
                            <input class="require-if-active" type="text" id="room" name="room" data-require-pair="#professor" placeholder="Room Number">
                        </div>
                        <input type="radio" name="status" id="profstudentessor" value="0">
                        <label for="professor">Student</label>
                    </div>

                    <button type="submit" name="submit">SUBMIT</button>
                </form>

                <p>Already have an account?
                    <a href="login.php">Login here</a>.</p>

            </div>
            <?php

    require 'components/footer.php';

    ?>

                <script src="js/jquery.js"></script>
                <script>
                    // Enabling room input for professors
                    var FormStuff = {

                        init: function () {
                            // kick it off once, in case the radio is already checked when the page loads
                            this.applyConditionalRequired();
                            this.bindUIActions();
                        },

                        bindUIActions: function () {
                            // when a radio or checkbox changes value, click or otherwise
                            $("input[type='radio']").on("change", this.applyConditionalRequired);
                        },

                        applyConditionalRequired: function () {
                            // find each input that may be hidden or not
                            $(".require-if-active").each(function () {
                                var el = $(this);
                                // find the pairing radio or checkbox
                                if ($(el.data("require-pair")).is(":checked")) {
                                    // if its checked, the field should be required
                                    el.prop("required", true);
                                } else {
                                    // otherwise it should not
                                    el.prop("required", false);
                                }
                            });
                        }

                    };

                    FormStuff.init();
                </script>
    </body>
    <?php }?>