<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$name = htmlspecialchars($_SESSION['user']['name']);
$email = htmlspecialchars($_SESSION['user']['email']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light d-flex align-items-center justify-content-center min-vh-100">

    <div class="card bg-dark text-light p-4 shadow-lg w-50">
        <div class="alert alert-success d-flex align-items-center justify-content-between" role="alert">
            <div>
                Welcome, <?php echo $name; ?> (<?php echo $email; ?>)
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="login.php" class="btn btn-primary me-2 w-100">logout</a>
            <a href="products.php" class="btn btn-primary me-2 w-100">products</a>
            <a href="signup.php" class="btn btn-primary w-100">create account</a>
        </div>
    </div>

</body>
</html>
