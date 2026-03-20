<?php
include 'connection/config.php';

/* AUTO FETCH DEVELOPMENT PACKAGE */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE package_name LIKE '%development%' LIMIT 1");
$stmt->execute();
$package = $stmt->fetch();

if (!$package) {
    die("Development Package not found");
}

$pack_id = $package['id'];

/* TYPES */
$stmt = $pdo->prepare("SELECT * FROM package_type WHERE pack_id=?");
$stmt->execute([$pack_id]);
$types = $stmt->fetchAll();

/* FEATURES */
$stmt = $pdo->prepare("SELECT * FROM features WHERE pack_id=?");
$stmt->execute([$pack_id]);
$features = $stmt->fetchAll();

/* ADDONS */
$stmt = $pdo->prepare("SELECT * FROM addons WHERE pack_id=?");
$stmt->execute([$pack_id]);
$addons = $stmt->fetchAll();

/* GROUP FUNCTION */
function groupByType($data){
    $arr=[];
    foreach($data as $d){
        $arr[$d['pack_type_id']][]=$d;
    }
    return $arr;
}
/* IDEAL FOR */
$stmt = $pdo->prepare("SELECT * FROM ideal_for WHERE pack_id=?");
$stmt->execute([$pack_id]);
$ideals = $stmt->fetchAll();

$idealGroup = groupByType($ideals);
$featureGroup = groupByType($features);
$addonGroup   = groupByType($addons);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Development Package</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
<div class="page-wrapper">

<!-- Preloader -->
<div class="preloader">
    <div class="loader"></div>
</div> 

<?php include "common/header.php"; ?>

<!-- Breadcume -->
<section class="breadcume-section">
<div class="outer-box">
<div class="auto-container">
<div class="row">
<div class="col-lg-12">

<div class="breadcumb-content">
<div class="breadcumb-title">
<h1 class="title">Development Package</h1>
</div>

<ul class="breadcume-pull">
<li>
<a class="title-line" href="index.php">
Home <span><i class="fas fa-angle-right"></i></span>
</a>
</li>
<li>Development Package</li>
</ul>

</div>

</div>
</div>
</div>
</div>
</section>

<!-- Pricing Section -->
<section class="pricing-section">
<div class="shape-9"></div>

<div class="auto-container">

<div class="sec-title text-center">
<div class="sub-title">our plans</div>
<h2 class="text-reveal-anim">
Make Brand Pricing <br> Plans Identities
</h2>
</div>

<div class="row">

<?php foreach ($types as $index => $t): ?>

<div class="pricing-block col-lg-6 col-md-6 col-sm-12 wow fadeInUp"
     data-wow-delay="<?= ($index * 300) ?>ms">

<div class="inner-box">

<i class="icon flaticon-technology"></i>

<div class="content">

<h4 class="time">
₹<?= htmlspecialchars($t['price']) ?>/Month
</h4>

<h4 class="title">
<?= htmlspecialchars($t['pack_type']) ?>
</h4>

<div class="text">
Best Development Plan
</div>

<ul class="list-style-three">
<!-- IDEAL FOR -->
<?php if(!empty($idealGroup[$t['id']])): ?>
<li class="fw-bold">IDEAL FOR</li>

<?php foreach($idealGroup[$t['id']] as $ideal): ?>
<li>
    <i class="fas fa-user text-white"></i>
    <?= htmlspecialchars($ideal['ideal_for']) ?>:
    <?= htmlspecialchars($ideal['ideal_value']) ?>
</li>
<?php endforeach; ?>
<?php endif; ?>
<!-- FEATURES -->
<?php if(!empty($featureGroup[$t['id']])): ?>
<li class="fw-bold  ">FEATURES</li>

<?php foreach($featureGroup[$t['id']] as $f): ?>
<li>
<i class="fas <?= (isset($f['status']) && $f['status']==0) ? 'fa-times text-danger' : 'fa-arrow-right' ?>"></i>
<?= htmlspecialchars($f['features']) ?>
</li>
<?php endforeach; ?>
<?php endif; ?>

<!-- ADDONS -->
<?php if(!empty($addonGroup[$t['id']])): ?>
<li class="fw-bold  mt-2">ADDONS</li>

<?php foreach($addonGroup[$t['id']] as $a): ?>
<li>
<i class="fas fa-plus "></i>
<?= htmlspecialchars($a['addons']) ?>
</li>
<?php endforeach; ?>
<?php endif; ?>

</ul>

<div class="btn-box">
<a class="theme-btn-main" href="#">
<span class="theme-btn-arrow-left">
<i class="fa fa-arrow-right"></i>
</span>

<span class="theme-btn">
Discover More
</span>

<span class="theme-btn-arrow-right">
<i class="fa fa-arrow-right"></i>
</span>
</a>
</div>

</div>
</div>
</div>

<?php endforeach; ?>

</div>
</div>
</section>

<?php include "common/footer.php"; ?>

</div>
</body>
</html>