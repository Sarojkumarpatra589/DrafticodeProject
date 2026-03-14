<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['action']) && $_GET['action'] == "edit_product") {

  $editMode = true;
  $id = $_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
  $stmt->execute([$id]);
  $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'update_product' : 'add_product' ?></title>

  <link rel="icon" type="image/png" href="assets/images/fav.png">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>

  <?php include 'common/sidebar.php' ?>
  <?php include 'common/topbar.php' ?>

  <div id="main-content">

    <div class="page-header">
      <h1 class="page-title"><?= $editMode ? 'Update Product' : 'Add Product' ?></h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-12">

        <div class="admin-card">

          <div class="section-header">
            <h3 class="section-title">
              <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
              <?= $editMode ? 'Update Product' : 'Add New Product' ?>
            </h3>
          </div>

          <form method="POST" action="function.php" enctype="multipart/form-data">

            <?php if ($editMode) { ?>

              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

            <?php } ?>

            <div class="row g-3">

              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Product Title</label>

                  <input type="text"
                    class="form-control"
                    name="title"
                    value="<?= $editMode ? htmlspecialchars($row['title']) : '' ?>"
                    placeholder="Enter product title"
                    required>

                </div>
              </div>

              <div class="col-12">
                <div class="mb-3">

                  <label class="form-label">Product Image</label>

                  <input type="file"
                    class="form-control"
                    name="image"
                    id="productImageUpload"
                    accept="image/*">

                  <div class="mt-2" id="productPreview">

                    <?php if ($editMode && !empty($row['image'])) { ?>

                      <img src="../upload/<?= $row['image'] ?>" width="200">

                    <?php } ?>

                  </div>

                </div>
              </div>

              <div class="col-12">
                <div class="mb-3">

                  <label class="form-label">Short Description</label>

                  <textarea
                    class="form-control"
                    name="short_description"
                    rows="3"><?= $editMode ? htmlspecialchars($row['short_description']) : '' ?></textarea>

                </div>
              </div>

              <div class="col-12">
  <div class="mb-3">
    <label class="form-label">Project Description</label>

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
document.querySelector("form").addEventListener("submit", function () {
    for (let instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
});
</script>

            </div>

            <div class="d-flex gap-2 pt-2">

              <button
                type="submit"
                name="<?= $editMode ? 'update_product' : 'add_product' ?>"
                class="btn btn-primary">

                <i class="fas fa-save me-2"></i>
                <?= $editMode ? 'Update' : 'Save' ?>

              </button>

              <button type="reset" class="btn btn-secondary">Reset</button>

            </div>

          </form>

        </div>
      </div>
    </div>
    <script>
      document.getElementById("productImageUpload").addEventListener("change", function() {

        let preview = document.getElementById("productPreview");
        preview.innerHTML = "";

        let file = this.files[0];

        if (file) {

          let reader = new FileReader();

          reader.onload = function(e) {

            preview.innerHTML = '<img src="' + e.target.result + '" width="200">';

          }

          reader.readAsDataURL(file);

        }

      });
    </script>
    <?php include 'common/footer.php' ?>

</body>

</html>