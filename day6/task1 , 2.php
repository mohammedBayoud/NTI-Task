<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order & Text Analyzer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-center mb-4">🧾 Order Summary & 🧠 Text Analyzer</h2>

    <form method="POST" class="card p-4 mb-4">
        <h5>tax</h5>
        <div class="mb-3">
            <label for="price" class="form-label">Item Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" name="order_submit" class="btn btn-primary w-100">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["order_submit"])) {
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];

        function calculateTotal($price, $quantity) {
            return $price * $quantity;
        }

        $total = calculateTotal($price, $quantity);
        $calculate_tax = fn($amount) => $amount * 0.14;
        $tax = $calculate_tax($total);
        $totalWithTax = $total + $tax;

        echo "<div class='alert alert-info'>";
        echo "<h5>Order Result</h5>";
        echo "<p><strong>Price:</strong> $total EGP</p>";
        echo "<p><strong>Tax (14%):</strong> $tax EGP</p>";
        echo "<p><strong>Total with Tax:</strong> $totalWithTax EGP</p>";
        echo "</div>";
    }
    ?>
<!-- task 2 -->
    <div class="card p-4 mt-4">
        <h5>str</h5>

        <?php
        $sentence = "My name is mohammed ahmed BAYOUD";

        $len = strlen($sentence);
        $censored = str_replace("Mohammed", "magdi", $sentence);
        $first = substr($sentence, 0, 10);
        $ucFirst = ucfirst($sentence);
        $upper = strtoupper($sentence);

        echo "<div class='alert alert-secondary mt-3'>";
        echo "<p><strong>main:</strong> $sentence</p>";
        echo "<p><strong>len:</strong> $len</p>";
        echo "<p><strong>replace:</strong> $censored</p>";
        echo "<p><strong>substr:</strong> $first</p>";
        echo "<p><strong>Ucfirst:</strong> $ucFirst</p>";
        echo "<p><strong>strtoupper:</strong> $upper</p>";
        echo "</div>";
        ?>
    </div>

</div>

</body>
</html>
