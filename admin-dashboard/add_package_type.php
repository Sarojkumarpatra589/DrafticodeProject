<?php
include 'connection/config.php';

$editMode = false;
$row = [];
$pack_id = $_GET['pack_id'] ?? null;

/* ================= GET PACKAGE NAME ================= */
$package = [];
if ($pack_id) {
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
    $stmt->execute([$pack_id]);
    $package = $stmt->fetch();
}

/* ================= EDIT MODE ================= */
if (isset($_GET['action']) && $_GET['action'] == "edit") {
    $editMode = true;
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM package_type WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    $pack_id = $row['pack_id']; // ensure pack_id stays
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $editMode ? 'Update Package Type' : 'Add Package Type' ?></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<?php include 'common/sidebar.php'; ?>
<?php include 'common/topbar.php'; ?>

<div id="main-content">

<div class="page-header">
    <h1 class="page-title">
        <?= $editMode ? 'Update Package Type' : 'Add Package Type' ?>
    </h1>
</div>

<div class="row">
<div class="col-lg-12">

<div class="admin-card">

<div class="section-header">
<h3 class="section-title">
<i class="fas fa-layer-group me-2"></i>

Package: <strong><?= htmlspecialchars($package['package_name'] ?? '') ?></strong>
</h3>
</div>

<!-- ================= FORM ================= -->
<form method="POST" action="function.php">

    <input type="hidden" name="pack_id" value="<?= $pack_id ?>">

    <?php if ($editMode) { ?>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <?php } ?>

    <div class="row g-3">

        <!-- Package Type -->
        <div class="col-md-6">
            <label class="form-label">Package Type</label>
            <input type="text"
                   name="pack_type"
                   class="form-control"
                   value="<?= $editMode ? htmlspecialchars($row['pack_type']) : '' ?>"
                   placeholder="Enter package type (Basic, Premium...)"
                   required>
        </div>

        <!-- Price -->
        <div class="col-md-6">
            <label class="form-label">Price</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   value="<?= $editMode ? $row['price'] : '' ?>"
                   placeholder="Enter price"
                   required>
        </div>

    </div>

    <div class="mt-3">
        <button type="submit"
                name="<?= $editMode ? 'update_package_type' : 'add_package_type' ?>"
                class="btn btn-primary">
            <?= $editMode ? 'Update' : 'Save' ?>
        </button>
    </div>

</form>

</div>

<!-- ================= TABLE ================= -->
<div class="admin-card mt-4">

<h4>Package Types List</h4>

<table class="table table-bordered mt-3">
<thead>
<tr>
    <th>#</th>
    <th>Type</th>
    <th>Price</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
$stmt = $pdo->prepare("SELECT * FROM package_type WHERE pack_id=?");
$stmt->execute([$pack_id]);
$data = $stmt->fetchAll();

foreach ($data as $key => $d) {
?>

<tr>
<td><?= $key + 1 ?></td>
<td><?= htmlspecialchars($d['pack_type']) ?></td>
<td><?= $d['price'] ?></td>

<td>
    <a href="add_package_type.php?action=edit&id=<?= $d['id'] ?>&pack_id=<?= $pack_id ?>"
       class="btn btn-sm btn-primary">
       <i class="fas fa-edit"></i>
    </a>

    <a href="function.php?action=delete_package_type&id=<?= $d['id'] ?>&pack_id=<?= $pack_id ?>"
       class="btn btn-sm btn-danger"
       onclick="return confirm('Delete this type?')">
       <i class="fas fa-trash"></i>
    </a>
</td>

</tr>

<?php } ?>

</tbody>
</table>
<div class="d-flex justify-content-end mt-3">
    <a href="package.php" class="btn btn-success">
        <i class="fas fa-check me-1"></i> Finish
    </a>
</div>

</div>

</div>
</div>

<?php include 'common/footer.php'; ?>

</body>
</html>