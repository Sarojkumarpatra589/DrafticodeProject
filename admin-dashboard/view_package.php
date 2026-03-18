<?php
include 'connection/config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid Package ID");
}

/* ================= FETCH PACKAGE ================= */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
$stmt->execute([$id]);
$package = $stmt->fetch();

/* ================= FETCH PRICING ================= */
$stmt2 = $pdo->prepare("SELECT * FROM pricing WHERE package_id=?");
$stmt2->execute([$id]);
$pricing = $stmt2->fetchAll();

/* ================= FETCH FEATURES ================= */
$stmt3 = $pdo->prepare("SELECT * FROM features WHERE package_id=?");
$stmt3->execute([$id]);
$features = $stmt3->fetchAll();

/* ================= FETCH ADDONS ================= */
$stmt4 = $pdo->prepare("SELECT * FROM addons WHERE package_id=?");
$stmt4->execute([$id]);
$addons = $stmt4->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Package</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

<div class="container mt-4">

<h2><?= htmlspecialchars($package['package_name']) ?></h2>

<!-- ================= PRICING ================= -->
<h4 class="mt-4">Pricing</h4>

<table class="table table-bordered">
<thead>
<tr>
    <th>Price</th>
    <th>Package Type</th>
    <th>Ideal For</th>
    <th>Delivery Time</th>
    <th>Action</th>
</tr>
</thead>

<tbody>
<?php foreach ($pricing as $p) { ?>
<tr>
    <td><?= htmlspecialchars($p['price']) ?></td>
     <td><?= htmlspecialchars($p['package_type']) ?></td>
    <td><?= htmlspecialchars($p['idealfor']) ?></td>
    <td><?= htmlspecialchars($p['delivery_time']) ?></td>
    <td>
        <a href="add_pricing.php?action=edit_pricing&id=<?= $p['id'] ?>" class="btn btn-sm btn-primary">
            <i class="fas fa-edit"></i>
        </a>
        <a href="function.php?action=delete_pricing&id=<?= $p['id'] ?>"
           class="btn btn-sm btn-danger"
           onclick="return confirm('Delete pricing?')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>

<!-- ================= FEATURES ================= -->
<h4 class="mt-4">Features</h4>

<ul class="list-group">
<?php foreach ($features as $f) { ?>
<li class="list-group-item d-flex justify-content-between align-items-center">
    
    <span><?= htmlspecialchars($f['features']) ?></span>

    <div>
        <button class="btn btn-sm btn-primary edit-feature"
            data-id="<?= $f['id'] ?>"
            data-text="<?= htmlspecialchars($f['features']) ?>">
            <i class="fas fa-edit"></i>
        </button>

        <a href="function.php?action=delete_feature&id=<?= $f['id'] ?>"
           class="btn btn-sm btn-danger"
           onclick="return confirm('Delete feature?')">
            <i class="fas fa-trash"></i>
        </a>
    </div>

</li>
<?php } ?>
</ul>

<!-- ================= ADDONS ================= -->
<h4 class="mt-4">Addons</h4>

<ul class="list-group">
<?php foreach ($addons as $a) { ?>
<li class="list-group-item d-flex justify-content-between align-items-center">

    <span><?= htmlspecialchars($a['addons']) ?></span>

    <div>
        <button class="btn btn-sm btn-primary edit-addon"
            data-id="<?= $a['id'] ?>"
            data-text="<?= htmlspecialchars($a['addons']) ?>">
            <i class="fas fa-edit"></i>
        </button>

        <a href="function.php?action=delete_addon&id=<?= $a['id'] ?>"
           class="btn btn-sm btn-danger"
           onclick="return confirm('Delete addon?')">
            <i class="fas fa-trash"></i>
        </a>
    </div>

</li>
<?php } ?>
</ul>

<div class="mt-4">
    <a href="package.php" class="btn btn-secondary">Back</a>
</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
// EDIT FEATURE
$(document).on('click', '.edit-feature', function() {

    var id = $(this).data('id');
    var text = $(this).data('text');

    var newText = prompt('Edit feature:', text);

    if (newText && newText.trim() !== '') {
        window.location.href = "function.php?action=update_feature&id=" + id + "&value=" + encodeURIComponent(newText);
    }
});

// EDIT ADDON
$(document).on('click', '.edit-addon', function() {

    var id = $(this).data('id');
    var text = $(this).data('text');

    var newText = prompt('Edit addon:', text);

    if (newText && newText.trim() !== '') {
        window.location.href = "function.php?action=update_addon&id=" + id + "&value=" + encodeURIComponent(newText);
    }
});
</script>

</body>
</html>