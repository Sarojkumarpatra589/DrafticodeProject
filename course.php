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
                        <h1 class="title">Our Courses</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index-2.html">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>Courses</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </section>
<!-- End Breadcume Section -->

<!-- Service Section -->
<section class="service-section">       
    <div class="shape-3"></div>
    <div class="shape-2"></div>

    <div class="auto-container">
        <div class="outer-box">
            <div class="row">

                <?php 
                $stmt = $pdo->query("SELECT * FROM courses ORDER BY id DESC"); $courses = $stmt->fetchAll();
                foreach ($courses as $course) { ?>

                <!-- Service Block -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="service-block">
                        <div class="inner-box">

                            <!-- Image -->
                            <div class="image-box">
                                <figure class="image">
                                    <a href="course_details.php?id=<?= $course['id'] ?>">
                                        <img src="upload/<?= htmlspecialchars($course['image'] ?? 'default.jpg') ?>" alt="Image">
                                    </a>
                                </figure>

                                <div class="icon-box">
                                    <i class="icon flaticon-health-check"></i>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="content-box">

                                <!-- Course Name -->
                                <h4 class="title">
                                    <a href="course_details.php?id=<?= $course['id'] ?>">
                                        <?= htmlspecialchars($course['course_name']) ?>
                                    </a>
                                </h4>

                                <!-- Short Description -->
                                <div class="text ">
                                    <?= $course['short_description'] ?>
                                </div>

                                <div class="btn-box">
                                    <a href="course_details.php?id=<?= $course['id'] ?>" class="readmore">
                                        Discover More
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!-- End Service Section -->



<?php include "common/footer.php"; ?>