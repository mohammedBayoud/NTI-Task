<?php
include '../db.php';
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$hours = $_POST['hours'];
$price = $_POST['price'];

$conn->query("UPDATE courses SET title='$title', description='$description', hours='$hours', price='$price' WHERE id=$id");
header("Location: courses.php");
exit;
?>