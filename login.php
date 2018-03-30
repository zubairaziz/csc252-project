<?php

$title = 'Log In';

require_once 'includes/functions.php';
check_cookie();
redirect();
require_once 'includes/db.php';

if (!isset($_SESSION)) {
    session_start();
}

// If form submitted, insert values into the database.
if (isset($_POST['submit']) and isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Checking if user exists in the database or not
    $query = "SELECT * FROM Users WHERE email = '$email' and password = '" . md5($password) . "'";
    $result = mysqli_query($connect, $query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;

        $profile = mysqli_fetch_assoc($result);
        $_SESSION['userID'] = $profile['userID'];
        $_SESSION['firstName'] = $profile['firstName'];
        $_SESSION['lastName'] = $profile['lastName'];

        if (isset($_POST['remember'])) {
            //setting the relevant cookies
            setcookie("email", $email, time() + 86400, "/");
            setcookie("password", md5($password), time() + 86400, "/");
        }
        header("Location: index.php");
    } else {
        echo '<div>
		<h3>Failed to login.</h3>
		<div class="lead">Incorrect username or password</div>
		<div class="lead">Click here to <a href="login.php">try again</a></div>
		</div>';
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
					<h2>Log In</h2>
					<div>
						<input type="email" class="" name="email" id="email" placeholder="Email address">
					</div>
					<div>
						<input type="password" class="" name="password" id="password" placeholder="Password">
					</div>
					<div>
						<input type="checkbox" class="" name="remember" id="remember">
						<label for="remember">Remember Me</label>
					</div>
					<button type="submit" name="submit">LOGIN</button>
				</form>

			</div>
			<?php

    require 'components/footer.php';

    ?>
	</body>
	<?php }?>