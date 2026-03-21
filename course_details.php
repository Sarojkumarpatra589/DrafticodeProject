<?php
include 'connection/config.php';

// ✅ GET SLUG
if(!isset($_GET['slug'])){
    die("Course not found");
}

$slug = $_GET['slug'];

// ✅ FETCH COURSE
$stmt = $pdo->prepare("SELECT * FROM courses WHERE slug=?");
$stmt->execute([$slug]);
$course = $stmt->fetch();

if(!$course){
    die("Course not found");
}
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />

  <!-- ✅ TITLE -->
  <title><?= htmlspecialchars($course['course_name']) ?></title>

  <!-- Styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
   <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >

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
                            <h1 class="title fs-1"><?= htmlspecialchars($course['course_name']) ?></h1>
                        </div>
                        <ul class="breadcume-pull">
                            <li>
                                <a class="title-line" href="index.php">
                                    Home <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li><?= htmlspecialchars($course['course_name']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
<!-- End Breadcume Section -->


<!-- Course Details Section -->
<section class="project-details-section">
	<div class="auto-container">


		<div class="row">

            <!-- LEFT SIDE -->
            <div class="project-column col-lg-4">
                <div class="inner-box">

                    <div class="project-title">
                        <h4 class="title">Course Details</h4>
                        <div class="text">
                        </div>
                    </div>

                    <div class="project-name">
                        <ul class="project">

                            <li>Category: 
                                <span><?= htmlspecialchars($course['category']) ?></span>
                            </li>

                            <li>Instructor: 
                                <span><?= htmlspecialchars($course['instructor']) ?></span>
                            </li>

                            <li>Duration: 
                                <span><?= htmlspecialchars($course['duration']) ?></span>
                            </li>

                            <li>Lessons: 
                                <span><?= htmlspecialchars($course['lessons']) ?></span>
                            </li>

                            <li>Seats: 
                                <span><?= htmlspecialchars($course['seats']) ?></span>
                            </li>

                            <li>Language: 
                                <span><?= htmlspecialchars($course['language']) ?></span>
                            </li>

                            <li>Certification: 
                                <span><?= htmlspecialchars($course['certification']) ?></span>
                            </li>

                            <li>Price: 
                                <span><?= htmlspecialchars($course['course_price']) ?></span>
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
                                <?= $course['description']; ?>
                            </div>

						</div>

                        


					</div>

				</div>
			</div>

		</div>
	</div>
</section>

<?php include "common/footer.php"; ?>
