<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task 1 - Server Info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h3 class="mb-4">Server Info</h3>

    <ul class="list-group">
      <li class="list-group-item">
        <strong>Script Name:</strong> <?= $_SERVER['PHP_SELF'] ?>
      </li>
      <li class="list-group-item">
        <strong>User IP:</strong> <?= $_SERVER['REMOTE_ADDR'] ?>
      </li>
      <li class="list-group-item">
        <strong>User Agent:</strong> <?= $_SERVER['HTTP_USER_AGENT'] ?>
      </li>
      <li class="list-group-item">
        <strong>Request Method:</strong> <?= $_SERVER['REQUEST_METHOD'] ?>
      </li>
    </ul>
  </div>

</body>
</html>
