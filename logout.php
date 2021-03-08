<?php

session_start();

if (session_destroy()) {
    // echo "You are success logout";
    header('Location: login.php');
}
?>

