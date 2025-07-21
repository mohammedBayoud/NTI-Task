<?php
require 'functions.php';
require_login();
$user = $_SESSION['user'];
$images = glob('uploads/*.*');
if (isset($_GET['delete'])) {
    $file = 'uploads/' . basename($_GET['delete']);
    if (file_exists($file)) unlink($file);
    header('Location: gallery.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Gallery</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2>Gallery</h2>
    <table class="table">
        <thead>
            <tr><th>Image</th><th>Name</th><th>Type</th><th>Size</th><th>Action</th></tr>
        </thead>
        <tbody>
        <?php foreach ($images as $img): ?>
            <tr>
                <td><img src="<?= $img ?>" width="50"></td>
                <td><?= basename($img) ?></td>
                <td><?= pathinfo($img, PATHINFO_EXTENSION) ?></td>
                <td><?= filesize($img) ?> bytes</td>
                <td>
                    <a href="?delete=<?= urlencode(basename($img)) ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="upload.php">Back to Upload</a> | <a href="logout.php">Logout</a>
</div>
</body>
</html> 