<?php

if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    header('Location: index.php');
}
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    header('Location: index.php');
}
