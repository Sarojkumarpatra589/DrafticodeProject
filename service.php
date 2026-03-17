<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/service.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Onicx - Digital Agency PHP Template | Services</title>

  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <link rel="icon" href="images/favicon.png" type="image/x-icon" />

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
                        <h1 class="title">Services</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index-2.html">Home <span><i class="fas fa-angle-right"></i></span></a></li>
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

<!-- Service Section -->
<section class="service-section">
    <div class="bg bg-pattern-2"></div>
    <div class="auto-container">
       

        <div class="outer-box">
            <div class="swiper service-swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($services as $service): ?>

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
                                    <a href="service_details.php?slug=<?= $service['slug'] ?>" class="readmore">
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