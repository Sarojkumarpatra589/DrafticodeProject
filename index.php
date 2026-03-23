<?php
include 'connection/config.php';

// Fetch current settings (single row id=1)
$stmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:14 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title><?php echo $settings['meta_title']; ?></title>

    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">


    <link rel="shortcut icon" href="upload/<?php echo $settings['favicon']; ?>" type="image/x-icon" />
    <link rel="icon" href="upload/<?php echo $settings['favicon']; ?>" type="image/x-icon" />

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<style>
    .content-box .text-service p{
        color:white;
    }
   
    .project-swiper .swiper-slide {
    width: 350px !important;  /* 🔥 force fixed width */
}
/* 📱 Mobile Fix */
@media (max-width: 576px) {
    .project-swiper .swiper-slide {
        width: 100% !important;
    }
}
    .project-block .image-box {
    width: 100%;
    height: 260px!important; /* 🔥 fixed height = no distortion */
    overflow: hidden;
    border-radius: 10px;
}

.project-block .image-box .image {
    width: 100%;
    height: 100%;
    object-fit: fill;
    display: block;
}

.project-block .image-box img {
    width: 100%;
    height: 100%;
    object-fit: fill; /* 🔥 key line */
    display: block;
}
.client-block .image{
    height:100px;
    width: 100%;
}
.client-block .image img{
    
    height: 100%;
    width: 100%;
    object-fit: fill;
}
.marquee-box {
    overflow: hidden;
    width: 100%;
}

/* 🔥 KEY FIX */
.marquee {
    display: flex;
    width: max-content;
    animation: marqueeScroll 80s linear infinite !important; /* 🔥 VERY SLOW */
}

/* spacing */
.client-block {
    flex: 0 0 auto;
    margin-right: 20px;
}

