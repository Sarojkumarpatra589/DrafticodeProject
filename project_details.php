<?php
include 'connection/config.php';

// GET SLUG FROM URL
if(!isset($_GET['slug'])){
    die("Project not found");
}

$slug = $_GET['slug'];

// FETCH PROJECT
$stmt = $pdo->prepare("SELECT * FROM projects WHERE slug=?");
$stmt->execute([$slug]);
$project = $stmt->fetch();

if(!$project){
    die("Project not found");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <!-- ✅ SEO META -->
  <title><?= htmlspecialchars($project['meta_title'] ?? $project['title']) ?></title>
  <meta name="keywords" content="<?= htmlspecialchars($project['meta_keywords'] ?? '') ?>">
  <meta name="description" content="<?= htmlspecialchars($project['meta_description'] ?? '') ?>">

  <!-- Styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="icon" href="images/favicon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
    .project-desc h1{
        font-size:20px;
    }
</style>

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
            <div class="breadcumb-content">
                <div class="breadcumb-title">
                    <h1 class="title"><?= htmlspecialchars($project['title']) ?></h1>
                </div>
                <ul class="breadcume-pull">
                    <li><a href="index.php" class="text-white">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                    <li><?= htmlspecialchars($project['title']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Project Section -->
<section class="project-details-section">
    <div class="auto-container">

        <!-- ✅ MAIN IMAGE -->
        <div class="image-box">
            <figure class="image">
                <img src="upload/<?= htmlspecialchars($project['image']) ?>" alt="Image"  width="100%">
            </figure>
        </div>

        <div class="row">

            

            <!-- RIGHT SIDE -->
            <div class="content-column col-lg-12">
                <div class="inner-box">

                    <div class="project-content">

                        <!-- ✅ CKEDITOR CONTENT -->
                        <div class="project-desc">
                            <?= $project['description']; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include "common/footer.php"; ?>

