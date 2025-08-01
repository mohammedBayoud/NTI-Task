<?php 
include("index.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['username'] = $_SESSION['username'] ?? '';
$_SESSION['role'] = $_SESSION['role'] ?? '';
$_SESSION['logstate'] = $_SESSION['logstate'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
        .form-container {
            background-color: #ffffff18;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
        }
        .btn-custom {
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h3 class="text-center text-light mb-4">Login to Training System</h3>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $_SESSION["logstate"] = false;
                    
                    $admin = mysqli_query($con, "SELECT * FROM `admin` WHERE email='".mysqli_real_escape_string($con, $email)."'");
                    
                    if(mysqli_num_rows($admin) > 0) {
                        $row = mysqli_fetch_assoc($admin);
                        if(password_verify($password, $row['password'])) {
                            $_SESSION["username"] = $row["username"];
                            $_SESSION["role"] = $row["role"];
                            $_SESSION["logstate"] = true;
                        }
                    }

                    if($_SESSION["logstate"] == false) {
                        $log = mysqli_query($con, "INSERT INTO `log`(`email`, `state`) VALUES ('".mysqli_real_escape_string($con, $email)."','fail')");
                        echo '<div class="alert alert-danger text-center" role="alert">⚠️ Wrong email or password</div>';
                    } else {
                        $log = mysqli_query($con, "INSERT INTO `log`(`email`, `state`) VALUES ('".mysqli_real_escape_string($con, $email)."','Successful')");
                        header("Location: project.php");
                        exit();
                    }
                }
            }
            ?>

            <form class="needs-validation mt-4" method="POST" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <div class="invalid-feedback">Please enter your email.</div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <div class="invalid-feedback">Please enter your password.</div>
                </div>

                <div class="row g-2">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success w-100 btn-custom">Login</button>
                    </div>
                    <div class="col-md-6">
                        <a href="creat_account.php" class="btn btn-outline-light w-100 btn-custom">Create Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
