<?php
include 'connection/config.php';

$table = "onpage_seo";
$title = "onpage seo";

$editMode = false;
$row = [];

$pack_id = $_GET['pack_id'] ?? null;
$type_id = $_GET['pack_type_id'] ?? null;

/* PACKAGE */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
$stmt->execute([$pack_id]);
$package = $stmt->fetch();

/* TYPE */
$stmt = $pdo->prepare("SELECT * FROM package_type WHERE id=?");
$stmt->execute([$type_id]);
$type = $stmt->fetch();

/* EDIT */
if (isset($_GET['action']) && $_GET['action'] == "edit") {
    $editMode = true;
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM $table WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= $title ?></title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<?php include 'common/sidebar.php' ?>
<?php include 'common/topbar.php' ?>

<div id="main-content">

<!-- PAGE HEADER -->
<div class="page-header">
    <h1 class="page-title">
        <?= $editMode ? "Update $title" : "Add $title" ?>
    </h1>
</div>

<div class="row justify-content-center">
<div class="col-lg-12">

<!-- ================= FORM ================= -->
<div class="admin-card">

<div class="section-header">
    <h3 class="section-title">
        <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
        <?= $editMode ? "Update $title" : "Add $title" ?>
    </h3>

    <div>
        <strong>Package:</strong> <?= htmlspecialchars($package['package_name']) ?><br>
        <strong>Type:</strong> <?= htmlspecialchars($type['pack_type']) ?>
    </div>
</div>

<form method="POST" action="function.php">

<input type="hidden" name="table" value="<?= $table ?>">
<input type="hidden" name="pack_id" value="<?= $pack_id ?>">
<input type="hidden" name="pack_type_id" value="<?= $type_id ?>">

<?php if ($editMode) { ?>
<input type="hidden" name="id" value="<?= $row['id'] ?>">
<?php } ?>

<div class="row g-3">

<!-- VALUE -->
<div class="col-md-8">
    <label class="form-label"><?= $title ?> Value</label>
    <input type="text"
           name="value"
           class="form-control"
           value="<?= $editMode ? htmlspecialchars($row['value']) : '' ?>"
           placeholder="Enter <?= $title ?>"
           required>
</div>

<!-- STATUS -->
<div class="col-md-4">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
        <option value="1" <?= ($editMode && $row['status']==1) ? 'selected' : '' ?>>Active</option>
        <option value="0" <?= ($editMode && $row['status']==0) ? 'selected' : '' ?>>Inactive</option>
    </select>
</div>

</div>

<div class="d-flex gap-2 pt-3">
    <button type="submit"
        name="<?= $editMode ? 'update_dynamic' : 'add_dynamic' ?>"
        class="btn btn-primary">
        <i class="fas fa-save me-2"></i>
        <?= $editMode ? 'Update' : 'Save' ?>
    </button>

    <button type="reset" class="btn btn-secondary">Reset</button>
</div>

</form>

</div>

<!-- ================= LIST ================= -->
<div class="admin-card mt-4">

<div class="section-header">
    <h3 class="section-title">
        <i class="fas fa-list me-2 text-primary-custom"></i>
        <?= $title ?> List
    </h3>
</div>

<div class="table-responsive">
<table class="table table-bordered">

<thead>
<tr>
    <th>#</th>
    <th>Value</th>
    <th>Status</th>
    <th>Action</th>
</tr>
</thead>

<tbody>

<?php
$stmt = $pdo->prepare("SELECT * FROM $table WHERE pack_id=? AND pack_type_id=?");
$stmt->execute([$pack_id, $type_id]);
$data = $stmt->fetchAll();

foreach ($data as $k => $d) {
?>

<tr>
<td><?= $k + 1 ?></td>

<td><?= htmlspecialchars($d['value']) ?></td>

<td>
    <?= $d['status'] ? 
        '<span class="badge bg-success">Active</span>' : 
        '<span class="badge bg-danger">Inactive</span>' ?>
</td>

<td>
<div class="d-flex gap-1">

<a href="?action=edit&id=<?= $d['id'] ?>&pack_id=<?= $pack_id ?>&pack_type_id=<?= $type_id ?>"
class="btn-icon edit">
<i class="fas fa-edit"></i>
</a>

<a href="function.php?action=delete_dynamic&id=<?= $d['id'] ?>&table=<?= $table ?>&pack_id=<?= $pack_id ?>&pack_type_id=<?= $type_id ?>"
class="btn-icon delete"
onclick="return confirm('Delete?')">
<i class="fas fa-trash"></i>
</a>

</div>
</td>

</tr>

<?php } ?>

</tbody>
</table>
</div>

<div class="d-flex justify-content-end mt-3">
<a href="package.php" class="btn btn-success">
<i class="fas fa-check me-1"></i> Finish
</a>
</div>

</div>

</div>
</div>

</div>

<?php include 'common/footer.php' ?>

</body>
</html>