<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product price</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark-subtle">
    <?php
    $courses = ["Monitor" => 1200, "Chair" => 1000, "Headset" => 400, "Keyboard" => 300,"Mouse" => 150];
    arsort($courses);
    ?>
    <div class="container mt-4">
        <h4 class="text-danger">Product price</h4>
        <ul class="list-group">
            <?php foreach ($courses as $course => $EGP): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span><?= $course ?></span>
                    <span class="badge bg-black rounded-pill"><?= $EGP ?> EGP</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>