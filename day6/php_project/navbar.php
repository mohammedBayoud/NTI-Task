<?php
$user = $_SESSION['user'] ?? '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="upload.php">Upload Product</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="view_uploads.php">Image Log Table</a></li>
        <li class="nav-item"><a class="nav-link" href="view_logins.php">Login Log Table</a></li>
      </ul>
      <div class="d-flex align-items-center">
        <span class="navbar-text text-white me-3">
          Welcome <?= htmlspecialchars($user) ?>
        </span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
      </div>
    </div>

  </div>
</nav>
