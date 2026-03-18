<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['action']) && $_GET['action'] == "edit_package") {
    $editMode = true;
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Update Package' : 'Add Package' ?></title>

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
      <h1 class="page-title"><?= $editMode ? 'Update Package' : 'Add Package' ?></h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-12">

        <div class="admin-card">

          <div class="section-header">
            <h3 class="section-title">
              <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
              <?= $editMode ? 'Update Package' : 'Add New Package' ?>
            </h3>
          </div>

          <form method="POST" action="function.php">

            <?php if ($editMode) { ?>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <?php } ?>

            <div class="row g-3">

              <!-- Package Name -->
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Package Name</label>
                  <input type="text"
                         class="form-control"
                         name="package_name"
                         value="<?= $editMode ? htmlspecialchars($row['package_name']) : '' ?>"
                         placeholder="Enter package name"
                         required>
                </div>
              </div>

            </div>

            <div class="d-flex gap-2 pt-2">
              <button type="submit"
                      name="<?= $editMode ? 'update_package' : 'add_package' ?>"
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

    <?php include 'common/footer.php' ?>

</body>

</html>