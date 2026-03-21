
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
  <title>Performance Marketing Company | Digital Marketing Company Near Me</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="Boost your ROI with the leading performance marketing company. Looking for a digital marketing company near me? Partner with us for measurable growth and smart strategy." />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/performance-marketing-company/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Performance Marketing Company | Digital Marketing Company Near Me" />
		<meta property="og:description" content="Boost your ROI with the leading performance marketing company. Looking for a digital marketing company near me? Partner with us for measurable growth and smart strategy." />
		<meta property="og:url" content="https://drafticode.com/performance-marketing-company/" />
		<meta property="article:published_time" content="2025-01-26T04:45:55+00:00" />
		<meta property="article:modified_time" content="2025-07-29T08:40:52+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Performance Marketing Company | Digital Marketing Company Near Me" />
		<meta name="twitter:description" content="Boost your ROI with the leading performance marketing company. Looking for a digital marketing company near me? Partner with us for measurable growth and smart strategy." />
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
<style>
     .content-box .text-service p{
        color:white;
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
                        <h1 class="title">Services</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index.php">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>Services</li>
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
$services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll();
?>

<section class="service-section">
    <div class="bg bg-pattern-2"></div>

    <div class="auto-container">
        <div class="row g-4">

            <?php foreach ($services as $service): ?>

            <div class="col-lg-4 col-md-6">
                <div class="service-block">
                    <div class="inner-box">

                        <div class="image-box">
                            <figure class="image">
                                <a href="service_details.php?slug=<?= $service['slug'] ?>">
                                    <img src="upload/<?= htmlspecialchars($service['image']) ?>" alt="Image" class="img-fluid">
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

                            <div class="text text-service">
                                <?= $service['short_description'] ?>
                            </div>

                            <div class="btn-box">
                                <a href="service_details.php?slug=<?= $service['slug'] ?>" class="readmore">
                                    Discover More
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>



<?php include "common/footer.php"; ?>