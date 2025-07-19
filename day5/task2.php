<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Server Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <?php
    if ($_SERVER['HTTP_HOST'] !== 'localhost') {
        header("Location: denied.php");
    }

    echo '<div class="alert alert-success m-3">Access OK: GOOD host.</div>';
    ?>
</body>

</html>
