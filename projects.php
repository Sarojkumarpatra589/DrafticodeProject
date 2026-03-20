<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/project.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:45 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Projects - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="PROJECTS PROJECTS Latest Projects Stay up-to-date with our latest projects showcasing innovative ideas and creative solutions. From cutting-edge technologies to impactful community initiatives, these projects reflect our dedication to excellence and forward-thinking approaches. Explore how we&#039;re shaping the future, one project at a time. PREETAM INFRASTRUCTURE PATEL DIAGNOSTIC BR ENTERTAINMENT NUTTY BABA KHAWAR ASHE PASHE" />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/projects/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Projects - Drafticode" />
		<meta property="og:description" content="PROJECTS PROJECTS Latest Projects Stay up-to-date with our latest projects showcasing innovative ideas and creative solutions. From cutting-edge technologies to impactful community initiatives, these projects reflect our dedication to excellence and forward-thinking approaches. Explore how we&#039;re shaping the future, one project at a time. PREETAM INFRASTRUCTURE PATEL DIAGNOSTIC BR ENTERTAINMENT NUTTY BABA KHAWAR ASHE PASHE" />
		<meta property="og:url" content="https://drafticode.com/projects/" />
		<meta property="article:published_time" content="2025-01-26T04:52:38+00:00" />
		<meta property="article:modified_time" content="2025-07-14T10:07:22+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Projects - Drafticode" />
		<meta name="twitter:description" content="PROJECTS PROJECTS Latest Projects Stay up-to-date with our latest projects showcasing innovative ideas and creative solutions. From cutting-edge technologies to impactful community initiatives, these projects reflect our dedication to excellence and forward-thinking approaches. Explore how we&#039;re shaping the future, one project at a time. PREETAM INFRASTRUCTURE PATEL DIAGNOSTIC BR ENTERTAINMENT NUTTY BABA KHAWAR ASHE PASHE" />
		<meta name="twitter:creator" content="@swatiselly" />
  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/style.css" rel="stylesheet">
  
  
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
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
  <div class="auto-container">
    <div class="row">

      <?php
      $projects = $pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();
      foreach ($projects as $project) { ?>

        <!-- Project Block -->
        <div class="project-block-four  col-lg-4 col-md-6 col-sm-12 mb-30">
          <div class="inner-box">
            
            <div class="image-box">
              <a href="project_details.php?slug=<?= urlencode($project['slug']) ?>">
                <img src="upload/<?= htmlspecialchars($project['image']) ?>" alt="Image">
              </a>
            </div>

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
</section>  
<!-- End Project Section -->


<?php include "common/footer.php"; ?>