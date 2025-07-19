<?php
$imageName = '';
$docName = '';
$imageError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];

        if ($imageType !== 'image/jpeg' && $imageType !== 'image/png') {
            $imageError = "Only JPG and PNG images are allowed.";
            $imageName = '';
        } elseif ($imageSize > 15728640) { // 15MB
            $imageError = "Image is too large. Max size is 15MB.";
            $imageName = '';
        } else {
            move_uploaded_file($imageTmp, "uploads/$imageName");

            if (isset($_FILES['doc']) && $_FILES['doc']['error'] === 0) {
                $docName = $_FILES['doc']['name'];
                $docTmp = $_FILES['doc']['tmp_name'];
                move_uploaded_file($docTmp, "uploads/$docName");
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body">
            <h3 class="mb-4 text-center">Upload Image and File</h3>

            <?php if ($imageError): ?>
              <div class="alert alert-danger"><?= $imageError ?></div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label">Image (JPG, PNG, max 15MB)</label>
                <input type="file" name="image" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Other File</label>
                <input type="file" name="doc" class="form-control">
              </div>
              <div class="d-grid">
                <button class="btn btn-success">Upload</button>
              </div>
            </form>

            <?php if ($imageName): ?>
              <div class="mt-4">
                <p>Image uploaded: <?= $imageName ?></p>
                <img src="uploads/<?= $imageName ?>" class="img-thumbnail" width="200">
              </div>
            <?php endif; ?>

            <?php if ($docName): ?>
              <div class="mt-3">
                <p>File uploaded: <a href="uploads/<?= $docName ?>" target="_blank"><?= $docName ?></a></p>
              </div>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
