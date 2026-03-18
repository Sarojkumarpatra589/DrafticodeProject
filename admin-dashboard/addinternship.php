<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['id'])) {
  $editMode = true;
  $id = $_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM internships WHERE id=?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Edit Internship' : 'Add Internship' ?> — Drafticode</title>

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
      <h1 class="page-title"><?= $editMode ? 'Edit Internship' : 'Add Internship' ?></h1>
    </div>

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-user-graduate me-2 text-primary-custom"></i>
          <?= $editMode ? 'Update Internship' : 'Post Internship' ?>
        </h3>
      </div>

      <form method="POST" action="function.php">

        <?php if ($editMode) { ?>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <?php } ?>

        <div class="row g-3">

          <div class="col-md-8">
            <label class="form-label">Internship Title</label>
            <input type="text" name="title" class="form-control"
              value="<?= $editMode ? htmlspecialchars($row['title']) : '' ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Department</label>

            <select class="form-select" name="department">

              <option <?= ($editMode && $row['department'] == 'Engineering') ? 'selected' : '' ?>>Development</option>
              <option <?= ($editMode && $row['department'] == 'Design') ? 'selected' : '' ?>>Design</option>
              <option <?= ($editMode && $row['department'] == 'Marketing') ? 'selected' : '' ?>>Marketing</option>
              <option <?= ($editMode && $row['department'] == 'Business') ? 'selected' : '' ?>>Business</option>
              <option <?= ($editMode && $row['department'] == 'HR') ? 'selected' : '' ?>>HR</option>

            </select>

          </div>

          <div class="col-md-4">
            <label class="form-label">Duration</label>
            <input type="text" name="duration" class="form-control"
              value="<?= $editMode ? $row['duration'] : '' ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Stipend</label>
            <input type="text" name="stipend" class="form-control"
              value="<?= $editMode ? $row['stipend'] : '' ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control"
              value="<?= $editMode ? $row['location'] : '' ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control"
              value="<?= $editMode ? $row['deadline'] : '' ?>" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Openings</label>
            <input type="number" name="openings" class="form-control"
              value="<?= $editMode ? $row['openings'] : '' ?>">
          </div>

          <div class="col-12">
            <div class="mb-3">
              <label class="form-label">Job Description</label>

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
          <div class="col-12">
            <div class="mb-3">
              <label class="form-label">Requirements</label>

              <textarea
                id="requirements"
                class="form-control"
                name="requirements"
                rows="5"
                style="min-height:140px"><?= $editMode ? htmlspecialchars($row['description'] ?? '') : '' ?></textarea>

            </div>
          </div>


          <script src="ckeditor/ckeditor.js"></script>

          <script>
            CKEDITOR.replace('requirements', {
              height: 300
            });

            // update textarea when form submits
            document.querySelector("form").addEventListener("submit", function() {
              for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
              }
            });
          </script>

          <div class="col-md-4">

            <label class="form-label">Status</label>

            <select class="form-select" name="status">

              <option <?= ($editMode && $row['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
              <option <?= ($editMode && $row['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
              <option <?= ($editMode && $row['status'] == 'Closed') ? 'selected' : '' ?>>Closed</option>

            </select>

          </div>
          <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Slug (SEO URL)</label>

                  <input type="text"
                    class="form-control"
                    name="slug"
                    value="<?= $editMode ? htmlspecialchars($row['slug'] ?? '') : '' ?>"
                    placeholder="example-blog-title">

                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Title</label>

                  <input type="text"
                    class="form-control"
                    name="meta_title"
                    value="<?= $editMode ? htmlspecialchars($row['meta_title'] ?? '') : '' ?>">

                </div>
              </div>


              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Keywords</label>

                  <textarea
                    class="form-control"
                    name="meta_keywords"
                    rows="2"><?= $editMode ? htmlspecialchars($row['meta_keywords'] ?? '') : '' ?></textarea>

                </div>
              </div>


              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Description</label>

                  <textarea
                    class="form-control"
                    name="meta_description"
                    rows="3"><?= $editMode ? htmlspecialchars($row['meta_description'] ?? '') : '' ?></textarea>

                </div>
              </div>

        </div>

        <div class="pt-3">

          <button type="submit"
            name="<?= $editMode ? 'update_internship' : 'add_internship' ?>"
            class="btn btn-primary">

            <i class="fas fa-save me-2"></i>

            <?= $editMode ? 'Update' : 'Save' ?>

          </button>

        </div>

      </form>

    </div>

  </div>

  <script src="https://cdn.ckeditor.com/4.25.1-lts/standard/ckeditor.js"></script>

  <script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('requirements');
  </script>

  <?php include 'common/footer.php' ?>

</body>

</html>