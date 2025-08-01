<?php session_start();
include("dp.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #2575fc;
            border: none;
        }
        .btn-custom:hover {
            background-color: #1a5edb;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 form-container">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $_SESSION["logstate"] = false;

                $admin = mysqli_query($con, "SELECT * FROM `admin` WHERE 1");
                while ($row = mysqli_fetch_assoc($admin)) {
                    if ($email == $row["email"]) {
                        if (password_verify($password, $row["password"])) {
                            $_SESSION["username"] = $row["username"];
                            $_SESSION["id"] = $row["id"];
                            $_SESSION["logstate"] = true;
                            header("Location: dashboard.php");
                            exit();
                        }
                    }
                }

                if (!$_SESSION["logstate"]) {
                    echo '<div class="alert alert-danger text-center">⚠️ Wrong password or email</div>';
                }
            }
        }
        ?>

        <h4 class="text-center mb-4">Login to Your Account</h4>
        <form class="needs-validation" method="POST" novalidate>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
                <div class="invalid-feedback">Please enter a valid email</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
                <div class="invalid-feedback">Please enter a password</div>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom text-white">Login</button>
                <a href="creat_account.php" class="btn btn-outline-primary">Create Account</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
