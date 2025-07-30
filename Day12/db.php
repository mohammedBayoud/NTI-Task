<?php
$conn = new mysqli("localhost", "root", "", "courses_db");

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "DB connection failed"]));
}
?>
