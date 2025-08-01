<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$con = mysqli_connect("localhost", "root", "", "training_system");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
