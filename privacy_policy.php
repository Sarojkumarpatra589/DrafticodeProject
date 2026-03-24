
<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM settings LIMIT 1");
$stmt->execute();
$settings = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Privacy Policy | Drafticode Inc. - Digital Marketing Company in Bhubaneswar</title>
  <meta name="description" content="Read the Privacy Policy of Drafticode Inc., a leading Digital Marketing Company in Bhubaneswar offering Website Development, SEO, Social Media Marketing, PPC Advertising, and Performance Marketing services across India." />
  <meta name="keywords" content="Digital Marketing Company in Bhubaneswar, Website Development Company, Social Media Marketing Agency, Online Marketing Agency, Content Marketing Services, PPC Advertising Agency, Performance Marketing Company, Digital Marketing Company Near Me, Best SEO Services Company in India" />
  <meta name="robots" content="index, follow" />

  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >
<link rel="icon" href="upload/<?= htmlspecialchars($settings['favicon']) ?>" >

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <style>
    .privacy-section {
      padding: 0 0 50px;
      background: #fff;
      margin-top: -59px !important;
    }
    .privacy-section .section-intro {
        margin: 0 0 18px 0;
        padding: 0 0 px;
        background: #fff;
    }
    .privacy-section .section-intro h2 {
      margin-top: 0 !important;
      padding-top: 0 !important;
    }
    .privacy-block {
      margin-bottom: 0;
    }
    .privacy-block h3 {
      font-weight: 700;
      font-size: 20px;
      margin-bottom: 14px;
      color: #1a1a2e;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .privacy-block h3 .block-number {
      background: #b54e2a;
      color: #fff;
      font-size: 13px;
      font-weight: 700;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .privacy-block p {
      line-height: 1.9;
      color: #333;
      font-size: 15px;
      margin-bottom: 6px;
    }
    .privacy-block ul {
      padding-left: 0;
      list-style: none;
      margin-bottom: 0;
    }
    .privacy-block ul li {
      color: #333;
      font-size: 15px;
      line-height: 1.85;
      padding: 5px 0 5px 26px;
      position: relative;
    }
    .privacy-block ul li::before {
      content: "\f058";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      color: #b54e2a;
      position: absolute;
      left: 0;
      top: 6px;
      font-size: 13px;
    }

    /* Sub-heading for (a), (b), (c) etc */
    .privacy-block .sub-heading {
      font-weight: 700;
      color: #333;
      font-size: 15px;
      margin: 14px 0 6px;
    }

    /* Highlight cards for key info */
    .info-highlight-cards {
      display: flex;
      flex-wrap: wrap;
      gap: 16px;
      margin: 20px 0;
    }
    .info-highlight-card {
      flex: 1 1 200px;
      background: #f9f9f9;
      border-radius: 8px;
      padding: 20px 18px;
      border-left: 4px solid #b54e2a;
    }
    .info-highlight-card i {
      font-size: 20px;
      color: #b54e2a;
      margin-bottom: 10px;
      display: block;
    }
    .info-highlight-card h6 {
      font-weight: 700;
      margin-bottom: 7px;
      font-size: 14px;
      color: #1a1a2e;
    }
    .info-highlight-card p {
      color: #333;
      font-size: 13px;
      line-height: 1.7;
      margin: 0;
    }

    /* Contact box */
    .contact-policy-box {
      background: linear-gradient(135deg, #1a1a2e 0%, #2d2d4e 100%);
      border-radius: 10px;
      padding: 35px 40px;
      color: #fff;
      margin-top: 20px;
    }
    .contact-policy-box h4 {
      font-weight: 700;
      color: #fff;
      margin-bottom: 16px;
      font-size: 20px;
    }
    .contact-policy-box p {
      color: rgba(255,255,255,0.75);
      font-size: 15px;
      line-height: 1.8;
      margin-bottom: 16px;
    }
    .contact-policy-box .contact-detail {
      display: flex;
      align-items: center;
      gap: 10px;
      color: rgba(255,255,255,0.85);
      font-size: 14px;
      margin-bottom: 8px;
    }
    .contact-policy-box .contact-detail i {
      color: #b54e2a;
      width: 18px;
    }
    .contact-policy-box .contact-detail a {
      color: rgba(255,255,255,0.85);
      text-decoration: none;
      transition: color 0.2s;
    }
    .contact-policy-box .contact-detail a:hover {
      color: #b54e2a;
    }
    .trust-badge {
      background: rgba(241,90,34,0.15);
      border: 1px solid rgba(241,90,34,0.3);
      border-radius: 8px;
      padding: 14px 18px;
      margin-top: 20px;
      display: flex;
      align-items: flex-start;
      gap: 12px;
    }
    .trust-badge i {
      color: #b54e2a;
      font-size: 18px;
      margin-top: 2px;
      flex-shrink: 0;
    }
    .trust-badge p {
      color: rgba(255,255,255,0.8);
      font-size: 13px;
      line-height: 1.7;
      margin: 0;
    }
    .divider-line {
      border: none;
      border-top: 1px solid #eee;
      margin: 18px 0;
    }
  </style>
</head>
<body>
<div class="page-wrapper">

<!-- Preloader -->
<div class="preloader">
    <div class="loader"></div>
</div>

<?php include "common/header.php"; ?>

<!-- Breadcrumb Section -->
<section class="breadcume-section">
  <div class="outer-box">
    <div class="auto-container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcumb-content">
            <div class="breadcumb-title">
              <h1 class="title">Privacy Policy</h1>
            </div>
            <ul class="breadcume-pull">
              <li><a class="title-line" href="index.php">Home <span><i class="fas fa-angle-right"></i></span></a></li>
              <li>Privacy Policy</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Breadcrumb Section -->

<!-- Privacy Policy Section -->
<section class="privacy-section">
  <div class="container">

    <!-- Intro -->
    <div class="section-intro">
      <h2 style="font-weight: 700; font-size: 28px; color: #1a1a2e; margin: 0 0 16px 0; padding-top: 0;">Privacy Policy of Drafticode Inc.</h2>
      <p style="line-height: 1.9; color: #333; font-size: 15px; margin-bottom: 0;">At <strong>Drafticode Inc.</strong>, your privacy is our top priority. This Privacy Policy explains how we collect, use, disclose, and protect your personal information when you interact with our website, digital marketing services, software, and other related platforms. By using our services, you agree to the practices described in this policy.</p>
    </div>

    <hr class="divider-line">

    <!-- 1. Information We Collect -->
    <div class="privacy-block">
      <h3><span class="block-number">1</span> Information We Collect</h3>
      <p>We collect information to provide better services to all our clients and users. The types of data we may collect include:</p>

      <div class="info-highlight-cards">
        <div class="info-highlight-card">
          <i class="fas fa-user-circle"></i>
          <h6>Personal Information</h6>
          <p>When you fill out contact forms, request a quote, subscribe to newsletters, or engage with our services, we may collect your name, email address, phone number, company name, and billing details.</p>
        </div>
        <div class="info-highlight-card">
          <i class="fas fa-globe"></i>
          <h6>Non-Personal Information</h6>
          <p>We collect data such as your IP address, browser type, device details, referral URLs, and pages visited. This helps us understand user behavior and improve website performance.</p>
        </div>
        <div class="info-highlight-card">
          <i class="fas fa-cookie-bite"></i>
          <h6>Cookies & Tracking</h6>
          <p>Drafticode uses cookies, pixels, and similar technologies to personalize your experience, analyze traffic, and deliver targeted ads. You can manage or disable cookies in your browser settings.</p>
        </div>
      </div>
    </div>

    <hr class="divider-line">

    <!-- 2. How We Use Your Information -->
    <div class="privacy-block">
      <h3><span class="block-number">2</span> How We Use Your Information</h3>
      <p>We use your information for the following purposes:</p>
      <ul>
        <li>To provide and improve our digital marketing, SEO, SMM, SEM, and web development services.</li>
        <li>To communicate with you regarding inquiries, support, or updates.</li>
        <li>To analyze marketing campaigns and website performance.</li>
        <li>To send newsletters, promotional content, and service updates (only if you've opted in).</li>
        <li>To process payments, generate invoices, and prevent fraudulent activities.</li>
        <li>To comply with legal obligations and enforce our terms of service.</li>
      </ul>
    </div>

    <hr class="divider-line">

    <!-- 3. Sharing of Information -->
    <div class="privacy-block">
      <h3><span class="block-number">3</span> Sharing of Information</h3>
      <p>We respect your privacy and do not sell, rent, or trade your personal information. However, we may share information with:</p>
      <ul>
        <li><strong>Trusted partners and vendors</strong> who assist us in marketing, analytics, payment processing, or hosting (under confidentiality agreements).</li>
        <li><strong>Legal authorities</strong> if required by law or to protect our rights, users, or property.</li>
        <li><strong>Business transfers,</strong> in the event of a merger, acquisition, or asset sale, where user data may be part of the transaction.</li>
      </ul>
    </div>

    <hr class="divider-line">

    <!-- 4. Data Security -->
    <div class="privacy-block">
      <h3><span class="block-number">4</span> Data Security</h3>
      <p>We employ advanced security measures such as SSL encryption, secure servers, and access controls to safeguard your personal data. While we take all reasonable steps to protect your information, please note that no digital transmission or storage method is 100% secure.</p>
    </div>

    <hr class="divider-line">

    <!-- 5. Your Rights and Choices -->
    <div class="privacy-block">
      <h3><span class="block-number">5</span> Your Rights and Choices</h3>
      <p>You have full control over your personal data. You may:</p>
      <ul>
        <li>Request access, correction, or deletion of your personal data.</li>
        <li>Opt out of receiving marketing communications at any time by clicking "unsubscribe" in our emails.</li>
        <li>Disable cookies or tracking through your browser settings.</li>
        <li>Withdraw consent to process your data (subject to legal or contractual obligations).</li>
      </ul>
      <p style="margin-top: 12px;">To exercise these rights, please contact us at <a href="mailto:office@drafticode.com" style="color: #b54e2a; font-weight: 600;">office@drafticode.com</a>.</p>
    </div>

    <hr class="divider-line">

    <!-- 6. Third-Party Links -->
    <div class="privacy-block">
      <h3><span class="block-number">6</span> Third-Party Links and Tools</h3>
      <p>Our website may include links to third-party websites, tools, or plugins (e.g., Google Analytics, Meta Ads Manager, Mailchimp). These platforms have their own privacy practices, which we encourage you to review separately. Drafticode Inc. is not responsible for the privacy policies of external websites.</p>
    </div>

    <hr class="divider-line">

    <!-- 7. Retention of Information -->
    <div class="privacy-block">
      <h3><span class="block-number">7</span> Retention of Information</h3>
      <p>We retain your personal data only as long as necessary to fulfill the purposes outlined in this policy or as required by law. After this period, your information is securely deleted or anonymized.</p>
    </div>

    <hr class="divider-line">

    <!-- 8. Children's Privacy -->
    <div class="privacy-block">
      <h3><span class="block-number">8</span> Children's Privacy</h3>
      <p>Our services are not directed to individuals under 16 years of age. We do not knowingly collect personal data from children. If you believe that a minor has provided us with personal information, please contact us immediately so we can remove it.</p>
    </div>

    <hr class="divider-line">

    <!-- 9. International Data Transfers -->
    <div class="privacy-block">
      <h3><span class="block-number">9</span> International Data Transfers</h3>
      <p>As Drafticode Inc. operates globally, your information may be transferred to servers located outside your country. We ensure that such transfers comply with applicable data protection laws and maintain adequate safeguards.</p>
    </div>

    <hr class="divider-line">

    <!-- 10. Updates to This Policy -->
    <div class="privacy-block">
      <h3><span class="block-number">10</span> Updates to This Policy</h3>
      <p>We may update this Privacy Policy periodically to reflect changes in our practices, technologies, or legal requirements. The updated version will be posted on our website with the "Last Updated" date. We encourage you to review this page regularly.</p>
    </div>

    <hr class="divider-line">

    <!-- 11. Contact Us -->
    <div class="privacy-block">
      <h3><span class="block-number">11</span> Contact Us</h3>
      <p>If you have any questions or concerns about our Privacy Policy or data practices, please reach out to us:</p>

      <div class="contact-policy-box">
        <h4>Drafticode Inc.</h4>
        <div class="contact-detail">
          <i class="fas fa-map-marker-alt"></i>
          <span>Office 2, B-15, Arihant Plaza, Saheed Nagar, Bhubaneswar, Odisha 751007</span>
        </div>
        <div class="contact-detail">
          <i class="fas fa-phone-alt"></i>
          <a href="tel:+917975189067">+91 79751 89067</a>
        </div>
        <div class="contact-detail">
          <i class="fas fa-envelope"></i>
          <a href="mailto:office@drafticode.com">office@drafticode.com</a>
        </div>
        <div class="contact-detail">
          <i class="fas fa-globe"></i>
          <a href="https://www.drafticode.com" target="_blank">www.drafticode.com</a>
        </div>

        <div class="trust-badge">
          <i class="fas fa-shield-alt"></i>
          <p>Your trust matters to us. At Drafticode Inc., we are committed to maintaining transparency, security, and ethical practices in every interaction — ensuring that your digital experience remains safe, compliant, and trustworthy.</p>
        </div>

      </div><!-- End contact-policy-box -->
    </div><!-- End privacy-block -->

  </div><!-- End container-fluid -->
</section>
<!-- End Privacy Policy Section -->

<?php include "common/footer.php"; ?>

</div><!-- End page-wrapper -->
</body>
</html>