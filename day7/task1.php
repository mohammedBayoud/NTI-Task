<?php 
include("nav.php");

session_start();
$_SESSION['counter'] =($_SESSION['counter'] ?? 0 )+1;
?>
<p class="m-3">page visited: <span class="badge bg-primary"><?= $_SESSION['counter'] ?></span></p>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>task1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
</body>
</html>
