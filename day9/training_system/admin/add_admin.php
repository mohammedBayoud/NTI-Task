<?php
require("../index.php");
require("../navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <h4 class="text-center mb-4">Add Admin / User</h4>

        <form class="needs-validation" method="POST" enctype="multipart/form-data" action="insert_admin.php" novalidate>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
                <div class="invalid-feedback">Please enter a name</div>
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
                <label class="form-label">Role</label>
                <select class="form-select" name="role" required>
                    <option selected disabled value="">Choose...</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <div class="invalid-feedback">Please select a role</div>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-custom text-white">Add</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
