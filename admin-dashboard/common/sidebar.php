<style>
  .sidebar-logo{
    width:40px;
    height:auto;
    padding:5px;
}
  </style>
<div id="sidebarOverlay" class="sidebar-overlay"></div>
  
    <div id="sidebar">
      <a href="index.php" class="sidebar-brand">
        <div class="sidebar-brand-icon">
          <img src="assets/images/fav.png" alt="Logo" class="sidebar-logo">
      </div>
        <div>
          <div class="sidebar-brand-text">Drafticode</div>
          <div class="sidebar-brand-sub">CMS Dashboard</div>
        </div>
      </a>
      <div class="sidebar-nav">
        <div class="sidebar-section-label">Main</div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="index.php">
              <span class="nav-icon"><i class="fas fa-th-large"></i></span> Dashboard
            </a>
          </li>
        </ul>
        <div class="sidebar-section-label">Content</div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#collapseProjects" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-briefcase"></i></span> Projects
            </a>
            <div class="collapse" id="collapseProjects">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addproject.php">Add Project</a>
                <a class="nav-link " href="project.php">All Projects</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseSlider" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-images"></i></span> Slider
            </a>
            <div class="collapse " id="collapseSlider">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addslider.php">Add Slider</a>
                <a class="nav-link " href="slider.php">All Sliders</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseServices" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-cogs"></i></span> Services
            </a>
            <div class="collapse " id="collapseServices">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addservice.php">Add Service</a>
                <a class="nav-link " href="service.php">All Services</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseBlog" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-newspaper"></i></span> Blog
            </a>
            <div class="collapse " id="collapseBlog">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addblog.php">Add Blog</a>
                <a class="nav-link " href="blog.php">All Blogs</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseProducts" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-box"></i></span> Products
            </a>
            <div class="collapse " id="collapseProducts">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addproduct.php">Add Product</a>
                <a class="nav-link " href="product.php">All Products</a>
              </div>
            </div>
          </li>
        </ul>
        <div class="sidebar-section-label">People</div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#collapseTestimonials" data-bs-toggle="collapse" aria-expanded="true">
              <span class="nav-icon"><i class="fas fa-quote-right"></i></span> Testimonials
            </a>
            <div class="collapse " id="collapseTestimonials">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addtestimonial.php">Add Testimonial</a>
                <a class="nav-link active" href="testimonial.php">All Testimonials</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapsefaq" data-bs-toggle="collapse" aria-expanded="true">
              <span class="nav-icon"><i class="fas fa-quote-right"></i></span> FAQ
            </a>
            <div class="collapse " id="collapsefaq">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addfaq.php">Add FAQ</a>
                <a class="nav-link active" href="faq.php">All FAQ</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseTeam" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-users"></i></span> Team
            </a>
            <div class="collapse " id="collapseTeam">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addteam.php">Add Member</a>
                <a class="nav-link " href="team.php">All Members</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseClients" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-handshake"></i></span> Clients
            </a>
            <div class="collapse " id="collapseClients">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addclient.php">Add Client</a>
                <a class="nav-link " href="clients.php">All Clients</a>
              </div>
            </div>
          </li>
        </ul>
        
        <div class="sidebar-section-label">Package & Pricing</div>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link" href="#collapsePackages" data-bs-toggle="collapse" aria-expanded="false">
      <span class="nav-icon"><i class="fas fa-box-open"></i></span> Packages
    </a>
    <div class="collapse" id="collapsePackages">
      <div class="sidebar-submenu">
        <a class="nav-link" href="add_package.php">Add Package</a>
        <a class="nav-link" href="package.php">All Packages</a>
      </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#collapsePricing" data-bs-toggle="collapse" aria-expanded="false">
      <span class="nav-icon"><i class="fas fa-dollar-sign"></i></span> Pricing
    </a>
    <div class="collapse" id="collapsePricing">
      <div class="sidebar-submenu">
        <a class="nav-link" href="add_pricing.php">Add Pricing</a>
        <a class="nav-link" href="allpricing.php">All Pricing</a>
      </div>
    </div>
  </li>
</ul>
        <div class="sidebar-section-label">Jobs</div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="#collapseJobs" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-suitcase"></i></span> Jobs
            </a>
            <div class="collapse " id="collapseJobs">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addjob.php">Add Job</a>
                <a class="nav-link " href="job.php">All Jobs</a>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#collapseInternship" data-bs-toggle="collapse" aria-expanded="false">
              <span class="nav-icon"><i class="fas fa-user-graduate"></i></span> Internship
            </a>
            <div class="collapse " id="collapseInternship">
              <div class="sidebar-submenu">
                <a class="nav-link " href="addinternship.php">Add Internship</a>
                <a class="nav-link " href="internship.php">All Internships</a>
              </div>
            </div>
          </li>
        </ul>
        <div class="sidebar-section-label">Management</div>
        <ul class="nav flex-column">
          <?php
include 'connection/config.php';

$stmt = $pdo->query("SELECT COUNT(*) as total FROM contact");
$row = $stmt->fetch();

$totalMessages = $row['total'];
$stmt = $pdo->query("SELECT COUNT(*) as total FROM jobform");
$row = $stmt->fetch();

$totaljobapply = $row['total'];
?>
          <li class="nav-item">
    <a class="nav-link" href="contact.php">
        <span class="nav-icon"><i class="fas fa-envelope"></i></span> Messages
        <span class="badge-count"><?= $totalMessages ?></span>
    </a>
</li>
 <li class="nav-item">
    <a class="nav-link" href="jobform.php">
        <span class="nav-icon"><i class="fas fa-envelope"></i></span> Job Applies
        <span class="badge-count"><?= $totaljobapply ?></span>
    </a>
</li>
          <li class="nav-item">
            <a class="nav-link " href="settings.php">
              <span class="nav-icon"><i class="fas fa-sliders-h"></i></span> Settings
            </a>
          </li>
        </ul>
      </div>
    </div>