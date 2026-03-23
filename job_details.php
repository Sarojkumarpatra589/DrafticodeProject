<?php
include 'connection/config.php';

// ✅ FETCH LATEST JOB
$stmt = $pdo->query("SELECT * FROM jobs  ORDER BY id DESC LIMIT 1");
$job = $stmt->fetch();

if(!$job){
    die("Job not found");
}

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from php.kodesolution.com/2025/onicx-php/blog.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Mar 2026 05:49:47 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8" />
  <title>Job - Drafticode</title>

		<!-- All in One SEO 4.9.4.1 - aioseo.com -->
	<meta name="description" content="JOIN US Home - Job Tele-Sales Executive(Finance Sector) Location: Pan India (Candidates must be open to relocation anywhere in India) Gender: Male / Female Experience Required: Minimum 2 years Languages: Hindi and English (both required)Job Description:We are looking for enthusiastic and experienced Tele-Sales Executives to join our growing team. The ideal candidates should have prior experience in financial" />
	<meta name="robots" content="max-image-preview:large" />
	<link rel="canonical" href="https://drafticode.com/job/" />
	<meta name="generator" content="All in One SEO (AIOSEO) 4.9.4.1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:site_name" content="Drafticode - drafticode" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Job - Drafticode" />
		<meta property="og:description" content="JOIN US Home - Job Tele-Sales Executive(Finance Sector) Location: Pan India (Candidates must be open to relocation anywhere in India) Gender: Male / Female Experience Required: Minimum 2 years Languages: Hindi and English (both required)Job Description:We are looking for enthusiastic and experienced Tele-Sales Executives to join our growing team. The ideal candidates should have prior experience in financial" />
		<meta property="og:url" content="https://drafticode.com/job/" />
		<meta property="article:published_time" content="2025-01-22T02:30:40+00:00" />
		<meta property="article:modified_time" content="2025-10-30T06:43:47+00:00" />
		<meta property="article:publisher" content="https://www.facebook.com/drafticode/" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="@swatiselly" />
		<meta name="twitter:title" content="Job - Drafticode" />
		<meta name="twitter:description" content="JOIN US Home - Job Tele-Sales Executive(Finance Sector) Location: Pan India (Candidates must be open to relocation anywhere in India) Gender: Male / Female Experience Required: Minimum 2 years Languages: Hindi and English (both required)Job Description:We are looking for enthusiastic and experienced Tele-Sales Executives to join our growing team. The ideal candidates should have prior experience in financial" />
		<meta name="twitter:creator" content="@swatiselly" />

  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

      <link href="css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<style>
	.error {
	color: red;
	font-size: 12px;
	margin-top: 4px;
	display: block;
}

input.error-border,
textarea.error-border {
	border: 1px solid red !important;
}
</style>
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
                            <h1 class="title fs-1"><?= htmlspecialchars($job['title']) ?></h1>
                        </div>
                        <ul class="breadcume-pull">
                            <li>
                                <a class="title-line" href="index.php">
                                    Home <span><i class="fas fa-angle-right"></i></span>
                                </a>
                            </li>
                            <li><?= htmlspecialchars($job['title']) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>
<!-- End Breadcume Section -->


