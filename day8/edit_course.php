<?php
include '../db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM courses WHERE id=$id");
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Edit Course</h2>
    <form action="update_course.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?= $row['title'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"><?= $row['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Hours</label>
            <input type="number" name="hours" class="form-control" value="<?= $row['hours'] ?>">
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="<?= $row['price'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="courses.php" class="btn btn-secondary">Back</a>
    </form>
</body>
</html>