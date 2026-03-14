<?php
include 'connection/config.php';

$editMode = isset($_GET['action']) && $_GET['action'] == 'edit_slider';
$row = [];

if ($editMode && isset($_GET['id'])) {
  $id = (int)$_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM slider WHERE id=?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Update Slider' : 'Add Slider' ?></title>
  <link rel="icon" type="image/png" href="assets/images/fav.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>

  <?php include 'common/sidebar.php' ?>
  <?php include 'common/topbar.php' ?>

  <div id="main-content">

    <div class="page-header">

      <h1 class="page-title"><?= $editMode ? 'Update Slider' : 'Add Slider' ?></h1>

    </div>

    <div class="row justify-content-center">

      <div class="col-lg-12">

        <div class="admin-card">

          <div class="section-header">

            <h3 class="section-title">

              <i class="fas fa-plus-circle me-2 text-primary-custom"></i>

              <?= $editMode ? 'Update Slider' : 'Add New Slider' ?>

            </h3>

          </div>

          <form action="function.php" method="POST" enctype="multipart/form-data">

            <?php if ($editMode): ?>

              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

            <?php endif; ?>


            <div class="row g-3">

              <!-- IMAGE -->
              <div class="col-12">

                <label class="form-label">Slider Image</label>

                <input type="file" name="image" class="form-control" id="imageUpload">

                <div class="mt-3" id="preview">

                  <?php if ($editMode && !empty($row['image'])): ?>

                    <img src="../upload/<?= $row['image'] ?>" width="200">

                  <?php endif; ?>

                </div>

              </div>


              <!-- TITLE -->
              <div class="col-md-12">

                <label class="form-label">Slider Title</label>

                <input type="text"
                  class="form-control"
                  name="title"
                  required
                  value="<?= $editMode ? htmlspecialchars($row['title']) : '' ?>">

              </div>


              <!-- DESCRIPTION -->
              <div class="col-12">
                <div class="mb-3">
                  <label class="form-label">Slider Description</label>

                  <textarea
                    id="description"
                    class="form-control"
                    name="description"
                    rows="5"
                    style="min-height:140px"><?= $editMode ? htmlspecialchars($row['description'] ?? '') : '' ?></textarea>

                </div>
              </div>


              <script src="ckeditor/ckeditor.js"></script>

              <script>
                CKEDITOR.replace('description', {
                  height: 300
                });

                // update textarea when form submits
                document.querySelector("form").addEventListener("submit", function() {
                  for (let instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                  }
                });
              </script>


              <div class="mt-4">

                <button type="submit"
                  name="<?= $editMode ? 'update_slider' : 'add_slider' ?>"
                  class="btn btn-primary">

                  <?= $editMode ? 'Update Slider' : 'Add Slider' ?>

                </button>

              </div>

          </form>

        </div>
      </div>
    </div>

  </div>


  <script>
    document.getElementById("imageUpload").addEventListener("change", function() {

      const file = this.files[0];
      if (!file) return;

      const reader = new FileReader();

      reader.onload = function(e) {
        document.getElementById("preview").innerHTML =
          '<img src="' + e.target.result + '" width="200">';
      };

      reader.readAsDataURL(file);

    });
  </script>

  <?php include 'common/footer.php' ?>

</body>

</html>