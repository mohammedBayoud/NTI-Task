<?php
require 'functions.php';
require_login();
$rows = [];
if (($fp = fopen('logs/login_log.csv', 'r')) !== false) {
    while (($data = fgetcsv($fp)) !== false) $rows[] = $data;
    fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Log</title>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container mt-5">
    <h2>Login Log</h2>
    <table class="table">
        <thead>
            <tr><th>Date</th><th>User</th><th>Status</th></tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row[0]) ?></td>
                <td><?= htmlspecialchars($row[1]) ?></td>
                <td>
                    <?php if ($row[2] === 'SUCCESS'): ?>
                        <span class="badge bg-success">SUCCESS</span>
                    <?php else: ?>
                        <span class="badge bg-danger">FAIL</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html> 