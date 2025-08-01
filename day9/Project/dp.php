<?php
$con = mysqli_connect("localhost", "root", "", "product");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
