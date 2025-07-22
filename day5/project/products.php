<?php
session_start();

if (!isset($_SESSION['user'])) {
    $files = glob('uploads/*');
    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $desc = trim($_POST['description']);
    $images = [];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $idx => $tmp) {
            if ($_FILES['images']['error'][$idx] === 0) {
                $ext = pathinfo($_FILES['images']['name'][$idx], PATHINFO_EXTENSION);
                $filename = uniqid('prod_', true) . '.' . $ext;
                move_uploaded_file($tmp, 'uploads/' . $filename);
                $images[] = $filename;
            }
        }
    }

    $_SESSION['products'][] = [
        'name' => $name,
        'description' => $desc,
        'images' => $images,
        'added_by' => $_SESSION['user']['email']
    ];

    header('Location: products.php');
    exit();
}

$products = $_SESSION['products'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">

        <div class="card bg-dark text-light p-4 shadow mb-4">
            <h4>Add Product</h4>
            <form action="products.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" name="name" class="form-control" placeholder="Product Name" required>
                    </div>
                    <div class="col">
                        <input type="text" name="description" class="form-control" placeholder="Description" required>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </form>
        </div>

        <div class="row">
            <?php foreach (array_reverse($products) as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-secondary text-light h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['description']); ?></p>
                            <p class="card-text small text-muted">Added by: <?php echo htmlspecialchars($product['added_by']); ?></p>
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($product['images'] as $img): ?>
                                    <img src="uploads/<?php echo htmlspecialchars($img); ?>" style="height:100px;width:100px;object-fit:cover;" class="rounded">
                                <?php endforeach; ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    
</body>
</html>
