<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM packages ORDER BY id DESC");
$stmt->execute();
$packages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>All packages</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<?php include 'common/sidebar.php' ?>
<?php include 'common/topbar.php' ?>

<div id="main-content">

<div class="admin-card">

<div class="section-header">
<h3 class="section-title">Packages</h3>
<a href="add_package.php" class="btn btn-primary btn-sm">Add Package</a>
</div>

<table class="admin-table">
<thead>
<tr>
<th>#</th>
<th>Package Name</th>
<th>Package Type</th>
<th>Add Ideal</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php $i=1; foreach ($packages as $row) { ?>

<tr>
<td>#<?= $i++ ?></td>

<td><?= htmlspecialchars($row['package_name']) ?></td>

<!-- PACKAGE TYPE DROPDOWN -->
<td>
<select class="form-select form-select-sm pack-type-dropdown"
        data-pack="<?= $row['id'] ?>">

<option value="">Select Type</option>

<?php
$stmt2 = $pdo->prepare("SELECT * FROM package_type WHERE pack_id=?");
$stmt2->execute([$row['id']]);
$types = $stmt2->fetchAll();

foreach ($types as $t) {
?>
<option value="<?= $t['id'] ?>">
    <?= htmlspecialchars($t['pack_type']) ?>
</option>
<?php } ?>

</select>
</td>

<!-- ADD IDEAL BUTTON -->
<td>

<?php
$packageName = strtolower($row['package_name']);
?>

<!-- SMM -->
<?php if ($packageName == 'smm') { ?>

    <button class="btn btn-info btn-sm add-feature-btn" data-pack="<?= $row['id'] ?>">Feature</button>

<?php } ?>

<!-- SEO -->
<?php if ($packageName == 'seo') { ?>

    <button class="btn btn-dark btn-sm add-web-btn" data-pack="<?= $row['id'] ?>">Website Review</button>
    <button class="btn btn-secondary btn-sm add-onpage-btn" data-pack="<?= $row['id'] ?>">OnPage SEO</button>
    <button class="btn btn-primary btn-sm add-local-btn" data-pack="<?= $row['id'] ?>">Local SEO</button>
    <button class="btn btn-danger btn-sm add-content-btn" data-pack="<?= $row['id'] ?>">Content</button>
    <button class="btn btn-success btn-sm add-email-btn" data-pack="<?= $row['id'] ?>">Email</button>
    <button class="btn btn-warning btn-sm add-offpage-btn" data-pack="<?= $row['id'] ?>">OffPage</button>
    <button class="btn btn-info btn-sm add-report-btn" data-pack="<?= $row['id'] ?>">Report</button>
    <button class="btn btn-dark btn-sm add-support-btn" data-pack="<?= $row['id'] ?>">Support</button>

<?php } ?>

<!-- DEVELOPMENT -->
<?php if ($packageName == 'development') { ?>

    <button class="btn btn-success btn-sm add-ideal-btn" data-pack="<?= $row['id'] ?>">Ideal</button>
    <button class="btn btn-info btn-sm add-feature-btn" data-pack="<?= $row['id'] ?>">Feature</button>
    <button class="btn btn-warning btn-sm add-addon-btn" data-pack="<?= $row['id'] ?>">Addon</button>

<?php } ?>

</td>

<td>
<a href="view_package.php?id=<?= $row['id'] ?>" class="btn-icon view"><i class="fas fa-eye"></i></a>
<a href="add_package.php?action=edit_package&id=<?= $row['id'] ?>" class="btn-icon edit"><i class="fas fa-edit"></i></a>
<a href="function.php?action=delete_package&id=<?= $row['id'] ?>" class="btn-icon delete" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
<a href="add_package_type.php?pack_id=<?= $row['id'] ?>"
                                            class="btn-icon"
                                            title="Add Package Type">
                                            <i class="fas fa-layer-group"></i>
                                            </a>
</td>

</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>
<script>
function goPage(className, page){
document.querySelectorAll(className).forEach(btn=>{
btn.addEventListener('click',function(){

let packId=this.dataset.pack;
let typeId=document.querySelector(`select[data-pack='${packId}']`).value;

if(!typeId){ alert('Select type'); return; }

window.location.href=`${page}?pack_id=${packId}&pack_type_id=${typeId}`;
});
});
}

// EXISTING
goPage('.add-web-btn','add_website_review.php');
goPage('.add-onpage-btn','add_onpage_seo.php');
goPage('.add-local-btn','add_local_seo.php');
goPage('.add-content-btn','add_content_marketing.php');
goPage('.add-email-btn','add_email_outreach.php');
goPage('.add-offpage-btn','add_offpage_seo.php');
goPage('.add-report-btn','add_monthly_reporting.php');
goPage('.add-support-btn','add_client_support.php');

// 🔥 ADD THESE (MISSING)
goPage('.add-ideal-btn','add_idealfor.php');
goPage('.add-feature-btn','add_features.php');
goPage('.add-addon-btn','add_addons.php');
</script>

</body>
</html>