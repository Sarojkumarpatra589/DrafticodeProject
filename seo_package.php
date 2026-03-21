<?php
include 'connection/config.php';

/* AUTO LOAD SEO PACKAGE (no id required) */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE package_name LIKE '%seo%' LIMIT 1");
$stmt->execute();
$package = $stmt->fetch();

if (!$package) {
    die("SEO Package not found");
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

/* GROUP FUNCTION */
function groupByType($data)
{
    $arr = [];
    foreach ($data as $d) {
        $arr[$d['pack_type_id']][] = $d;
    }
    return $arr;
}

$featureGroup = groupByType($features);

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
    $stmt->execute([$pack_id]);
    $seoData[$table] = groupByType($stmt->fetchAll());
}

/* SEO HEADINGS */
$seoTitles = [
    'website_review' => 'WEBSITE REVIEW & ANALYSIS',
    'onpage_seo' => 'ON PAGE SEO ANALYSIS',
    'local_seo' => 'LOCAL SEO SETUP',
    'content_marketing' => 'CONTENT MARKETING',
    'email_outreach' => 'EMAIL OUTREACH',
    'offpage_seo' => 'OFF PAGE SEO',
    'monthly_reporting' => 'MONTHLY REPORTING',
    'client_support' => 'CLIENT SUPPORT'
];

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>SEO Package - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="Search Engine Optimization Boost Your Rankings with the Right SEO Package Get noticed online with SEO plans designed to improve visibility, drive traffic, and grow your business—fast and effectively. Monthly SEO Plans: Trusted By 500+ Clients &amp; 97% Success Rate! Drafticode Company offers affordable and effective SEO packages tailored to boost your online visibility and" />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/seo-package/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SEO Package - Drafticode" />
		<meta property="og:description" content="Search Engine Optimization Boost Your Rankings with the Right SEO Package Get noticed online with SEO plans designed to improve visibility, drive traffic, and grow your business—fast and effectively. Monthly SEO Plans: Trusted By 500+ Clients &amp; 97% Success Rate! Drafticode Company offers affordable and effective SEO packages tailored to boost your online visibility and" />
		<meta property="og:url" content="https://drafticode.com/seo-package/" />
		<meta property="article:published_time" content="2025-04-11T09:23:46+00:00" />
		<meta property="article:modified_time" content="2025-04-21T10:19:21+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="SEO Package - Drafticode" />
		<meta name="twitter:description" content="Search Engine Optimization Boost Your Rankings with the Right SEO Package Get noticed online with SEO plans designed to improve visibility, drive traffic, and grow your business—fast and effectively. Monthly SEO Plans: Trusted By 500+ Clients &amp; 97% Success Rate! Drafticode Company offers affordable and effective SEO packages tailored to boost your online visibility and" />
		<meta name="twitter:creator" content="@swatiselly" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
    .list-style-three li i {
        background: none;
        font-size: 15px;
    }
</style>
<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader"></div>
        </div>

        <?php include "common/header.php"; ?>

        <!-- Breadcume Section -->
        <section class="breadcume-section">
            <div class="outer-box">
                <div class="auto-container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="breadcumb-content">

                                <div class="breadcumb-title">
                                    <h1 class="title"><?= htmlspecialchars($package['package_name']) ?></h1>
                                </div>

                                <ul class="breadcume-pull">
                                    <li>
                                        <a class="title-line" href="index.php">
                                            Home <span><i class="fas fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                    <li><?= htmlspecialchars($package['package_name']) ?></li>
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
                                        <?= htmlspecialchars($t['pack_type']) ?> Package
                                    </h4>

                                    <div class="text">
                                        Best <?= htmlspecialchars($package['package_name']) ?> Plan
                                    </div>

                                    <ul class="list-style-three">

                                        <!-- FEATURES -->
                                        <?php if (!empty($featureGroup[$t['id']])): ?>
                                            <?php foreach ($featureGroup[$t['id']] as $f): ?>
                                                <li>
                                                    <i class="fas <?= (isset($f['status']) && $f['status'] == 0) ? 'fa-times text-danger' : 'fa-arrow-right' ?>"></i>
                                                    <?= htmlspecialchars($f['features']) ?>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </ul>

                                    <!-- SEO SECTIONS -->
                                    <?php foreach ($seoTitles as $table => $heading): ?>

                                        <?php if (!empty($seoData[$table][$t['id']])): ?>

                                            <h6 style="margin-top:15px; font-weight:bold;" class="title">
                                                <?= $heading ?> 
                                            </h6>

                                            <ul class="list-style-three">

                                                <?php foreach ($seoData[$table][$t['id']] as $item): ?>
                                                    <li>
                                                       <span class="d-flex">
                                                            <i class=" fas <?= (isset($item['status']) && $item['status'] == 0) ? 'fa-times text-danger' : 'fa-check text-success' ?>"></i>
                                                            <?= htmlspecialchars($item['value']) ?>
                                                        </span>
                                                    </li>
                                                <?php endforeach; ?>

                                            </ul>

                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                    <div class="btn-box">
                                        <a class="theme-btn-main" href="#">
                                            <span class="theme-btn-arrow-left">
                                                <i class="fa fa-arrow-right"></i>
                                            </span>

                                            <a href="https://wa.me/917975189067?text=Hi%20I%20am%20interested%20in%20your%20services" 
   target="_blank" 
   class="theme-btn">
    Get Started Now
</a>

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