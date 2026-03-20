
<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/service.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
 <title>Our Products - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="OUR PRODUCTS OUR Products Latest Products &quot;Showcasing innovative solutions and creative designs that push boundaries and deliver impactful results.&quot; OneTap Card OneTap Card In today’s fast-paced digital world, first impressions matter more than ever. At Onetap,..." />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/our-products/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Our Products - Drafticode" />
		<meta property="og:description" content="OUR PRODUCTS OUR Products Latest Products &quot;Showcasing innovative solutions and creative designs that push boundaries and deliver impactful results.&quot; OneTap Card OneTap Card In today’s fast-paced digital world, first impressions matter more than ever. At Onetap,..." />
		<meta property="og:url" content="https://drafticode.com/our-products/" />
		<meta property="article:published_time" content="2025-01-26T04:47:11+00:00" />
		<meta property="article:modified_time" content="2025-01-30T10:12:22+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Our Products - Drafticode" />
		<meta name="twitter:description" content="OUR PRODUCTS OUR Products Latest Products &quot;Showcasing innovative solutions and creative designs that push boundaries and deliver impactful results.&quot; OneTap Card OneTap Card In today’s fast-paced digital world, first impressions matter more than ever. At Onetap,..." />
		<meta name="twitter:creator" content="@swatiselly" />

  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
</head>
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
                        <h1 class="title">products</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index-2.html">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>products</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </section>
<!-- End Breadcume Section -->





  <?php
include 'connection/config.php';
$products = $pdo->query("SELECT * FROM products ORDER BY id DESC")->fetchAll();
?>

<!-- Service Section -->
<section class="service-section">
    <div class="bg bg-pattern-2"></div>
    <div class="auto-container">
       

        <div class="outer-box">
            <div class="swiper service-swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($products as $service): ?>

                    <!-- Service Block -->
                    <div class="service-block swiper-slide">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="service_details.php?slug=<?= $service['slug'] ?>">
                                        <img src="upload/<?= htmlspecialchars($service['image']) ?>" alt="Image">
                                    </a>
                                </figure>
                                <div class="icon-box">
                                    <i class="icon flaticon-health-check"></i>
                                </div>
                            </div>

                            <div class="content-box">
                                <h4 class="title">
                                    <a href="service_details.php?slug=<?= $service['slug'] ?>">
                                        <?= htmlspecialchars($service['title']) ?>
                                    </a>
                                </h4>

                                <div class="text">
                                    <?= $service['short_description'] ?>
                                </div>

                                <div class="btn-box">
                                    <a href="product_details.php?slug=<?= $service['slug'] ?>" class="readmore">
                                        Discover More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>

            <!-- Navigation -->
            <div class="nav-box">
                <div class="swiper-button-prev">
                    <span class="icon fal fa-long-arrow-left"></span>
                </div>
                <div class="swiper-button-next">
                    <span class="icon fal fa-long-arrow-right"></span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Service Section -->



<?php include "common/footer.php"; ?>