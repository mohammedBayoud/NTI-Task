<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: signup.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card bg-dark text-light shadow mx-auto" style="max-width: 500px;">
            <div class="card-body text-center">
                <?php if (!empty($user['image'])): ?>
                    <img src="<?php echo htmlspecialchars($user['image']); ?>" class="img-thumbnail mb-3" width="200">
                <?php endif; ?>
                <h4 class="card-title mb-2"><?php echo htmlspecialchars($user['name']); ?></h4>
                <p class="card-text mb-2"><?php echo htmlspecialchars($user['email']); ?></p>
                <a href="products.php" class="btn btn-primary mb-3 w-100">Go to Products</a>

            </div>
        </div>

        <div class="mt-5 mx-auto w-100">
            <div class="alert alert-success">Account Created Successfully</div>
            <div class="card bg-dark text-light shadow p-4">
                <form method="post"  enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>