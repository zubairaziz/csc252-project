<?php
if (!isset($_SESSION['email'])) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}
