<?php
include 'connection/config.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid Package ID");
}

/* PACKAGE */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
$stmt->execute([$id]);
$package = $stmt->fetch();

/* TYPES */
$stmt = $pdo->prepare("SELECT * FROM package_type WHERE pack_id=?");
$stmt->execute([$id]);
$types = $stmt->fetchAll();

/* IDEAL */
$stmt = $pdo->prepare("SELECT * FROM ideal_for WHERE pack_id=?");
$stmt->execute([$id]);
$ideals = $stmt->fetchAll();

/* FEATURES */
$stmt = $pdo->prepare("SELECT * FROM features WHERE pack_id=?");
$stmt->execute([$id]);
$features = $stmt->fetchAll();

/* ADDONS */
$stmt = $pdo->prepare("SELECT * FROM addons WHERE pack_id=?");
$stmt->execute([$id]);
$addons = $stmt->fetchAll();

/* GROUP FUNCTION */
function groupByType($data) {
    $arr = [];
    foreach ($data as $d) {
        $arr[$d['pack_type_id']][] = $d;
    }
    return $arr;
}

$idealGroup   = groupByType($ideals);
$featureGroup = groupByType($features);
$addonGroup   = groupByType($addons);

/* SEO TABLES */
$seoTables = [
    'website_review',
    'onpage_seo',
    'local_seo',
    'content_marketing',
    'email_outreach',
    'offpage_seo',
    'monthly_reporting',
    'client_support'
];

$seoData = [];

foreach ($seoTables as $table) {
    $stmt = $pdo->prepare("SELECT * FROM $table WHERE pack_id=?");
    $stmt->execute([$id]);
    $seoData[$table] = groupByType($stmt->fetchAll());
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>
.pricing-card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: 0.3s;
    height: 100%;
}
.pricing-card:hover { transform: translateY(-5px); }

.pricing-header {
    color: #fff;
    text-align: center;
    padding: 25px;
}
.price { font-size: 28px; font-weight: bold; }

.pricing-body { padding: 20px; background: #fff; }

.list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
    padding: 6px 0;
}
</style>

</head>

<body>

<div class="container-fluid mt-5">

<h2 class="text-center mb-4 fw-bold">
<?= htmlspecialchars($package['package_name']) ?>
</h2>

<hr>

<div class="row">

<?php
$colors = ['#f7b731','#fa8231','#eb3b5a','#a55eea'];
$i = 0;

foreach ($types as $t):

$color = $colors[$i % count($colors)];
?>

<div class="col-md-3 mb-4">

<div class="pricing-card">

<div class="pricing-header position-relative" style="background: <?= $color ?>">

<!-- TYPE ACTION -->
<div style="position:absolute; top:10px; right:10px;">
    <a href="add_package_type.php?action=edit&id=<?= $t['id'] ?>&pack_id=<?= $id ?>" class="text-white me-2">
        <i class="fas fa-edit"></i>
    </a>
    <a href="function.php?action=delete_package_type&id=<?= $t['id'] ?>&pack_id=<?= $id ?>"
       class="text-white"
       onclick="return confirm('Delete?')">
        <i class="fas fa-trash"></i>
    </a>
</div>

<h4><?= htmlspecialchars($t['pack_type']) ?></h4>

<div class="price">
₹ <?= htmlspecialchars($t['price']) ?>
</div>

</div>

<div class="pricing-body">

<!-- IDEAL -->
<?php if (!empty($idealGroup[$t['id']])): ?>
<?php foreach ($idealGroup[$t['id']] as $ideal): ?>
<div class="list-item">
<span><b><?= htmlspecialchars($ideal['ideal_for']) ?>:</b> <?= htmlspecialchars($ideal['ideal_value']) ?></span>

<div>
<a href="add_idealfor.php?action=edit&id=<?= $ideal['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-primary">
<i class="fas fa-edit"></i>
</a>

<a href="function.php?action=delete_ideal&id=<?= $ideal['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-danger" onclick="return confirm('Delete?')">
<i class="fas fa-trash"></i>
</a>
</div>
</div>
<?php endforeach; ?>
<hr>
<?php endif; ?>

<!-- FEATURES -->
<?php if (!empty($featureGroup[$t['id']])): ?>
<p><strong>FEATURES</strong></p>

<?php foreach ($featureGroup[$t['id']] as $f): ?>
<div class="list-item">
<span>
<i class="fas <?= (isset($f['status']) && $f['status']==0) ? 'fa-times-circle text-danger' : 'fa-check-circle text-success' ?>"></i>
<?= htmlspecialchars($f['features']) ?>
</span>

<div>
<a href="add_features.php?action=edit&id=<?= $f['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-primary">
<i class="fas fa-edit"></i>
</a>

<a href="function.php?action=delete_feature&id=<?= $f['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-danger" onclick="return confirm('Delete?')">
<i class="fas fa-trash"></i>
</a>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<!-- ADDONS -->
<?php if (!empty($addonGroup[$t['id']])): ?>
<hr>
<p><strong>ADDONS</strong></p>

<?php foreach ($addonGroup[$t['id']] as $a): ?>
<div class="list-item">
<span><?= htmlspecialchars($a['addons']) ?></span>

<div>
<a href="add_addons.php?action=edit&id=<?= $a['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-primary">
<i class="fas fa-edit"></i>
</a>

<a href="function.php?action=delete_addon&id=<?= $a['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-danger" onclick="return confirm('Delete?')">
<i class="fas fa-trash"></i>
</a>
</div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<!-- SEO SECTION -->
<?php if (stripos($package['package_name'], 'seo') !== false): ?>

<hr>

<?php
$seoTitles = [
'website_review'=>'WEBSITE REVIEW & ANALYSIS',
'onpage_seo'=>'ON PAGE SEO ANALYSIS',
'local_seo'=>'LOCAL SEO SETUP',
'content_marketing'=>'CONTENT MARKETING',
'email_outreach'=>'EMAIL OUTREACH',
'offpage_seo'=>'OFF PAGE SEO',
'monthly_reporting'=>'MONTHLY REPORTING',
'client_support'=>'CLIENT SUPPORT'
];

foreach ($seoTitles as $table=>$heading):

if (!empty($seoData[$table][$t['id']])):
?>

<p><strong><?= $heading ?></strong></p>

<?php foreach ($seoData[$table][$t['id']] as $item): ?>
<div class="list-item">
<span>
<i class="fas <?= (isset($item['status']) && $item['status']==0) ? 'fa-times-circle text-danger' : 'fa-check-circle text-success' ?>"></i>
<?= htmlspecialchars($item['value']) ?>
</span>

<div>
<a href="add_<?= $table ?>.php?action=edit&id=<?= $item['id'] ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-primary">
<i class="fas fa-edit"></i>
</a>

<a href="function.php?action=delete_dynamic&id=<?= $item['id'] ?>&table=<?= $table ?>&pack_id=<?= $id ?>&pack_type_id=<?= $t['id'] ?>" class="text-danger" onclick="return confirm('Delete?')">
<i class="fas fa-trash"></i>
</a>
</div>
</div>
<?php endforeach; ?>

<hr>

<?php endif; endforeach; ?>

<?php endif; ?>

</div>
</div>
</div>

<?php $i++; endforeach; ?>

</div>

<div class="text-center mt-4">
<a href="package.php" class="btn btn-secondary">Back</a>
</div>

</div>

</body>
</html>