<!-- Job Details Section -->
<section class="project-details-section">
	<div class="auto-container">

		<div class="row">

            

            <!-- RIGHT SIDE -->
			<div class="content-column col-lg-8">
				<div class="inner-box">

					<div class="col-lg-12">
                         <!-- ✅ MAIN IMAGE -->
        <div class="image-box">
            <figure class="image">
                <img src="upload/<?= htmlspecialchars($job['image']) ?>" alt="Image"  width="100%">
            </figure>
        </div>

						<div class="project-content">

                            <!-- ✅ DESCRIPTION -->
							<div class="project-desc">
                                <?= $job['description']; ?>
                            </div>

                            <hr>

						</div>

					</div>

				</div>
			</div>
            <!-- LEFT SIDE -->
            <div class="project-column col-lg-4">
                <div class="inner-box">

                    <div class="project-title">
                        <h4 class="title">Job Details</h4>
                    </div>

                    <div class="project-name">
                        <ul class="project">

                            <li>Job Type: 
                                <span><?= htmlspecialchars($job['type']) ?></span>
                            </li>

                            <li>Location: 
                                <span><?= htmlspecialchars($job['location']) ?></span>
                            </li>

                            <li>Department: 
                                <span><?= htmlspecialchars($job['department']) ?></span>
                            </li>

                            <li>Salary: 
                                <span>
                                    ₹<?= htmlspecialchars($job['salary_min']) ?> - 
                                    ₹<?= htmlspecialchars($job['salary_max']) ?>
                                </span>
                            </li>

                            <li>Deadline: 
                                <span><?= htmlspecialchars($job['deadline']) ?></span>
                            </li>

                        </ul>
                    </div>

                </div>
                <!-- Contact Form -->
            <div class="contact-form-four inner-box p-4" style="margin-top: 50px;">
                 <div class="project-title">
                        <h4 class="title">Apply Now</h4>
                    </div>

                <form method="post" action="jobapply.php" id="job-form" novalidate>
	<div class="row">

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<input type="text" name="name" id="name" placeholder="Your Name">
			<small class="error" id="error-name"></small>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<input type="email" name="email" id="email" placeholder="Email Address">
			<small class="error" id="error-email"></small>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<input type="text" name="subject" id="subject" placeholder="Subject">
			<small class="error" id="error-subject"></small>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<input type="tel" name="phone" id="tel" maxlength="11" placeholder="Phone">
			<small class="error" id="error-tel"></small>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<textarea name="message" id="message" placeholder="Write a Message"></textarea>
			<small class="error" id="error-message"></small>
		</div>
		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="g-recaptcha" data-sitekey="6LdcW5QsAAAAAN79ZXLHZlYJY_J3MFpnIXZUihHC"></div>
    <small class="error" id="error-captcha"></small>
</div>

		<div class="form-group col-lg-12 col-md-12 col-sm-12">
			<div class="btn-box">
				<button type="submit" class="theme-btn btn-style-three upper">
					<span class="btn-title">Apply Here</span>
				</button>
			</div>
		</div>

	</div>
</form>
            </div>
            <!--End Contact Form -->
			</div>

		</div>
	</div>
</section>

<script>
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const phoneInput = document.getElementById("tel");
const subjectInput = document.getElementById("subject");
const messageInput = document.getElementById("message");

function setError(id, msg) {
    document.getElementById("error-" + id).innerText = msg;
}

function clearError(id) {
    document.getElementById("error-" + id).innerText = "";
}

// ✅ NAME (only letters, min 3)
nameInput.addEventListener("input", function () {
    let val = this.value.replace(/[^A-Za-z\s]/g, '');
    this.value = val;

    if (val.length < 3) {
        setError("name", "Minimum 3 letters only");
    } else {
        clearError("name");
    }
});

// ✅ EMAIL (live format check)
emailInput.addEventListener("input", function () {
    let val = this.value;
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regex.test(val)) {
        setError("email", "Enter valid email (example@gmail.com)");
    } else {
        clearError("email");
    }
});

// ✅ PHONE (only number, max 11)
phoneInput.addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);

    if (this.value.length < 10) {
        setError("tel", "Phone must be 10–11 digits");
    } else {
        clearError("tel");
    }
});

// ✅ SUBJECT
subjectInput.addEventListener("input", function () {
    if (this.value.length < 3) {
        setError("subject", "Minimum 3 characters");
    } else {
        clearError("subject");
    }
});

// ✅ MESSAGE
messageInput.addEventListener("input", function () {
    if (this.value.length < 5) {
        setError("message", "Minimum 5 characters");
    } else {
        clearError("message");
    }
});

// ✅ FINAL SUBMIT CHECK
document.getElementById("job-form").addEventListener("submit", function(e){

    let valid = true;

    function check(id, condition, msg){
        if(condition){
            setError(id, msg);
            valid = false;
        }
    }

    check("name", nameInput.value.length < 3, "Minimum 3 letters");
    check("email", !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value), "Invalid email");
    check("tel", phoneInput.value.length < 10, "Phone must be 10–11 digits");
    check("subject", subjectInput.value.length < 3, "Subject too short");
    check("message", messageInput.value.length < 5, "Message too short");

    // CAPTCHA
    let captcha = grecaptcha.getResponse();
    if (captcha.length === 0) {
        setError("captcha", "Please verify captcha");
        valid = false;
    } else {
        clearError("captcha");
    }

    if(!valid){
        e.preventDefault();
    }
});
</script>
<?php include "common/footer.php"; ?>
