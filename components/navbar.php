<nav class="navbar">
    <ul>
        <li id="title">
            <a href="index.php">
                <h1><img src="images/ur.png" alt="ur logo"></h1>
            </a>
        </li>
<?php if (isset($_SESSION['email'])) {
    if ($_SESSION['status'] == 1) {
        echo '
        <li id="nav1">
            <a href="professor-home.php">Dashboard</a>
        </li>';
    } else {
        echo '
        <li id="nav1">
            <a href="student-home.php">Dashboard</a>
        </li>';
    }
    echo '
     <li id="nav2">
         <a href="logout.php">Log Out</a>
     </li>';
} else {
    echo '
        <li id="nav1">
            <a href="login.php">Log In</a>
        </li>
        <li id="nav2">
            <a href="signup.php">Sign Up</a>
        </li>';
}
?>
    </ul>
</nav>
