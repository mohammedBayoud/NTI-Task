<?php
require 'functions.php';
require_login();
$rows = [];
if (($fp = fopen('logs/upload_log.csv', 'r')) !== false) {
    while (($data = fgetcsv($fp)) !== false) $rows[] = $data;
    fclose($fp);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Upload Log</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <h2>Upload Log</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Type</th>
                    <th>Path</th>
                    <th>MIME</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row[0]) ?></td>
                        <td><?= htmlspecialchars($row[1]) ?></td>
                        <td>
                            <?php if ($row[2] === 'avatar'): ?>
                                <span class="badge bg-info text-dark">avatar</span>
                            <?php elseif ($row[2] === 'product'):?>
                                <span class="badge bg-info text-dark">product</span>
                            <?php else: ?>
                                <span class="badge bg-secondary"><?= htmlspecialchars($row[2]) ?></span>
                            <?php endif; ?>
                        </td>
                        <td> <span class="text-danger"><?= htmlspecialchars($row[3]) ?></span></td>
                        <td><?= htmlspecialchars($row[4]) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>