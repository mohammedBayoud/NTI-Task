<?php
session_start();

if (isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    if ($name && $email) {
        $_SESSION['users'][] = ['name' => $name, 'email' => $email];
    }
}

if (isset($_POST['remove_last'])) {
    if (!empty($_SESSION['users'])) {
        array_pop($_SESSION['users']);
    }
}

if (isset($_POST['clear'])) {
    unset($_SESSION['users']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Day 7: Task 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">

                <form method="post" class="row g-3 mb-3">
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="col-md-5">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-2 d-grid w-100">
                        <button type="submit" name="save" class="btn btn-success">Save</button>
                    </div>
                </form>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex gap-3">
                            <form method="post" class="flex-fill">
                                <button type="submit" name="clear" class="btn btn-danger w-100">Clear Session</button>
                            </form>
                            <form method="post" class="flex-fill">
                                <button type="submit" name="remove_last" class="btn btn-warning w-100">Remove Last</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (empty($_SESSION['users'])): ?>
                <div class="alert alert-danger">No users!</div>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>user name</th>
                            <th>user email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['users'] as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
    </div>
    </div>
</body>

</html>