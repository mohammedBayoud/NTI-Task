<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success bg-gradient d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $fullName = $_POST['fullName'] ?? '';
                        $email = $_POST['email'] ?? '';
                        $age = $_POST['age'] ?? '';
                        $city = $_POST['city'] ?? '';
                        ?>

                        <h4 class="text-center mb-4">Welcome, <?= htmlspecialchars($fullName) ?>!</h4>

                        <ul class="list-group">
                            <li class="list-group-item"><strong>Full Name:</strong> <?= htmlspecialchars($fullName) ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?= htmlspecialchars($email) ?></li>
                            <li class="list-group-item"><strong>Age:</strong> <?= htmlspecialchars($age) ?></li>
                            <li class="list-group-item"><strong>City:</strong> <?= htmlspecialchars($city) ?></li>
                        </ul>

                        <div class="d-grid mt-4">
                            <a href="index.html" class="btn btn-primary">Back to Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
