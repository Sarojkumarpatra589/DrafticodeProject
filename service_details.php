<?php
include 'connection/config.php';

// Get slug
$slug = $_GET['slug'] ?? '';

// Fetch current service
$stmt = $pdo->prepare("SELECT * FROM services WHERE slug = ?");
$stmt->execute([$slug]);
$service = $stmt->fetch();

// Fetch all services (sidebar)
$services = $pdo->query("SELECT title, slug FROM services ORDER BY id DESC")->fetchAll();

if (!$service) {
    echo "Service not found";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?= htmlspecialchars($service['title']) ?> | Service Details</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <link rel="icon" href="images/favicon.png" type="image/x-icon" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
    h1,h2{
        font-size: 30px;
    }
    .service-details-section .contents-column .expert-title .title{
        font-size: 30px;
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                      <div class="breadcumb-title">
                        <h1 class="title"><?= htmlspecialchars($service['title']) ?></h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li>
                            <a class="title-line" href="index.php">
                                Home <span><i class="fas fa-angle-right"></i></span>
                            </a>
                        </li>
                        <li><?= htmlspecialchars($service['title']) ?></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>

<!-- Service Details Section -->
<section class="service-details-section">
	<div class="auto-container">
		<div class="row">

            <!-- Sidebar -->
            <div class="sidebar-column col-lg-4">
				<div class="row">
					<div class="col-lg-12">

                        <div class="widget-sidber">
							<h4 class="title">Service List</h4>

							<div class="widget-category">
								<ul>
									<?php foreach ($services as $s): ?>
									<li>
										<a href="service-details.php?slug=<?= $s['slug'] ?>">
											<?= htmlspecialchars($s['title']) ?>
											<i class="icon fas fa-angle-right"></i>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>	

						<div class="widget-sidber-box">
                            <div class="inner-contact-box">
                                <h4 class="title"><?php echo $settings['phone']; ?></h4>
                                <h6 class="title2">Address</h6>
                                <p class="contact-text"><?php echo $settings['address']; ?></p>
                            </div>
                            
                            <div class="inner-contact-box">
                                <h6 class="title2">Email</h6>
                                <p class="contact-text"><?php echo $settings['email']; ?></p>
                            </div>

                            <ul class="social-icon-four upper2">
                               <li><a href="<?php echo $settings['facebook']; ?>"  target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="<?php echo $settings['twitter']; ?>"  target="_blank"><i class="fab fa-x-twitter"></i></a></li>
							<li>
								<a href="<?php echo $settings['linkedin']; ?>" target="_blank">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</li>

							<li>
								<a href="<?php echo $settings['instagram']; ?>" target="_blank">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li><a href="<?php echo $settings['youtube']; ?>"  target="_blank"><i class="fab fa-youtube"></i></a></li>
                            </ul>														
						</div>						

					</div>
				</div>
			</div>	

			<!-- Content -->
			<div class="contents-column col-lg-8">
				<div class="row">
					<div class="col-lg-12">	

                        <!-- Image -->
                        <div class="image-box">
                            <figure class="image">
                                <a href="#">
                                    <img src="upload/<?= htmlspecialchars($service['image']) ?>" alt="Image">
                                </a>
                            </figure>
                        </div>					

						<div class="service-content">


							<p class="service-desc">
                                 <?= $service['description'] ?>
                            </p>
						</div>

						<div class="expert-title">
							<h3 class="title">What We Provide</h3>
						</div>

						<div class="expert-desc">
							<p><?= htmlspecialchars($service['short_desc'] ?? 'Service details information.') ?></p>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6">
								<ul class="list-style-two">
                                    <li><i class="fa fa-check-circle"></i> Quality Service</li>
                                    <li><i class="fa fa-check-circle"></i> Expert Team</li>
                                    <li><i class="fa fa-check-circle"></i> 24/7 Support</li>
                                </ul>
							</div>

							<div class="col-lg-6 col-md-6">
								<ul class="list-style-two">
                                    <li><i class="fa fa-check-circle"></i> Affordable Pricing</li>
                                    <li><i class="fa fa-check-circle"></i> Fast Delivery</li>
                                    <li><i class="fa fa-check-circle"></i> Modern Technology</li>
                                </ul>
							</div>
						</div>

					</div>
				</div>
			</div>						

		</div>
	</div>
</section>

<?php include "common/footer.php"; ?>

</div>
</body>
</html>