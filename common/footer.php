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
					<div class="footer-widget contact-widget">
						<h5 class="widget-title">Contact Info</h5>

						<ul class="contact-list">

							<li style="color: #9c94b3;">
								<i class="fa fa-phone"></i>&nbsp;&nbsp;+91 79751 89067
							</li>

							<li style="color: #9c94b3;">
								<i class="fa fa-envelope"></i>&nbsp;&nbsp;
								office@drafticode.com
							</li>

							<li style="color: #9c94b3;">
								<i class="fa fa-map-marker-alt"></i>&nbsp;&nbsp;
								Office 2, B-15, Arihant Plaza, Saheed Nagar, Bhubaneswar, Odisha 751007
							</li>

							<li style="color: #9c94b3;">
								<i class="fa fa-clock"></i>&nbsp;&nbsp;
								Mon - Sat: 9:00 AM - 7:00 PM
							</li>

						</ul>
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
<style>

    /* Scroll Top Button */
    .scroll__top {
      position: fixed;
      left: 20px;
      z-index: 999;
      padding: 10px 15px;
      background: #191d88;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 18px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* WhatsApp Chat Widget */
    #whatsapp-chat {
      position: fixed;
      bottom: 100px; /* Above scroll-top */
      right: 50px;
      width: 300px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      overflow: hidden;
      z-index: 1000;
    }

    .hide {
      display: none;
    }

    .header-chat {
      background-color: #0a0a0a;
      color: white;
      padding: 10px;
      display: flex;
      align-items: center;
    }

    .info-avatar img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .whatsapp-name {
      font-weight: bold;
    }

    .home-chat, .start-chat {
      padding: 10px;
    }

    .WhatsappChat__Text-sc-1wqac52-2 {
      background: #e1ffc7;
      padding: 10px;
      border-radius: 8px;
      max-width: 80%;
      margin: 10px 0;
    }

    .WhatsappChat__Time-sc-1wqac52-5 {
      font-size: 0.75em;
      color: #888;
      text-align: right;
    }

    .blanter-msg {
      display: flex;
      gap: 5px;
      margin-top: 10px;
    }

    .blanter-msg textarea {
      flex: 1;
      resize: none;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 5px;
    }

    .blanter-msg a svg {
      fill: #25d366;
      width: 24px;
      height: 24px;
      margin-top: 8px;
    }

    .close-chat {
      position: absolute;
      top: 8px;
      right: 10px;
      font-size: 20px;
      color: white;
      text-decoration: none;
    }

    .blantershow-chat {
      position: fixed;
      bottom: 30px;
      right: 10px;
      color: white;
      padding: 10px;
      border-radius: 50px;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 5px;
      z-index: 1001;
      display:none;
    }

    .blantershow-chat svg {
      width: 45px;
      height: 45px;
    }
  </style>
<!-- WhatsApp Chat Widget -->
<div id="whatsapp-chat" class="hide">
  <div class="header-chat">
    <div class="info-avatar">
      <img src="upload/<?= htmlspecialchars($settings['favicon']) ?>" alt="Drafticode" />
    </div>
    <div>
      <span class="whatsapp-name">Drafticode</span><br />
      <small>Typically replies within an hour</small>
    </div>
    <a class="close-chat" href="javascript:void(0);">×</a>
  </div>

  <div class="home-chat"></div>

  <div class="start-chat">
    <div class="WhatsappChat__Text-sc-1wqac52-2">
      Hi there 👋<br /><br />How can I help you?
    </div>
    <div class="WhatsappChat__Time-sc-1wqac52-5">1:40</div>

    <div class="blanter-msg">
      <textarea id="chat-input" placeholder="Write a response" maxlength="120" rows="1"></textarea>
      <a href="javascript:void(0);" id="send-it">
        <svg viewBox="0 0 448 448"><path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z"/></svg>
      </a>
    </div>
  </div>
</div>

<!-- Floating Chat Button -->
<a class="blantershow-chat" href="javascript:void(0);" title="Show Chat">
  <svg viewBox="0 0 24 24">
    <path fill="#eceff1" d="M20.5 3.4A12.1 12.1 0 0012 0 12 12 0 001.7 17.8L0 24l6.3-1.7c2.8 1.5 5 1.4 5.8 1.5a12 12 0 008.4-20.3z"/>
    <path fill="#4caf50" d="M12 21.8c-3.1 0-5.2-1.6-5.4-1.6l-3.7 1 1-3.7-.3-.4A9.9 9.9 0 012.1 12a10 10 0 0117-7 9.9 9.9 0 01-7 16.9z"/>
    <path fill="#fafafa" d="M17.5 14.3c-.3 0-1.8-.8-2-.9-.7-.2-.5 0-1.7 1.3-.1.2-.3.2-.6.1s-1.3-.5-2.4-1.5a9 9 0 01-1.7-2c-.3-.6.4-.6 1-1.7l-.1-.5-1-2.2c-.2-.6-.4-.5-.6-.5-.6 0-1 0-1.4.3-1.6 1.8-1.2 3.6.2 5.6 2.7 3.5 4.2 4.2 6.8 5 .7.3 1.4.3 1.9.2.6 0 1.7-.7 2-1.4.3-.7.3-1.3.2-1.4-.1-.2-.3-.3-.6-.4z"/>
  </svg>
</a>

<script>
 document.addEventListener("DOMContentLoaded", function () {

  const chatBox = document.getElementById("whatsapp-chat");
  const toggleButton = document.querySelector(".blantershow-chat");
  const closeButton = document.querySelector(".close-chat");
  const sendButton = document.getElementById("send-it");
  const inputField = document.getElementById("chat-input");
  const whatsappButton = document.querySelector(".blantershow-chat");

  toggleButton.addEventListener("click", () => {
    chatBox.classList.toggle("hide");
  });

  closeButton.addEventListener("click", () => {
    chatBox.classList.add("hide");
  });

  sendButton.addEventListener("click", () => {
    const message = inputField.value.trim();
    if (message) {
      const phoneNumber = "7975189067";
      const url = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);
      window.open(url, "_blank");
      inputField.value = "";
    }
  });

  /* SHOW WHATSAPP AFTER 400PX SCROLL */
  window.addEventListener("scroll", function () {
    if (window.scrollY > 300) {
      whatsappButton.style.display = "flex";
    } else {
      whatsappButton.style.display = "none";
    }
  });

});
</script>
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