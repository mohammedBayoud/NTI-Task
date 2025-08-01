<?php session_start();
include("dp.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Account</title>
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
    <div class="col-md-8 form-container">

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_FILES["image"]["error"] == 4) {
                echo '<div class="alert alert-danger">Please upload an image.</div>';
            } else {
                $_SESSION["logstate"] = true;
                $username = $_POST["username"];
                $email = $_POST["email"];
                $sel = "SELECT `id` FROM `admin` WHERE email='$email'";
                $d = mysqli_query($con, $sel); 
                if (mysqli_num_rows($d) > 0) {
                    echo '<div class="alert alert-danger">There is an account with the same email.</div>';
                    $_SESSION["logstate"] = false;
                }

                if ($_SESSION['logstate']) {
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    mysqli_query($con, "INSERT INTO `admin` (`username`, `email`, `password`) VALUES ('$username','$email','$password')");
                    $se = "SELECT `id` FROM `admin` WHERE email='$email'";
                    $_SESSION["id"] = mysqli_fetch_assoc(mysqli_query($con, $se))["id"];

                    $tmp = $_FILES["image"]["tmp_name"];
                    $n = $_FILES["image"]["name"];
                    move_uploaded_file($tmp, "img/$n");

                    echo "
                    <div class='card mx-auto mb-3' style='width: 18rem;'>
                        <img src='img/$n' class='card-img-top'>
                        <div class='card-body text-center'>
                            <h5 class='card-title'>$username</h5>
                            <p class='card-text'>$email</p>
                            <a href='products.php' class='btn btn-primary'>Go to Products</a>
                        </div>
                    </div>
                    <div class='alert alert-success text-center'>Account created successfully</div>
                    ";
                }
            }
        }
        ?>

        <h4 class="text-center mb-4">Create Your Account</h4>
        <form method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name="username" required>
                <div class="invalid-feedback">Please enter your name</div>
            </div>
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
            <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" required>
                <div class="invalid-feedback">Please upload a profile image</div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-custom text-white">Sign Up</button>
                <a href="register.php" class="btn btn-outline-primary">Login</a>
            </div>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
