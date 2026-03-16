<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/page-contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Onicx - Digital Agency PHP Template | Contact Us</title>

  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <link rel="icon" href="images/favicon.png" type="image/x-icon" />

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
                        <h1 class="title">Contact Us</h1>
                      </div>
                      <ul class="breadcume-pull">
                        <li><a class="title-line" href="index-2.html">Home <span><i class="fas fa-angle-right"></i></span></a></li>
                        <li>Contact</li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </section>
<!-- End Breadcume Section -->






<!-- Contact Section -->
<section class="contact-section-five">
	<div class="outer-box">
	<div class="auto-container">
		<div class="row">
			<!-- Content Column -->
			<div class="content-column col-xl-7 col-lg-6 col-md-12 col-sm-12 wow fadeInLeft">
				<div class="inner-column">
					<div class="sec-title">
						<h2 class="text-reveal-anim">Contact With Us</h2>
					</div>

					<!-- Contact Form -->
					<div class="contact-form-three">
						<form method="post" action="#" id="contact-form">
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="name" placeholder="Your Name" required>
								</div>
					
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="email" name="email" placeholder="Email Address" required>
								</div>
					
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="text" name="subject" placeholder="Subject" required>
								</div>
					
								<div class="form-group col-lg-6 col-md-6 col-sm-12">
									<input type="tel" name="tel" placeholder="Phone" required>
								</div>
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<textarea name="message" placeholder="Write a Message" required></textarea>
								</div>
								<div class="form-group col-lg-12 col-md-12 col-sm-12">
									<div class="btn-box">
										<button class="theme-btn btn-style-three upper"><span class="btn-title">Send Message</span></button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!--End Contact Form -->
				</div>
			</div>

			<!-- contact Column -->
			<div class="contact-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
				<div class="inner-column">
						<div class="inner-box">
						<h6 class="title">Number</h6>
						<div class="text"><?php echo $settings['phone']; ?></div>\
						</div>
						<div class="inner-box">
						<h6 class="title">Address</h6>
						<div class="text"><?php echo $settings['address']; ?></div>
						</div>
						<div class="inner-box">
						<h6 class="title">Email</h6>
						<div class="text"><?php echo $settings['email']; ?></div>
						</div>
						<ul class="social-icon-four">
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
	</div>
</section>
<!-- End Contact Section -->

<!-- Map Section -->
<section class="map-section-three">
	<iframe src="<?php echo $settings['map_link']; ?>" allowfullscreen=""></iframe>
</section>
<!-- End Map Section --> 
 


<?php include "common/footer.php"; ?>