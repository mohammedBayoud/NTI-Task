<?php 
include("index.php"); 
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if ($_FILES["image"]["error"] == 4) {
                        echo '<div class="alert alert-danger" role="alert">Please upload an image.</div>';
                    } else {
                        $username = $_POST["username"];
                        $email = $_POST["email"];
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        if (!file_exists('img')) {
                            mkdir('img', 0777, true);
                        }

                        $image_name = time() . '_' . str_replace(' ', '_', $_FILES["image"]["name"]);
                        $target_path = 'img/' . $image_name;

                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
                            $query = "INSERT INTO `admin` (`username`, `email`, `password`) 
                                      VALUES ('$username', '$email', '$password')";
                            $result = mysqli_query($con, $query);

                            if ($result) {
                                ?>
                                <div class="card text-dark bg-light mb-3 mx-auto" style="max-width: 100%;">
                                    <img src="<?= $target_path ?>" class="card-img-top" alt="Uploaded Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $username ?></h5>
                                        <p class="card-text"><?= $email ?></p>
                                    </div>
                                </div>
                                <div class="alert alert-success" role="alert">
                                    Account created successfully.
                                </div>
                                <?php
                            } else {
                                echo '<div class="alert alert-danger">Error: ' . mysqli_error($con) . '</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">Failed to upload image</div>';
                        }
                    }
                }
                ?>

                <form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required placeholder="Enter username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    <a href="register.php" class="btn btn-secondary w-100 mt-2">Login</a>
                </form>
            </div>
        </div>
    </div>
</body>
