<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'] ?? '';
$description = $data['description'] ?? '';
$hours = (int)($data['hours'] ?? 0);
$price = (float)($data['price'] ?? 0);

if (!$title || !$hours || !$price) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit;
}

$checkStmt = $conn->prepare("SELECT id FROM courses WHERE title = ?");
$checkStmt->bind_param("s", $title);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Course already exists"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO courses (title, description, hours, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssid", $title, $description, $hours, $price);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Course added successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to add course"]);
}
?>
