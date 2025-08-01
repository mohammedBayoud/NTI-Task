<?php
include '../db.php';
$result = $conn->query("SELECT * FROM courses");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Courses List</h2>
    <a href="add_course.php" class="btn btn-success mb-3">Add Course</a>
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Hours</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['title'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><?= $row['hours'] ?></td>
            <td><?= $row['price'] ?></td>
            <td>
                <a href="edit_course.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="pdelete_course.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>