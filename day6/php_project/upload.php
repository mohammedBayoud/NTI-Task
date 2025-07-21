<?php
require 'functions.php';
require_login();
$user = $_SESSION['user'];
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $type = $_POST['type'] ?? 'product';
    $file = $_FILES['image'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . uniqid() . '.' . $ext;
        $target = 'uploads/' . $filename;
        if (move_uploaded_file($file['tmp_name'], $target)) {
            log_upload($user, $type, $target, $file['type']);
            $msg = "Upload successful!";
        } else {
            $msg = "Upload failed!";
        }
    } else {
        $msg = "No file selected or upload error!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Upload Product</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2>Upload Image</h2>
    <?php if ($msg): ?>
        <div class="alert alert-info"><?= $msg ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data" class="form-inline">
        <input type="file" name="image" class="form-control mb-2 mr-2" required>
        <select name="type" class="form-control mb-2 mr-2">
            <option value="product">Product</option>
            <option value="avatar">Avatar</option>
        </select>
        <button class="btn btn-primary mb-2">Upload</button>
    </form>
    <a href="gallery.php">View Gallery</a> | <a href="logout.php">Logout</a>
</div>
</body>
</html> 