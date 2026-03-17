<?php
require 'connection/config.php';

$slug = $_GET['slug'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug=?");
$stmt->execute([$slug]);
$blog = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$blog){
    echo "Blog not found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
<title><?= $blog['title'] ?></title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="shortcut icon" href="images/favicon.png">

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div class="page-wrapper">

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
<h1 class="title"><?= $blog['title'] ?></h1>
</div>

<ul class="breadcume-pull">
<li>
<a class="title-line" href="index.php">
Home
<span><i class="fas fa-angle-right"></i></span>
</a>
</li>
<li>News</li>
</ul>

</div>
</div>

</div>
</div>
</div>
</section>

<!-- Blog Details -->

<section class="blog-details-section">
<div class="auto-container">

<div class="row">

<div class="contents-column col-lg-8">

<div class="blog-content">

<h2 class="title"><?= $blog['title'] ?></h2>

<ul class="blog-author">



</ul>

</div>

<div class="image-box">

<figure class="image">
<img src="upload/<?= $blog['image'] ?>" alt="">
</figure>

</div>

<div class="expert-desc">

<?= $blog['description'] ?>

</div>

</div>


<!-- Sidebar -->

<div class="col-lg-4">

<div class="blog-sidebar">

<aside class="blog-sidebar-area">

<div class="blog-post">

<h3 class="title">Recent Posts</h3>

<div class="recent-post-wrap">

<?php
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 3");

while($recent = $stmt->fetch(PDO::FETCH_ASSOC)){
?>

<div class="recent-post">

<div class="post-img">
<a href="blog-details.php?slug=<?= $recent['slug'] ?>">
<img src="upload/<?= $recent['image'] ?>" alt="" height="100px" width="100px">
</a>
</div>

<div class="post-content">

<h4 class="post-title">
<a href="blog-details.php?slug=<?= $recent['slug'] ?>">
<?= $recent['title'] ?>
</a>
</h4>

<div class="post-date">
    <a href="#">
        <i class="icon far fa-folder-open"></i>
        <?php
        // Get first 10 words
        $words = explode(' ', $recent['short_description']);
        $short = implode(' ', array_slice($words, 0, 7));
        echo $short . (count($words) > 7 ? '...' : '');
        ?>
    </a>
</div>

</div>

</div>

<?php } ?>

</div>
</div>


<div class="widget_tag_cloud">

<h3 class="title">Tags</h3>

<div class="tagcloud">
<a href="#">Technology</a>
<a href="#">Industry</a>
<a href="#">Marketing</a>
<a href="#">Design</a>
</div>

</div>

</aside>

</div>

</div>

</div>

</div>
</section>

<?php include "common/footer.php"; ?>

