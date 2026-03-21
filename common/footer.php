<footer class="main-footer footer-style-one style-two">
	<div class="bg bg-pattern-7"></div>
	<div class="widgets-section">
		<div class="auto-container">
			<ul class="contact-list-two row">
				

				<li class="col-lg-3 col-md-6 col-sm-12">
					<div class="icon-box"><i class="icon fa fa-phone"></i></div>
					<div class="content">
						<div class="subtitle">call emergency</div>
						<div class="text">
							<a href="tel:<?php echo $settings['phone']; ?>">
								<?php echo $settings['phone']; ?>
							</a>
						</div>
					</div>
				</li>
				
				<li class="col-lg-4 col-md-6 col-sm-12">
					<div class="icon-box"><i class="icon fa fa-envelope"></i></div>
					<div class="content">
						<div class="subtitle">send email</div>
						<div class="text">
							<a href="mailto:<?php echo $settings['email']; ?>">
								<?php echo $settings['email']; ?>
							</a>
						</div>
					</div>
				</li>
				<li class="col-lg-5 col-md-6 col-sm-12">
					<div class="icon-box"><i class="icon fa fa-map-marker-alt"></i></div>
					<div class="content">
						<div class="subtitle">office address</div>
						<div class="text"><?php echo $settings['address']; ?></div>
					</div>
				</li>

			</ul>
			<div class="row">
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget about-widget">
						<figure class="image bg-white d-flex justify-content-center"><a href="index.php"><img src="upload/<?php echo $settings['logo']; ?>" alt="Image"></a>
						</figure>
						<div class="text">Empowering brands with cutting-edge digital solutions to drive growth
							and innovation.</div>
						<ul class="social-icon-two">
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
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget links-widget">
						<h5 class="widget-title">Quick Links</h5>
						<ul class="user-links">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="service.php">Our services</a></li>
							<li><a href="ourproducts.php">Our Products</a></li>
							<li><a href="project.php">Our Projects</a></li>
							<li><a href="blog.php">Blog</a></li>
							<li><a href="contact.php">Contact</a></li>
							
						</ul>
					</div>
				</div>
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget links-widget two">
						<h5 class="widget-title">Services</h5>
						<ul class="user-links">
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
					</div>
				</div>
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-6">
					<div class="footer-widget newsletter-widget">
						<h4 class="widget-title">Newsletter</h4>
						<div class="newsletter-form">
							<form method="post" action="#">
								<div class="form-group">
									<input type="email" name="email" class="email" value=""
										placeholder="Email Address" required>
									<button type="submit" class="form-btn"><i
											class="fa fa-paper-plane"></i></button>
								</div>
								<div class="form-group checkbox">
									<label class="custom-checkbox">
										<input type="checkbox" checked>
										<span class="checkmark"></span>
										I agree to all your terms and policies
									</label>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="auto-container">
			<div class="inner-container">
				<div class="copyright-text">
					© <?php echo date('Y'); ?> Company.com. All Rights Reserved. 
					Designed & Developed by 
					<a class="text-warning fw-bold" href="https://drafticode.com/" target="_blank" rel="noopener">Drafticode</a>
				</div>
				<div class="right-box">
					<ul class="footer-nav">
						<li><a href="term_condition.php">Terms & Conditions</a></li>
						<li><a href="privacy_policy.php">Privacy Policy</a></li>
					</ul>                           
					<div class="scroll-to-top scroll-to-target" data-target="html">Top <span class="fa fa-arrow-up"></span>
				</div>
			</div>
		</div>
		</div>
	</div>
</footer>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/gsap.min.js"></script>
    <script src="js/ScrollTrigger.min.js"></script>
    <script src="js/SplitText.min.js"></script>
    <script src="js/splitType.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script-gsap.js"></script>
</body>


<!-- Mirrored from php.kodesolution.com/2025/onicx-php/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:42 GMT -->
</html>  