<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Digital Marketing Company In Bhubaneswar | Online Marketing Agency</title>
  <!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="About About Company Drafticode is a leading Web Development and Digital Marketing Company committed to propelling businesses into the digital forefront with tailored solutions designed to captivate audiences and drive results. With a focus on innovation, creativity, and cutting-edge technology, we specialize in crafting stunning websites that not only visually impress but also deliver seamless Looking for a top digital marketing company in Bhubaneswar? Our expert online marketing agency drives results through SEO, social media, branding &amp; more." />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/digital-marketing-company-in-bhubaneswar/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Digital Marketing Company In Bhubaneswar | Online Marketing Agency" />
		<meta property="og:description" content="About About Company Drafticode is a leading Web Development and Digital Marketing Company committed to propelling businesses into the digital forefront with tailored solutions designed to captivate audiences and drive results. With a focus on innovation, creativity, and cutting-edge technology, we specialize in crafting stunning websites that not only visually impress but also deliver seamless Looking for a top digital marketing company in Bhubaneswar? Our expert online marketing agency drives results through SEO, social media, branding &amp; more." />
		<meta property="og:url" content="https://drafticode.com/digital-marketing-company-in-bhubaneswar/" />
		<meta property="article:published_time" content="2025-01-21T19:26:29+00:00" />
		<meta property="article:modified_time" content="2025-11-24T05:35:14+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Digital Marketing Company In Bhubaneswar | Online Marketing Agency" />
		<meta name="twitter:description" content="About About Company Drafticode is a leading Web Development and Digital Marketing Company committed to propelling businesses into the digital forefront with tailored solutions designed to captivate audiences and drive results. With a focus on innovation, creativity, and cutting-edge technology, we specialize in crafting stunning websites that not only visually impress but also deliver seamless Looking for a top digital marketing company in Bhubaneswar? Our expert online marketing agency drives results through SEO, social media, branding &amp; more." />
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
 
<?php include "common/header.php";?>


<!-- Breadcume Section -->
  <section class="breadcume-section">
    <div class="outer-box">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                      <div class="breadcumb-title">
                        <h1 class="title">About Us</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index.php">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>About Us</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </section>
<!-- End Breadcume Section -->

