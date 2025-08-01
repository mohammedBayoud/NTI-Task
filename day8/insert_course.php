<?php
include '../db.php';
$title = $_POST['title'];
$description = $_POST['description'];
$hours = $_POST['hours'];
$price = $_POST['price'];

$conn->query("INSERT INTO courses (title, description, hours, price) VALUES ('$title', '$description', '$hours', '$price')");
header("Location: courses.php");
exit;
?>