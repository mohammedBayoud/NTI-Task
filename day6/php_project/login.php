<?php
session_start();
require 'functions.php' ;

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if (check_login($username, $password)) {
        $_SESSION['user'] = $username;
        log_login($username, 'SUCCESS');
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Login failed';
        log_login($username, 'FAIL');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body class="bg-dark d-flex align-items-center" style="height:100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <input type="text" name="username" class="form-control mb-2" placeholder="Username" value="MohammedBayoud" required>
                        <input type="password" name="password" class="form-control mb-2" placeholder="Password" value="123" required>
                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
