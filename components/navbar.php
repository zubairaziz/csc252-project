<nav class="navbar">
    <ul>
        <li id="title">
            <a href="index.php">
                <h1>Home</h1>
            </a>
        </li>
<?php if (isset($_SESSION['email'])) {
    echo '
     <li id="nav1">
         <a href="#">LINK</a>
     </li>
     <li id="nav2">
         <a href="includes/logout.php">Log Out</a>
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
