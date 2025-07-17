<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product price</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-dark-subtle">
    <?php
    $Employes = ["Mona" => 6000, "Tark" => 7000, "ziad" => 5500];
    $HighSalary = array_filter($Employes, function($salary){
        return  $salary > 5000;
    });
    ?>
    <div class="container mt-4">
        <h4 class="text-danger">High Salary Employes</h4>
        <ul class="list-group">
            <?php foreach ($HighSalary as $Employe => $EGP): ?>
                <li class="list-group-item d-flex justify-content-between">
                    <span><?= $Employe ?></span>
                    <span class="badge bg-black rounded-pill"><?= $EGP ?> EGP</span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>