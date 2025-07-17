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
                <?php if ($product['price'] > 7000): ?>
                    <tr>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['quantity'] ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>
