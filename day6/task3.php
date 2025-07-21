<?php
session_start();

$_SESSION['allowed_users'] = ['admin', 'mohammed', 'ahmed'];

function logLoginAttempt($username) {
    $logDir = "logs";
    if (!file_exists($logDir)) mkdir($logDir, 0777, true);
    
    $file = fopen("$logDir/login.log", "a");
    $time = date("Y-m-d H:i:s");
    fwrite($file, "Login Attempt - User: $username - Time: $time\n");
    fclose($file);
}

function logFileUpload($username, $type, $fullPath, $mime) {
    $logDir = "logs";
    if (!file_exists($logDir)) mkdir($logDir, 0777, true);
    
    $file = fopen("$logDir/uploads.log", "a");
    $time = date("Y-m-d H:i:s");
    fwrite($file, "Uploaded by: $username | Type: $type | Path: $fullPath | MIME: $mime | Time: $time\n");
    fclose($file);
}

$username = $_POST['username'] ?? '';
$fileType = $_POST['filetype'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    logLoginAttempt($username);

    if (!in_array($username, $_SESSION['allowed_users'])) {
        echo "<div class='alert alert-danger m-3'>Access Denied for user <strong>$username</strong></div>";
        exit;
    } else {
        echo "<div class='alert alert-success m-3'>Welcome <strong>$username</strong></div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file']) && in_array($username, $_SESSION['allowed_users'])) {
    $folder = "uploads/" . date('Y-m-d') . "/";
    if (!file_exists($folder)) mkdir($folder, 0777, true);

    $originalName = basename($_FILES['file']['name']);
    $mime = $_FILES['file']['type'];
    $ext = pathinfo($originalName, PATHINFO_EXTENSION);
    $newName = uniqid('file_', true) . '.' . $ext;
    $fullPath = $folder . time() . "_" . $newName;

    $allowed = ['image/jpeg', 'image/png'];

    if (in_array($mime, $allowed)) {
        move_uploaded_file($_FILES['file']['tmp_name'], $fullPath);
        logFileUpload($username, $fileType, $fullPath, $mime);
        echo "<div class='alert alert-success m-3'>File uploaded successfully to <code>$fullPath</code></div>";
    } else {
        echo "<div class='alert alert-warning m-3'>Invalid file type</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">File Manager</h2>

    <form method="POST" class="card p-4 mb-4">
        <h5>👤 Login</h5>
        <div class="mb-3">
            <label for="username" class="form-label">Username (admin / mohammed / ahmed)</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <button type="submit" name="login" class="btn btn-dark w-100">Login</button>
    </form>

    <?php if (isset($username) && in_array($username, $_SESSION['allowed_users'])): ?>
        <form method="POST" enctype="multipart/form-data" class="card p-4">
            <h5>Upload File</h5>
            <input type="hidden" name="username" value="<?= htmlspecialchars($username) ?>">
            <div class="mb-3">
                <label for="filetype" class="form-label">File Type (avatar / product)</label>
                <input type="text" name="filetype" id="filetype" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Choose File</label>
                <input type="file" name="file" id="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Upload</button>
        </form>
    <?php endif; ?>

</div>

</body>
</html>
