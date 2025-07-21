<?php
require 'functions.php';
require_login();
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2>Welcome to your dashboard, <?= htmlspecialchars($user) ?>!</h2>
</div>
</body>
</html> 