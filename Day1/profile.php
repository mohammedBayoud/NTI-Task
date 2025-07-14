<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';
    $city = $_POST['city'] ?? '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        body {
            background-color: green;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-container">
                <h2 class="text-center mb-4">User Profile</h2>
                <div class="alert alert-success text-center">
                    Welcome, <strong><?php echo htmlspecialchars($name); ?></strong>!
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Full Name:</strong> <?php echo htmlspecialchars($name); ?></li>
                    <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
                    <li class="list-group-item"><strong>Age:</strong> <?php echo htmlspecialchars($age); ?></li>
                    <li class="list-group-item"><strong>City:</strong> <?php echo htmlspecialchars($city); ?></li>
                </ul>
                <div class="d-grid mt-3">
                    <a href="page1.html" class="btn btn-primary">Back to Form</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>