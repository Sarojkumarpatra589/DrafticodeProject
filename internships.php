<?php
include 'connection/config.php';

// ✅ GET SLUG
if(!isset($_GET['slug'])){
    die("Internship not found");
}

$slug = $_GET['slug'];

// ✅ FETCH INTERNSHIP
$stmt = $pdo->prepare("SELECT * FROM internships WHERE slug=?");
$stmt->execute([$slug]);
$internship = $stmt->fetch();

if(!$internship){
    die("Internship not found");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <!-- ✅ SEO META -->
  <title><?= htmlspecialchars($internship['meta_title'] ?? $internship['title']) ?></title>
  <meta name="keywords" content="<?= htmlspecialchars($internship['meta_keywords'] ?? '') ?>">
  <meta name="description" content="<?= htmlspecialchars($internship['meta_description'] ?? '') ?>">

  <!-- Styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.png">
  <link rel="icon" href="images/favicon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                            <h1 class="title fs-1"><?= htmlspecialchars($internship['title']) ?></h1>
                        </div>
                        <ul class="breadcume-pull">
                            <li>
                                <a class="title-line" href="index.php">
                                    Home <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li><?= htmlspecialchars($internship['title']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
<!-- End Breadcume Section -->


<!-- Internship Details Section -->
<section class="project-details-section">
	<div class="auto-container">

		<div class="row">

            <!-- LEFT SIDE -->
            <div class="project-column col-lg-4">
                <div class="inner-box">

                    <div class="project-title">
                        <h4 class="title">Internship Details</h4>
                    </div>

                    <div class="project-name">
                        <ul class="project">

                            <li>Category: 
                                <span><?= htmlspecialchars($internship['department'] ?? 'N/A') ?></span>
                            </li>

                            <li>Company: 
                                <span><?= htmlspecialchars($internship['company'] ?? 'Drafticode') ?></span>
                            </li>

                            <li>Duration: 
                                <span><?= htmlspecialchars($internship['duration'] ?? 'N/A') ?></span>
                            </li>

                            <li>Total Openings: 
                                <span><?= htmlspecialchars($internship['openings'] ?? 'N/A') ?></span>
                            </li>

                            <li>Stipend: 
                                <span><?= htmlspecialchars($internship['stipend'] ?? 'N/A') ?></span>
                            </li>

                            <li>Location: 
                                <span><?= htmlspecialchars($internship['location'] ?? 'N/A') ?></span>
                            </li>

                            <li>Last Date to Apply: 
                                <span><?= htmlspecialchars($internship['deadline'] ?? 'N/A') ?></span>
                            </li>

                        </ul>
                    </div>

                </div>
			</div>

            <!-- RIGHT SIDE -->
			<div class="content-column col-lg-8">
				<div class="inner-box">

					<div class="col-lg-12">

						<div class="project-content">

                            <!-- ✅ CKEDITOR CONTENT -->
							<div class="project-desc">
                                <?= $internship['description']; ?>
                            </div>

						</div>

					</div>

				</div>
			</div>

		</div>
	</div>
</section>

<?php include "common/footer.php"; ?>

