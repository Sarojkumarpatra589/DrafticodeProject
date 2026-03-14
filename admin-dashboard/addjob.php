<?php
include 'connection/config.php';

$editMode = false;
$row = [];

/* CHECK EDIT MODE */
if (isset($_GET['id'])) {
  $editMode = true;
  $id = $_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM jobs WHERE id=?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Edit Job' : 'Add Job' ?> — Drafticode</title>

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
      <h1 class="page-title"><?= $editMode ? 'Edit Job' : 'Add Job' ?></h1>
    </div>

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-suitcase me-2 text-primary-custom"></i>
          <?= $editMode ? 'Update Job' : 'Post New Job' ?>
        </h3>
      </div>

      <form method="POST" action="function.php" enctype="multipart/form-data">

        <?php if ($editMode) { ?>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
        <?php } ?>

        <div class="row g-3">

          <div class="col-md-8">
            <label class="form-label">Job Title</label>
            <input type="text" class="form-control" name="title"
              value="<?= $editMode ? htmlspecialchars($row['title']) : '' ?>" required>
          </div>

          <div class="col-md-4">
            <label class="form-label">Job Type</label>
            <select class="form-select" name="type">

              <option <?= ($editMode && $row['type'] == 'Full Time') ? 'selected' : '' ?>>Full Time</option>
              <option <?= ($editMode && $row['type'] == 'Part Time') ? 'selected' : '' ?>>Part Time</option>
              <option <?= ($editMode && $row['type'] == 'Contract') ? 'selected' : '' ?>>Contract</option>
              <option <?= ($editMode && $row['type'] == 'Freelance') ? 'selected' : '' ?>>Freelance</option>
              <option <?= ($editMode && $row['type'] == 'Remote') ? 'selected' : '' ?>>Remote</option>

            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" name="location"
              value="<?= $editMode ? htmlspecialchars($row['location']) : '' ?>" required>
          </div>

          <div class="col-md-3">
            <label class="form-label">Salary Min</label>
            <input type="text" class="form-control" name="salary_min"
              value="<?= $editMode ? $row['salary_min'] : '' ?>">
          </div>

          <div class="col-md-3">
            <label class="form-label">Salary Max</label>
            <input type="text" class="form-control" name="salary_max"
              value="<?= $editMode ? $row['salary_max'] : '' ?>">
          </div>

          <div class="col-md-6">
            <label class="form-label">Department</label>
            <input type="text" class="form-control" name="department"
              value="<?= $editMode ? $row['department'] : '' ?>">
          </div>

          <div class="col-md-6">
            <label class="form-label">Deadline</label>
            <input type="date" class="form-control" name="deadline"
              value="<?= $editMode ? $row['deadline'] : '' ?>">
          </div>

          <div class="col-md-6">

            <label class="form-label">Job Image</label>
            <input type="file" name="image" class="form-control">

            <?php if ($editMode && !empty($row['image'])) { ?>
              <div class="mt-2">
                <img src="../upload/<?= $row['image'] ?>" width="120">
              </div>
            <?php } ?>

          </div>

          <div class="col-md-6">
            <label class="form-label">Status</label>

            <select class="form-select" name="status">

              <option <?= ($editMode && $row['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
              <option <?= ($editMode && $row['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
              <option <?= ($editMode && $row['status'] == 'Closed') ? 'selected' : '' ?>>Closed</option>

            </select>

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



        </div>

        <div class="pt-3">

          <button type="submit"
            name="<?= $editMode ? 'update_job' : 'add_job' ?>"
            class="btn btn-primary">

            <i class="fas fa-save me-2"></i>

            <?= $editMode ? 'Update Job' : 'Save Job' ?>

          </button>

        </div>

      </form>

    </div>
  </div>


  <?php include 'common/footer.php' ?>

</body>

</html>