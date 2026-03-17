<?php
include 'connection/config.php';

// Fetch current settings (single row id=1)
$stmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>


<!-- Main Header -->
<header class="main-header header-style-three">
    <div class="header-lower">
        <!-- Main box -->
        <div class="main-box">
            <div class="logo-box">
                <div class="logo">
                    <a href="index.php" title=""><img src="upload/<?php echo $settings['logo']; ?>" alt="" title="Drafticode"></a>
                </div>
            </div>
            <!--Nav Box-->
            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li class="dropdown"><a href="#">We Offer</a>
                            <ul>
                               <li class="dropdown">
    <a href="service.php">Services &nbsp;&nbsp;</a>

    <ul>
        <?php 
        $serviceshead = $pdo->query("SELECT title, slug FROM services ORDER BY id DESC")->fetchAll();
        foreach($serviceshead as $servicehead): ?>
        <li>
            <a href="service_details.php?slug=<?= $servicehead['slug'] ?>">
                <?= htmlspecialchars($servicehead['title']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</li>
                                <li class="dropdown"><a href="ourproducts.php">Our Products &nbsp;&nbsp;</a>
                                    <ul>
        <?php 
        $productshead = $pdo->query("SELECT title, slug FROM products ORDER BY id DESC")->fetchAll();
        foreach($productshead as $producthead): ?>
        <li>
            <a href="product_details.php?slug=<?= $producthead['slug'] ?>">
                <?= htmlspecialchars($producthead['title']) ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
                                </li>
                            </ul>
                        </li>  
                        <!-- ✅ Closes "We Offer" <li> -->
                         <!-- ✅ Now correctly inside <ul class="navigation"> -->
                        <li class="dropdown"><a href="#">Pricing</a>
                            <ul>
                                <li><a href="smm_package.php
                                ">SMM Package</a></li>
                                <li><a href="seo_package.php
                                ">SEO Package</a></li>
                                <li><a href="development_package.php">Development Package</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Careers</a>
                            <ul>
                                <li><a href="course.php">Courses</a></li>
                                <li><a href="job.php">Job</a></li>
                                <li class="dropdown"><a href="#
                                ">Internship  &nbsp;&nbsp;</a>
                                    <ul>
                                        <li><a href="dev_intern.php">Web Development Internship</a></li>
                                        <li><a href="marketing_intern.php">Digital Marketing Internship</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="projects.php">Projects</a></li> 
                        <li><a href="contact.php">Contact</a></li>  <!-- ✅ Removed unnecessary dropdown wrapper -->
                    </ul>
                </nav>
            </div>
            <!-- Main Menu End-->
            <!-- Outer Box -->
            <div class="outer-box">
                <div class="info-btn">
                    <i class="icon fa fa-phone"></i>
                    <div class="header-box">
                        <h5 class="title">Have Any Questions</h5>
                        <a href="tel:+92526420009" class="phone">0000 00 111</a>
                    </div>
                </div>
                <div class="ui-btn-box">
                    <button class="ui-btns search-btn">
                        <span class="icon lnr lnr-icon-search"></span>
                    </button>
                </div>
                <!-- Btn Box -->
                <div class="btn-box">
                    <a href="page-contact.php" class="theme-btn btn-style-three"><span class="btn-title">Get in
                            Touch <i class="fa fa-arrow-right"></i></span></a>
                </div>
                <!-- Mobile Nav toggler -->
                <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo"><a href="index.php"><img src="upload/<?php echo $settings['logo']; ?>" alt="" title=""></a></div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </ul>
            <ul class="contact-list-one">
                <li>
                    <i class="icon lnr-icon-phone-handset"></i>
                    <span class="title">Call Now</span>
                    <div class="text"><a href="tel:+92880098670">+92 (8800) - 98670</a></div>
                </li>
                <li>
                    <i class="icon lnr-icon-envelope1"></i>
                    <span class="title">Send Email</span>
                    <div class="text"><a href="mailto:help@company.com">help@company.com</a></div>
                </li>
                <li>
                    <i class="icon lnr-icon-map-marker"></i>
                    <span class="title">Address</span>
                    <div class="text">66 Broklyant, New York India 3269</div>
                </li>
            </ul>
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </nav>
    </div><!-- End Mobile Menu -->

    <!-- Header Search -->
    <div class="search-popup">
        <span class="search-back-drop"></span>
        <button class="close-search"><span class="fa fa-times"></span></button>
        <div class="search-inner">
            <form method="post" action="https://php.kodesolution.com/2025/onicx-php/blog-showcase.php">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Search..." required="">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Header Search -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <div class="logo">
                    <a href="index-2.php" title=""><img src="upload/<?php echo $settings['logo']; ?>" alt="" title=""></a>
                </div>
                <div class="nav-outer">
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </ul>
                        </div>
                    </nav>
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
    </div><!-- End Sticky Menu -->
</header>
<!-- End Main Header -->