/* 🔥 DO NOT CHANGE THIS */
@keyframes marqueeScroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}
</style>
<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <div class="loader"></div>
        </div>


        <?php include "common/header.php"; ?>


        <!-- Banner Section -->
        <section class="banner-section-four">
            <div class="swiper banner-swiper-four">
                <div class="swiper-wrapper">
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM slider ORDER BY id DESC");
                    $stmt->execute();
                    $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($sliders as $slider) { ?>
                        <!-- Banner Slide -->
                        <div class="banner-slide swiper-slide">
                            <div class="outer-box">
                                <div class="inner-box">
                                    <div class="bg bg-pattern-15"
                                        style="background-image:url('upload/<?php echo $slider['image']; ?>'); 
                            background-size:cover;
                            background-position:center;
                            background-repeat:no-repeat;">
                                    </div>
                                    <div class="row">

                                        <!-- Content Column -->
                                        <div class="content-column col-lg-12 col-md-12 col-sm-12">
                                            <div class="inner-column">
                                                <h1 class="title-sp animate-2">Business</h1>
                                                <h1 class="title animate-2"><?= htmlspecialchars($slider['title']) ?></h1>
                                                <div class="text animate-3 d-flex justify-content-center text-center" style="width: 80%; margin: 0 auto;">
                                                    <?= $slider['description'] ?>
                                                </div>
                                                <div class="btn-box animate-4">
                                                    <a class="theme-btn-main" href="contact.php">
                                                        <span class="theme-btn-arrow-left"><i class="fa fa-arrow-right"></i></span>
                                                        <span class="theme-btn">Contact Us</span>
                                                        <span class="theme-btn-arrow-right"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>


            <div class="nav-box">
                <div class="swiper-button-prev"><span class="icon fa fa-angle-left "></span></div>
                <div class="swiper-button-next"><span class="icon fa fa-angle-right "></span></div>
            </div>

        </section>
        <!-- End Banner Section -->

        <!-- Client Section -->
        <section class="client-section pb-0 mb-4 ">
            <div class="shape-4"></div>

            <div class="auto-container">
                <div class="outer-box">

                    <div class="title-box">
                        <h5 class="title">Our Trusted  <br>Clients</h5>
                        <i class="icon fa fa-arrow-up-right-from-square"></i>
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
        <section class="about-section-two pt-0 mt-5">
            <div class="shape-15 zoom-one"></div>
            <div class="icon-18 bounce-x"></div>
            <div class="auto-container">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-xl-6 col-lg-12 col-md-12 col-sm-12 order-xl-2 wow fadeInRight">
                        <div class="inner-column">
                            <div class="sec-title">
                                <div class="sub-title">About Us</div>
                                <h2 class="text-reveal-anim">Welcome to Our Smart <br> Digital Agency</h2>
                            </div>
                            <div class="text">Drafticode is a professional Digital Marketing Company Near Me for businesses looking for reliable digital solutions in Bhubaneswar and across India. Our mission is to help companies grow through innovative marketing strategies and modern digital technologies.</div>

                            <div class="list-box style-two">
                                <ul class="list-style-two two-column">
                                    <li><i class="fa fa-check-circle"></i> Innovative Solutions</li>
                                    <li><i class="fa fa-check-circle"></i> User-Friendly Interface</li>
                                    <li><i class="fa fa-check-circle"></i> Social Media Growth</li>
                                    <li><i class="fa fa-check-circle"></i> Real-Time Analytics</li>
                                </ul>
                            </div>

                            <!--Skills-->
                            <div class="skills style-two">
                                <div class="skill-item">
                                    <div class="skill-header">
                                        <div class="skill-title">Marketing</div>
                                    </div>
                                    <div class="skill-bar">
                                        <div class="bar-inner">
                                            <div class="bar progress-line" data-width="86">
                                                <div class="skill-percentage">
                                                    <div class="count-box"><span class="count-text" data-speed="3000"
                                                            data-stop="98">0</span>%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-box">
                                <a class="theme-btn-main" href="about.php">
                                    <span class="theme-btn-arrow-left"><i class="fa fa-arrow-right"></i></span>
                                    <span class="theme-btn">Know More</span>
                                    <span class="theme-btn-arrow-right"><i class="fa fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12 wow fadeInLeft"
                        data-wow-delay="300ms">
                        <div class="inner-column">
                            <figure class="image"><img src="images/resource/about2-1.jpg" alt="Image"></figure>
                            <figure class="image-two"><img src="images/resource/about2-2.jpg" alt="Image"></figure>
                            <div class="btn-box">
                                <a href="about.php">
                                    <svg viewBox="0 0 100 100" width="100" height="100" class="circular-text">
                                        <defs>
                                            <path id="circle"
                                                d="M 50, 50m -37, 0a 37,37 0 1,1 74,0a 37,37 0 1,1 -74,0" />
                                        </defs>
                                        <text>
                                            <textPath xlink:href="#circle">Explore More Explore More</textPath>
                                        </text>
                                    </svg>
                                    <i class="icon fa fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                            <div class="exp-box">
                                <div class="content">
                                    <h2 class="count">7+</h2>
                                    <div class="text">Years of<br>Experience</div>
                                </div>
                            </div>
                            <div class="icon-15"></div>
                            <div class="icon-16 zoom-one"></div>
                            <div class="icon-17 bounce-x"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <?php
include 'connection/config.php';
$services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll();
?>

<!-- Service Section -->
<section class="service-section">
    <div class="bg bg-pattern-2"></div>
    <div class="auto-container">
        <div class="sec-title text-center">
            <div class="sub-title">Our Services</div>
            <h2 class="text-reveal-anim">Services We’re <br> Offering to Customers</h2>
        </div>

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
                                <i class="icon <?= $service['icon'] ?>"></i>
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
                                        Read More
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

        <!-- Funfact Section -->
        <section class="funfact-section pb-0">
            <div class="bg bg-pattern-3"></div>
            <div class="outer-box">
                <div class="bg bg-image" style="background-image: url(images/background/3.png);"></div>
                <div class="auto-container">
                    <div class="fact-counter">
                        <div class="row">
                            <!-- Counter Block -->
                            <div class="counter-block col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-success"></i></div>
                                    <div class="count-box"><span class="count-text" data-speed="3000"
                                            data-stop="30">0</span>+</div>
                                    <div class="text">Active Projects</div>
                                </div>
                            </div>
                            <!-- Counter Block -->
                            <div class="counter-block col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp"
                                data-wow-delay="300ms">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-marketing"></i></div>
                                    <div class="count-box"><span class="count-text" data-speed="3000"
                                            data-stop="40">0</span>+</div>
                                    <div class="text">Satisfied Customers</div>
                                </div>
                            </div>
                            <!-- Counter Block -->
                            <div class="counter-block col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp"
                                data-wow-delay="600ms">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-promotion"></i></div>
                                    <div class="count-box"><span class="count-text" data-speed="3000"
                                            data-stop="100">0</span>%</div>
                                    <div class="text">satisfaction</div>
                                </div>
                            </div>
                            <!-- Counter Block -->
                            <div class="counter-block col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp"
                                data-wow-delay="900ms">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-diplomat"></i></div>
                                    <div class="count-box"><span class="count-text" data-speed="3000"
                                            data-stop="5">0</span>+</div>
                                    <div class="text">Years Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="title-box">
                        <h3 class="title">We craft bold digital experiences that grow <br> brands &
                            turn ideas into impact.</h3>
                        <div class="exp-box wow fadeInUp" data-wow-delay="300ms">
                            <svg viewBox="0 0 100 100" width="100" height="100" class="circular-text">
                                <defs>
                                    <path id="circle" d="M 50, 50m -37, 0a 37,37 0 1,1 74,0a 37,37 0 1,1 -74,0" />
                                </defs>
                                <text>
                                    <textPath xlink:href="#circle">Since 2018 Since 2018 Since 2018 Since 2018 Since
                                        2018</textPath>
                                </text>
                            </svg>
                            <div class="icon-box"><i class="icon flaticon-technology"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Funfact Section -->

        <!-- Project Section -->
        <section class="project-section">
            <div class="sec-title light text-center">
                <div class="sub-title">Our Work</div>
                <h2 class="text-reveal-anim">Our Recently <br> Completed Projects</h2>
            </div>
            <div class="outer-box"> 
                <!-- Project Swiper -->
                <div class="project-swiper">
                    <div class="swiper-wrapper">
                         <?php
      $projects = $pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();
      foreach ($projects as $project) { ?>
                        <!-- Project Block -->
                        <div class="project-block swiper-slide">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="project_details.php?slug=<?= urlencode($project['slug']) ?>">
                <img src="upload/<?= htmlspecialchars($project['image']) ?>" alt="Image">
              </a></figure>
                                </div>
                                <div class="content-box">
                                    <!-- <div class="cat-box">
                                        <div class="cat">marketing</div>
                                    </div> -->
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
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- End Project Section -->

        <!-- Marquee Section -->
        <section class="marquee-section">
            <div class="shape-5"></div>
            <div class="marquee-container">
                <div class="marquee">
                    <div class="text">CONTENT MARKETING</div>
                    <div class="icon-9"></div>
                    <div class="text two">E-COMMERCE SOLUTION</div>
                    <div class="icon-9"></div>
                    <div class="text">SEARCH ENGINE OPTIMIZATION</div>
                    <div class="icon-9"></div>
                    <div class="text two">SOCIAL MEDIA MARKETING</div>
                    <div class="icon-9"></div>
                    <div class="text">WEBSITE DESIGN & DEVELOPMENT</div>
                    <div class="icon-9"></div>
                    <div class="text two">SEO AUDIT</div>
                    <div class="icon-9"></div>
                    <div class="text">WEBSITE SEQURITY AUDIT</div>
                
                </div>
            </div>
        </section>
        <!-- End Marquee Section -->


<?php


// Fetch all FAQs
$stmt = $pdo->query("SELECT * FROM faq ORDER BY id ASC");
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Faq Section -->
<section class="faq-section">
    <div class="shape-17"></div>
    <div class="auto-container">
        <div class="row">
            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12 wow fadeInLeft" data-wow-delay="200ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <div class="sub-title">our faqs</div>
                        <h2 class="text-reveal-anim">Empowering Growth <br> with Innovation</h2>
                    </div>
                    <!-- Accordion Box -->
                    <ul class="accordion-box">

                        <?php
                        $active = 'active-block';
                        $current = 'current';
                        foreach($faqs as $faq):
                        ?>
                        <!--Block-->
                        <li class="accordion block <?= $active ?>">
                            <div class="acc-btn <?= $active ?>">
                                <?= htmlspecialchars($faq['question']) ?>
                                <i class="icon fa fa-plus"></i>
                            </div>
                            <div class="acc-content <?= $current ?>">
                                <div class="content">
                                  <div class="text"><?= $faq['answer'] ?></div>
                                </div>
                            </div>
                        </li>
                        <?php
                        // After first item, remove active classes
                        $active = '';
                        $current = '';
                        endforeach;
                        ?>

                    </ul>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <figure class="image reveal bounce-x"><img src="images/resource/faq1-1.png" alt="Image"></figure>
                    <div class="icon-20 bounce-y"></div>
                    <div class="icon-21 bounce-x"></div>
                    <div class="icon-22"></div>
                    <div class="icon-23 "></div>
                    <div class="icon-24 zoom-one"></div>
                    <div class="icon-25 zoom-one"></div>
                    <div class="shape-18 zoom-one"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Faq Section -->
 
    <!-- Testimonial Section -->
        <section class="testimonial-section-two">
            <div class="bg bg-pattern-11"></div>
            <div class="auto-container">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title">
                                <div class="sub-title">Testimonials</div>
                                <h2 class="text-reveal-anim">What They’re Talking <br> About Company?</h2>
                                <div class="text">Discover what our clients have to say about their experience working with us and how our solutions have helped their businesses grow. </div>
                            </div>

                            <div class="outer-box">
                                <div class="nav-box">
                                    <div class="swiper-button-prev"><span class="icon fa fa-angle-left "></span></div>
                                    <div class="swiper-button-next"><span class="icon fa fa-angle-right "></span></div>
                                </div>
                            </div>
                            <div class="icon-26 bounce-x"></div>
                        </div>
                    </div>

                   <?php
include 'connection/config.php';

// Fetch testimonials
$testimonials = $pdo->query("SELECT * FROM testimonial ORDER BY id DESC")->fetchAll();
?>

<!-- Blocks Column -->
<div class="blocks-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
    <div class="inner-column">
        <div class="swiper-outer">
            <div class="swiper testi-swiper-two">
                <div class="swiper-wrapper">

                    <?php foreach ($testimonials as $t): ?>

                    <!-- Testimonial Block -->
                    <div class="testimonial-block-two swiper-slide">
                        <div class="inner-box">
                            <div class="shape-19"></div>

                            <div class="content-box">
                                <div class="icon-quote-2"></div>

                                <!-- Static Image (optional: make dynamic later) -->
                                <div class="author-image">
                                    <img src="upload/author.gif" alt="Image">
                                </div>

                                <!-- Testimonial Text -->
                                <div class="text">
                                     <?= $t['testimonial'] ?>
                                </div>

                                <div class="author-box">
                                    <div class="author-info">
                                        <h6 class="name">
                                            <?= htmlspecialchars($t['name']) ?>
                                        </h6>
                                    </div>

                                    <!-- Static Rating -->
                                    <ul class="rating">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
                </div>
            </div>
        </section>
        <!-- End Testimonial Section -->


        <!-- Benefit Section -->
        <section class="benefit-section">
            <div class="bg bg-pattern-5"></div>
            <div class="auto-container">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-xl-6 col-lg-12 col-md-12 col-sm-12 order-2 wow fadeInRight"
                        data-wow-delay="200ms">
                        <div class="inner-column">
                            <div class="sec-title">
                                <div class="sub-title">Why Choose Drafticode</div>
                                <h2 class="text-reveal-anim">Why You Should <br> Choose Our Agency</h2>
                               
                            </div>

                            <!-- Benefit Block -->
                            <div class="benefit-block">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-graphic-design"></i></div>
                                    <div class="content-box">
                                        <h6 class="title">Proven Expertise</h6>
                                        <div class="text">Ranked as the Best SEO Services Company In India with 500+ successful campanies.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefit Block -->
                            <div class="benefit-block">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-teaching"></i></div>
                                    <div class="content-box">
                                        <h6 class="title">Full-Service Agency</h6>
                                        <div class="text">From PPC Management For Agencies to Custom Website Development, we cover all bases.</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Benefit Block -->
                            <div class="benefit-block">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-laptop"></i></div>
                                    <div class="content-box">
                                        <h6 class="title">Local Leaders</h6>
                                        <div class="text">Premier Digital Marketing Company Near Me in Bhubaneswar for SMM Services Near Me.</div>
                                    </div>
                                </div>
                            </div>
                             <!-- Benefit Block -->
                            <div class="benefit-block">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon flaticon-graphic-design"></i></div>
                                    <div class="content-box">
                                        <h6 class="title">Results-Oriented</h6>
                                        <div class="text">Online Marketing Agency delivering 300%+ ROI through data-driven strategies.</div>
                                    </div>
                                </div>
                            </div>
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
                    <div class="image-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <figure class="image reveal"><img src="images/resource/benefit1-1.jpg" alt="Image"></figure>
                            <div class="exp-box bounce-x wow fadeInUp" data-wow-delay="300ms">
                                <i class="icon flaticon-recommend"></i>
                                <div class="cat">GROW BUSINESS</div>
                                <h4 class="title">We Help Your Business <br> To Become More <br> Stronger</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Benefit Section -->

        <?php
        include 'connection/config.php';

        $stmt = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC");
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <!-- News Section -->
        <section class="news-section">
            <div class="shape-12"></div>
            <div class="shape-13"></div>
            <div class="bg bg-pattern-6"></div>

            <div class="auto-container">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-xl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <div class="sec-title">
                                <div class="sub-title">Blog posts</div>
                                <h2 class="text-reveal-anim">Recent Updates & Insights from Our Blog</h2>
                            </div>

                            <div class="outer-box">
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
                    </div>

                    <!-- Blocks Column -->
                    <div class="blocks-column col-xl-8 col-lg-12 col-md-12 col-sm-12">

                        <div class="inner-column">

                            <div class="swiper news-swiper-two">

                                <div class="swiper-wrapper">

                                    <?php foreach ($blogs as $blog): ?>

                                        <!-- News Block -->
                                        <div class="news-block swiper-slide">

                                            <div class="inner-box">

                                                <div class="image-box">

                                                    <figure class="image">
                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>">
                                                            <img src="upload/<?= htmlspecialchars($blog['image']) ?>" alt="Image">
                                                        </a>
                                                    </figure>

                                                   <div class="date-box d-flex flex-column justify-content-center align-items-center text-center">
                                                        <div class="date small fw-semibold">
                                                            <?= htmlspecialchars($blog['date']) ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="content-box">

                                                    <div class="content">
                                                        <ul class="post-meta">
                                                            <li></li>
                                                        </ul>


                                                        <h4 class="title">
                                                            <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>">
                                                                <?= htmlspecialchars($blog['title']) ?>
                                                            </a>
                                                        </h4>

                                                        <div class="text">
                                                            <?php
                                                            $text = strip_tags($blog['short_description']);
                                                            $words = explode(" ", $text);
                                                            echo implode(" ", array_slice($words, 0, 8));
                                                            if (count($words) > 8) echo "...";
                                                            ?>
                                                        </div>

                                                    </div>

                                                    <div class="btn-box">

                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>" class="text">
                                                            Read More
                                                        </a>

                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>" class="readmore">
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    <?php endforeach; ?>
                                    <?php foreach ($blogs as $blog): ?>

                                        <!-- News Block -->
                                        <div class="news-block swiper-slide">

                                            <div class="inner-box">

                                                <div class="image-box">

                                                    <figure class="image">
                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>">
                                                            <img src="upload/<?= htmlspecialchars($blog['image']) ?>" alt="Image">
                                                        </a>
                                                    </figure>

                                                   

                                                    <div class="date-box d-flex flex-column justify-content-center align-items-center text-center">
                                                        <div class="date small fw-semibold">
                                                            <?= htmlspecialchars($blog['date']) ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="content-box">

                                                    <div class="content">
                                                        <ul class="post-meta">
                                                            <li></li>
                                                        </ul>


                                                        <h4 class="title">
                                                            <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>">
                                                                <?= htmlspecialchars($blog['title']) ?>
                                                            </a>
                                                        </h4>

                                                        <div class="text">
                                                            <?php
                                                            $text = strip_tags($blog['short_description']);
                                                            $words = explode(" ", $text);
                                                            echo implode(" ", array_slice($words, 0, 8));
                                                            if (count($words) > 8) echo "...";
                                                            ?>
                                                        </div>

                                                    </div>

                                                    <div class="btn-box">

                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>" class="text">
                                                            Read More
                                                        </a>

                                                        <a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>" class="readmore">
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    <?php endforeach; ?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- End News Section -->



        <?php include "common/footer.php"; ?>