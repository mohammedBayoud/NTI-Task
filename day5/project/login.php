<?php
session_start();

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === 'mohammed@admin.com' && $password === '1234') {
        $_SESSION['user'] = [
            'name' => 'Admin',
            'email' => $email,
            'image' => '',
            'is_admin' => true
        ];
        header('Location: logged_in.php');
        exit();
    } else {
        $error = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container d-flex justify-content-center">
        <div class="card p-4 bg-dark text-light shadow w-50">
            <?php if ($error): ?>
                <div class="alert alert-danger">Wrong user or pass</div>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">Wrong user or pass</div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <div class="mt-3 text-center">
                <h5 class="text-secondary">mohammed@admin.com / 1234</h5>
            </div>

        </div>
    </div>
</body>

</html>