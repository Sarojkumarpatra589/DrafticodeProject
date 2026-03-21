<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/blog.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:47 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Onicx - Digital Agency PHP Template | Page News</title>

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
                                    <h1 class="title">News</h1>
                                </div>
                                <ul class="breadcume-pull">
                                    <li><a class="title-line" href="index.php">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                                    <li>News</li>
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

        $stmt = $pdo->prepare("SELECT * FROM blogs ORDER BY id DESC");
        $stmt->execute();
        $blogs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <!-- News Section -->
        <section class="news-section-two">
            <div class="auto-container">
                <div class="row">
                    <?php foreach ($blogs as $blog): ?>
                        <!-- News Block -->
                        <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="blog_details.php?slug=<?= htmlspecialchars($blog['slug']) ?>">
                                            <img src="upload/<?= htmlspecialchars($blog['image']) ?>" alt="Image">
                                        </a></figure>
                                    <?php
                                    $date = date("d", strtotime($blog['id']));
                                    $month = date("M", strtotime($blog['id']));
                                    ?>

                                    <div class="date-box">
                                        <div class="date"><?= $date ?></div>
                                        <div class="month"><?= $month ?></div>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li><i class="icon fa fa-comment"></i> 2 Comment</li>
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
        </section>
        <!-- End News Section -->


        <?php include "common/footer.php"; ?>