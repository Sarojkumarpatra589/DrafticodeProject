<?php
include 'connection/config.php';

/* AUTO FETCH SMM PACKAGE */
$stmt = $pdo->prepare("SELECT * FROM packages WHERE package_name LIKE '%smm%' LIMIT 1");
$stmt->execute();
$package = $stmt->fetch();

if (!$package) {
    die("SMM Package not found");
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
function groupByType($data)
{
    $arr = [];
    foreach ($data as $d) {
        $arr[$d['pack_type_id']][] = $d;
    }
    return $arr;
}

$featureGroup = groupByType($features);
$addonGroup   = groupByType($addons);


$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>SMM Package - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="Social Media Marketing Select the Ideal Social Media Marketing Strategy Find the perfect plan tailored to your needs! Whether you&#039;re looking for basic features, premium options, or custom solutions, we have flexible pricing packages to fit your requirements. Select the plan that works best for you and start enjoying exceptional services today. Affordable Yet Effective" />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/smm-package-2/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="SMM Package - Drafticode" />
		<meta property="og:description" content="Social Media Marketing Select the Ideal Social Media Marketing Strategy Find the perfect plan tailored to your needs! Whether you&#039;re looking for basic features, premium options, or custom solutions, we have flexible pricing packages to fit your requirements. Select the plan that works best for you and start enjoying exceptional services today. Affordable Yet Effective" />
		<meta property="og:url" content="https://drafticode.com/smm-package-2/" />
		<meta property="article:published_time" content="2025-04-21T07:09:48+00:00" />
		<meta property="article:modified_time" content="2026-03-16T09:52:20+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="SMM Package - Drafticode" />
		<meta name="twitter:description" content="Social Media Marketing Select the Ideal Social Media Marketing Strategy Find the perfect plan tailored to your needs! Whether you&#039;re looking for basic features, premium options, or custom solutions, we have flexible pricing packages to fit your requirements. Select the plan that works best for you and start enjoying exceptional services today. Affordable Yet Effective" />
		<meta name="twitter:creator" content="@swatiselly" />

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style id="pricing-perfect-align">

/* ===== ROW (EQUAL HEIGHT SYSTEM) ===== */
.row {
    display: flex;
    flex-wrap: wrap;
}

/* ===== EACH COLUMN ===== */
.pricing-block {
    display: flex;
    margin-bottom: 30px;
}

/* ===== CARD FULL HEIGHT ===== */
.pricing-block .inner-box {
    display: flex;
    flex-direction: column;
    width: 100%;
}

/* ===== CONTENT AREA ===== */
.pricing-block .content {
    display: flex;
    flex-direction: column;
    flex: 1;
}

/* ===== 🔥 THIS IS THE KEY FIX ===== */
.pricing-block .list-style-three {
    flex: 1;   /* pushes button down evenly */
}

/* ===== BUTTON ALIGNMENT ===== */
.pricing-block .btn-box {
    margin-top: 20px;
}


/* ===== RESPONSIVE FIX ===== */
@media (max-width: 576px) {
    .row {
        display: block;
    }
}

</style>

<body>
    <div class="page-wrapper">

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
                                    <h1 class="title">SMM Package</h1>
                                </div>

                                <ul class="breadcume-pull">
                                    <li>
                                        <a class="title-line" href="index.php">
                                            Home <span><i class="fas fa-angle-right"></i></span>
                                        </a>
                                    </li>
                                    <li>SMM Package</li>
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
                                        Best SMM Plan
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

                                        <!-- ADDONS -->
                                        <?php if (!empty($addonGroup[$t['id']])): ?>
                                            <?php foreach ($addonGroup[$t['id']] as $a): ?>
                                                <li>
                                                    <i class="fas fa-plus text-warning"></i>
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

    </div>
</body>

</html>