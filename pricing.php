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

/* FEATURES */
$stmt = $pdo->prepare("SELECT * FROM features WHERE pack_id=?");
$stmt->execute([$id]);
$features = $stmt->fetchAll();

/* ADDONS */
$stmt = $pdo->prepare("SELECT * FROM addons WHERE pack_id=?");
$stmt->execute([$id]);
$addons = $stmt->fetchAll();

/* GROUP FUNCTION */
function groupByType($data){
    $arr=[];
    foreach($data as $d){
        $arr[$d['pack_type_id']][]=$d;
    }
    return $arr;
}

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

/* SEO HEADINGS */
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />

<title><?= htmlspecialchars($package['package_name']) ?> Package</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
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
<h1 class="title"><?= htmlspecialchars($package['package_name']) ?> Package</h1>
</div>

<ul class="breadcume-pull">
<li>
<a class="title-line" href="index.php">
Home <span><i class="fas fa-angle-right"></i></span>
</a>
</li>
<li><?= htmlspecialchars($package['package_name']) ?> Package</li>
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

<div class="pricing-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp"
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
Best <?= htmlspecialchars($package['package_name']) ?> Plan
</div>

<ul class="list-style-three">

<!-- FEATURES -->
<?php if(!empty($featureGroup[$t['id']])): ?>
<?php foreach($featureGroup[$t['id']] as $f): ?>
<li>
<i class="fas <?= (isset($f['status']) && $f['status']==0) ? 'fa-times text-danger' : 'fa-arrow-right' ?>"></i>
<?= htmlspecialchars($f['features']) ?>
</li>
<?php endforeach; ?>
<?php endif; ?>

<!-- ADDONS -->
<?php if(!empty($addonGroup[$t['id']])): ?>
<?php foreach($addonGroup[$t['id']] as $a): ?>
<li>
<i class="fas fa-plus text-warning"></i>
<?= htmlspecialchars($a['addons']) ?>
</li>
<?php endforeach; ?>
<?php endif; ?>

<!-- SEO SECTION (ONLY IF SEO PACKAGE) -->
<?php if (stripos($package['package_name'], 'seo') !== false): ?>

<?php foreach ($seoTitles as $table=>$heading): ?>

<?php if(!empty($seoData[$table][$t['id']])): ?>

<li class="mt-2 fw-bold text-dark">
<?= $heading ?>
</li>

<?php foreach($seoData[$table][$t['id']] as $item): ?>
<li>
<i class="fas <?= (isset($item['status']) && $item['status']==0) ? 'fa-times text-danger' : 'fa-arrow-right' ?>"></i>
<?= htmlspecialchars($item['value']) ?>
</li>
<?php endforeach; ?>

<?php endif; ?>
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