<?php
$user = $_SESSION['user'] ?? '';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="upload.php">Upload Product</a></li>
      <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
      <li class="nav-item"><a class="nav-link" href="view_uploads.php">Image Log Table</a></li>
      <li class="nav-item"><a class="nav-link" href="view_logins.php">Login Log Table</a></li>
    </ul>
    <span class="navbar-text mr-5">Welcome <?= htmlspecialchars($user) ?></span>
    <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav> 