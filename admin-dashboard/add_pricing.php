<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['action']) && $_GET['action'] == "edit_pricing") {
    $editMode = true;
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM pricing WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}

// Fetch packages for dropdown
$packages = $pdo->query("SELECT id, package_name FROM packages ORDER BY package_name ASC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Update Pricing' : 'Add Pricing' ?></title>

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
      <h1 class="page-title"><?= $editMode ? 'Update Pricing' : 'Add Pricing' ?></h1>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-12">

        <div class="admin-card">

          <div class="section-header">
            <h3 class="section-title">
              <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
              <?= $editMode ? 'Update Pricing' : 'Add New Pricing' ?>
            </h3>
          </div>

          <form method="POST" action="function.php" enctype="multipart/form-data">

            <?php if ($editMode) { ?>
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <?php } ?>

            <div class="row g-3">

              <!-- Package Dropdown -->
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Select Package</label>
                  <select name="package_id" class="form-control" required>
                    <option value="">-- Select Package --</option>
                    <?php foreach ($packages as $package): ?>
                        <option value="<?= $package['id'] ?>" <?= $editMode && $row['package_id'] == $package['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($package['package_name']) ?>
                        </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <!-- Price -->
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Price</label>
                  <input type="text"
                         class="form-control"
                         name="price"
                         value="<?= $editMode ? htmlspecialchars($row['price']) : '' ?>"
                         placeholder="Enter price"
                         required>
                </div>
              </div>

              <!-- Ideal For -->
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Ideal For</label>
                  <input type="text"
                         class="form-control"
                         name="idealfor"
                         value="<?= $editMode ? htmlspecialchars($row['idealfor']) : '' ?>"
                         placeholder="Who is this package ideal for">
                </div>
              </div>

              <!-- Delivery Time -->
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Delivery Time</label>
                  <input type="text"
                         class="form-control"
                         name="delivery_time"
                         value="<?= $editMode ? htmlspecialchars($row['delivery_time']) : '' ?>"
                         placeholder="Enter delivery time">
                </div>
              </div>

              </div>

            </div>

            <div class="d-flex gap-2 pt-2">
              <button type="submit"
                      name="<?= $editMode ? 'update_pricing' : 'add_pricing' ?>"
                      class="btn btn-primary">
                <i class="fas fa-save me-2"></i>
                <?= $editMode ? 'Update' : 'Next' ?>
              </button>
            </div>

          </form>

        </div>
      </div>
    </div>

    <?php include 'common/footer.php' ?>

</body>

</html>