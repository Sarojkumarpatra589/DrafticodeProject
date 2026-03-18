<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/project.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Onicx - Digital Agency PHP Template | Page Projects</title>

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
                        <h1 class="title">Page Projects</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index-2.html">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>Page Projects</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </section>
<!-- End Breadcume Section -->





<!-- Project Section -->
<section class="project-section-five">
<div class="auto-container"></div>

<div class="outer-box">

    <!-- Project Swiper -->
    <div class="swiper project-swiper-two">
        <div class="swiper-wrapper">

            <?php
            $projects = $pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();
            foreach ($projects as $project) { ?>

                <!-- Project Block -->
                <div class="project-block-four swiper-slide mb-30">
                    <div class="inner-box">

                        <!-- Image -->
                        <div class="image-box">
                            <figure class="image">
                                <a href="project_details.php?slug=<?= urlencode($project['slug']) ?>">
                                    <img src="upload/<?= htmlspecialchars($project['image']) ?>" alt="Image">
                                </a>
                            </figure>
                        </div>

                        <!-- Content -->
                        <div class="content-box">
                            <div class="btn-box">
                                <a href="project_details.php?slug=<?= urlencode($project['slug']) ?>" class="readmore">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>

                            <h4 class="title">
                                <a href="project_details.php?slug=<?= urlencode($project['slug']) ?>">
                                    <?= htmlspecialchars($project['title']) ?>
                                </a>
                            </h4>
                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>
    </div>

</div>
</section>
<!-- End Project Section -->

<?php include "common/footer.php"; ?>