  <?php
    $products = [
        ["name" => "Laptop", "price" => 15000, "quantity" => 3],
        ["name" => "Phone", "price" => 8000, "quantity" => 5],
        ["name" => "Tablet", "price" => 6000, "quantity" => 2],
    ];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-success text-white py-5">

<div class="container">

  

    <table class="table table-striped table-bordered bg-white text-dark mb-5">
        <thead class="table-dark text-center">
            <tr>
                <th>Name</th>
                <th>Price (EGP)</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php foreach($products as $product): ?>
                <tr>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>



    <!-- Task3 -->
    <?php
    $employee = [
        "Name" => "Mohammed Hassan",
        "Job Title" => "Frontend Developer",
        "Department" => "UI/UX",
        "Salary" => "10,00000 EGP"
    ];
    ?>

    <ul class="list-group bg-white text-dark rounded">
        <?php foreach($employee as $key => $value): ?>
            <li class="list-group-item">
                <strong><?= $key ?>:</strong> <?= $value ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
