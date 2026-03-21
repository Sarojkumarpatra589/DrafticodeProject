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
  <title>Courses - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="Course Catalog Home - Courses Unlock Your Potential: View Our Courses We’re excited to offer you a chance to grow and excel with our curated courses designed to enhance your skills and knowledge. Whether you’re looking to advance in your role or explore new areas of expertise, there’s something for everyone. AMP Stack ( Apache," />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/courses/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Courses - Drafticode" />
		<meta property="og:description" content="Course Catalog Home - Courses Unlock Your Potential: View Our Courses We’re excited to offer you a chance to grow and excel with our curated courses designed to enhance your skills and knowledge. Whether you’re looking to advance in your role or explore new areas of expertise, there’s something for everyone. AMP Stack ( Apache," />
		<meta property="og:url" content="https://drafticode.com/courses/" />
		<meta property="article:published_time" content="2025-01-22T02:30:03+00:00" />
		<meta property="article:modified_time" content="2025-02-08T15:41:06+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Courses - Drafticode" />
		<meta name="twitter:description" content="Course Catalog Home - Courses Unlock Your Potential: View Our Courses We’re excited to offer you a chance to grow and excel with our curated courses designed to enhance your skills and knowledge. Whether you’re looking to advance in your role or explore new areas of expertise, there’s something for everyone. AMP Stack ( Apache," />
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
                        <h1 class="title">Our Courses</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index.php">Home <span><i class="fas fa-angle-right"></i></span></a></li>
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
                <!-- Service Block 1 -->
                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                    <div class="service-block ">
                        <div class="inner-box">
                            <!-- Image -->
                            <div class="image-box">
                                <figure class="image">
                                    <a href="course_details.php?slug=<?= $course['slug'] ?>">
                                        <img src="upload/<?= htmlspecialchars($course['image'] ?? 'default.jpg') ?>" alt="Image">
                                    </a>
                                </figure>

                                <div class="icon-box">
                                    <i class="icon flaticon-health-check"></i>
                                </div>
                            </div>
                            <div class="content-box">
                                 <!-- Course Name -->
                                <h4 class="title">
                                    <a href="course_details.php?slug=<?= $course['slug'] ?>">
                                        <?= htmlspecialchars($course['course_name']) ?>
                                    </a>
                                </h4>
                                <?= $course['short_description'] ?>
                                
                                <div class="btn-box">
                                    <a href="course_details.php?slug=<?= $course['slug'] ?>" class="readmore">
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