<style>
    .client-block .image{
    height:100px;
    width: 100%;
}
.client-block .image img{
    
    height: 100%;
    width: 100%;
    object-fit: fill;
}
</style>
    <!-- Client Section -->
                <section class="client-section pb-0 mb-4 ">
                    <div class="shape-4"></div>

                    <div class="auto-container">
                        <div class="outer-box">

                            <div class="title-box">
                                <h5 class="title">Trusted By <br>Top Companies</h5>
                                <i class="icon fa fa-arrow-up-right"></i>
                            </div>

                    <div class="marquee-box">
            <div class="marquee">

                <?php include 'connection/config.php'; $stmt = $pdo->prepare("SELECT * FROM clients ORDER BY id DESC"); $stmt->execute(); $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); foreach ($clients as $client): ?>
                    <div class="client-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="upload/<?= htmlspecialchars($client['image']) ?>" alt="Client Logo">
                            </figure>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- 🔥 SAME LIST AGAIN -->
                <?php foreach ($clients as $client): ?>
                    <div class="client-block">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="upload/<?= htmlspecialchars($client['image']) ?>" alt="Client Logo">
                            </figure>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

                        </div>
                    </div>
                </section>
    <!-- End Client Section -->


    <!-- About Section -->
        <section class="about-section">
            <div class="shape-2"></div>
            <div class="shape-3"></div>
            <div class="auto-container">
                <div class="row">
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12 order-lg-2 wow fadeInRight">
                        <div class="inner-column">
                            <div class="sec-title">
                                <div class="sub-title">About Us</div>
                                <h2 class="text-reveal-anim">Welcome to Our Smart <br> Digital Agency</h2>
                                <div class="text">Drafticode is a professional digital marketing company based in Bhubaneswar, helping businesses across India grow through innovative strategies and modern digital solutions. Our expert team combines creativity, strategic thinking, and data-driven insights to deliver impactful results.</div>
                            </div>
                            <div class="icon-outer-box row">
                                <div class="icon-box col-lg-6 col-md-6 col-sm-6">
                                    <div class="inner-box">
                                        <i class="icon flaticon-graphic-design"></i>
                                        <h6 class="title">Quality Services</h6>
                                    </div>
                                </div>
                                <div class="icon-box col-lg-6 col-md-6 col-sm-6">
                                    <div class="inner-box">
                                        <i class="icon flaticon-targeted-marketing"></i>
                                        <h6 class="title">Innovation Ideas</h6>
                                    </div>
                                </div>
                            </div>

                            <!--Skills-->
                            <div class="skills">
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <div class="skill-title">Digital Marketing</div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="90">
                                                <div class="skill-percentage">
                                                    <div class="count-box"><span class="count-text" data-speed="3000" data-stop="98">0</span>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="list-style-two">
                                <li><i class="fa fa-check-circle"></i>Transforming businesses digitally
        Results that truly matter.</li>
                                <li><i class="fa fa-check-circle"></i> Marketing solutions for growth
        Creativity, strategy, and technology.</li>
                            </ul>
                            <div class="btn-box">
                                <a class="theme-btn-main" href="contact.php">
                                    <span class="theme-btn-arrow-left"><i class="fa fa-arrow-right"></i></span>
                                    <span class="theme-btn">Discover More</span>
                                    <span class="theme-btn-arrow-right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay="300ms">
                            <div class="inner-column">
                            <div class="image-box">
                                <div class="shape-1"></div>
                                <figure class="image"><img src="images/resource/about1-1.jpg" alt="Image"></figure>
                                <div class="exp-box">
                                    <div class="icon-8"></div>
                                    <h2 class="count">7</h2>
                                    <div class="text">years of<br>experience</div>
                                </div>
                                <div class="icon-box">
                                    <div class="icon-6"></div>
                                </div>
                                <div class="icon-box-two">
                                    <div class="icon-7"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    <!-- End About Section -->



    
    <!-- Call To Action -->
    <section class="call-to-action-two pull-down mt-5 mb-5">
        <div class="bg bg-image" style="background-image: url(images/background/1.jpg);"></div>
        <div class="auto-container">
            <div class="outer-box">
                <div class="icon-30 bounce-y"></div>
                <div class="content-box">
                    <h2 class="title text-reveal-anim">Helping Your Businesses in a Smartest Way <br> Possible</h2>
                    <div class="exp-box wow fadeInUp" data-wow-delay="300ms">
                        <svg viewBox="0 0 100 100" width="100" height="100" class="circular-text">
                            <defs><path id="circle"d="M 50, 50m -37, 0a 37,37 0 1,1 74,0a 37,37 0 1,1 -74,0"/></defs>
                            <text><textPath xlink:href="#circle">PLAY REEL * PLAY REEL * PLAY REEL * PLAY REEL * PLAY REEL *</textPath></text>
                        </svg>
                        <div class="video-box">
                            <a href="https://www.youtube.com/watch?v=CigjudGu5WQ" class="play-btn" data-fancybox="gallery" data-caption=""><i class="icon fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Call To Action -->


    
    <!-- project Section -->
        <section class="project-section-four">
        <div class="icon-21 bounce-x"></div>
        <div class="shape-8"></div>
        <div class="auto-container">
        <div class="sec-title">
            <div class="sub-title">COMPANY ROADMAP</div>
            <h2 class="text-reveal-anim">Journey from start to now</h2>
        </div>
        <div class="row g-4 align-items-center">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2 wow fadeInRight">
            <div class="inner-column">
                <div class="icon-box">
                <div class="inner-box">
                    <div class="number">01</div>
                    <i class="icon flaticon-laptop"></i>
                </div>
                <div class="content-box">
                    <h4 class="title">2018 – Establishment</h4>
                    <div class="text">
                    Founded with a clear vision to provide innovative digital marketing and web solutions.
                    </div>
                </div>
                </div>
                <div class="icon-box">
                <div class="inner-box">
                    <div class="number">02</div>
                    <i class="icon flaticon-laptop"></i>
                </div>
                <div class="content-box">
                    <h4 class="title">2020 – Strategic Growth</h4>
                    <div class="text">
                    Strengthened our market presence by expanding services and building a diverse client portfolio.
                    </div>
                </div>
                </div>
                <div class="icon-box">
                <div class="inner-box">
                    <div class="number">03</div>
                    <i class="icon flaticon-laptop"></i>
                </div>
                <div class="content-box">
                    <h4 class="title">2023 – Service Expansion</h4>
                    <div class="text">
                    Advanced our capabilities with data-driven marketing strategies and creative digital solutions.
                    </div>
                </div>
                </div>
                <div class="icon-box mb-0">
                <div class="inner-box">
                    <div class="number">04</div>
                    <i class="icon flaticon-laptop"></i>
                </div>
                <div class="content-box">
                    <h4 class="title">2025 – Continued Excellence</h4>
                    <div class="text">
                    Delivering high-impact digital experiences while driving measurable growth for businesses across India.
                    </div>
                </div>
                </div>
                <div class="icon-7"></div>
            </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay="300ms">
            <div class="inner-column">
                <div class="image-box">
                <figure class="image">
                    <img src="images/resource/h6-work.jpg" alt="Image">
                </figure>
                <div class="exp-box">
                    <div class="icon-8"></div>
                    <h2 class="count">7</h2>
                    <div class="text">years of<br>experience</div>
                </div>
                <div class="icon-7"></div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </section>
    <!-- End project Section -->



    <!-- Team Section -->
        <section class="team-section">
            <div class="bg bg-pattern-10"></div>
            <div class="icon-19 bounce-x"></div>

            <div class="auto-container">

                <div class="sec-title text-center">
                    <div class="sub-title">Our Team</div>
                    <h2 class="text-reveal-anim">Meet Our Dedicated  <br>Team of Experts</h2>
                </div>

                <div class="row">

                    <?php
                    include 'connection/config.php';

                    $stmt = $pdo->prepare("SELECT * FROM teams ORDER BY id ASC");
                    $stmt->execute();
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($data as $row):
                    ?>

                        <div class="team-block col-lg-3 col-md-6 col-sm-6 wow fadeInUp">
                            <div class="inner-box">

                                <div class="image-box">
                                    <figure class="image">
                                        <a href="team-details.php?id=<?= $row['id'] ?>">
                                            <img src="upload/<?= htmlspecialchars($row['image']) ?>" alt="Image">
                                        </a>
                                    </figure>
                                </div>

                                <div class="content-box">
                                    <h5 class="name">
                                        <a href="team-details.php?id=<?= $row['id'] ?>">
                                            <?= htmlspecialchars($row['name']) ?>
                                        </a>
                                    </h5>

                                    <div class="designation">
                                        <?= $row['designation'] ?>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>

            </div>
        </section>
    <!-- End Team Section -->



<?php include "common/footer.php"; ?>