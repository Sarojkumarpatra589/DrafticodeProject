<?php
include 'connection/config.php';

// Total Projects
$projectCount = $pdo->query("SELECT COUNT(*) FROM projects")->fetchColumn();

// Total Blogs
$blogCount = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
// Count Services
$serviceCount = $pdo->query("SELECT COUNT(*) FROM services")->fetchColumn();

// Count Clients
$clientCount = $pdo->query("SELECT COUNT(*) FROM clients")->fetchColumn();

// Count Products
$productCount = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();

// Count Courses
$coursesCount = $pdo->query("SELECT COUNT(*) FROM courses")->fetchColumn();

// Count Job
$jobCount = $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn();
// Count Messages
$messageCount = $pdo->query("SELECT COUNT(*) FROM contact")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard — Drafticode</title>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/fav.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>
  <!-- SIDEBAR -->
  <?php include 'common/sidebar.php' ?>
  <!-- TOPBAR -->
  <?php include 'common/topbar.php' ?>

  <!-- MAIN CONTENT -->
  <div id="main-content">
    <div class="page-header">
      <div>
        <h1 class="page-title">Dashboard</h1>

      </div>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-3 mb-4">
      <div class="col-6 col-lg-3">
        <div class="stat-card blue">
          <div class="stat-icon"><i class="fas fa-briefcase"></i></div>
          <div class="stat-value" data-count="<?= $projectCount ?>">
            <?= $projectCount ?>
          </div>
          <div class="stat-label">Total Projects</div>
        </div>
      </div>

      <div class="col-6 col-lg-3">
        <div class="stat-card purple">
          <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
          <div class="stat-value" data-count="<?= $blogCount ?>">
            <?= $blogCount ?>
          </div>
          <div class="stat-label">Total Blogs</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card green">
          <div class="stat-icon"><i class="fas fa-cogs"></i></div>
          <div class="stat-value" data-count="<?= $serviceCount ?>">
            <?= $serviceCount ?>
          </div>
          <div class="stat-label">Total Services</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card orange">
          <div class="stat-icon"><i class="fas fa-handshake"></i></div>
          <div class="stat-value" data-count="<?= $clientCount ?>">
            <?= $clientCount ?>
          </div>
          <div class="stat-label">Total Clients</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card red">
          <div class="stat-icon"><i class="fas fa-box"></i></div>
          <div class="stat-value" data-count="<?= $productCount ?>">
            <?= $productCount ?>
          </div>
          <div class="stat-label">Total Products</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card cyan">
          <div class="stat-icon"><i class="fas fa-envelope-open-text"></i></div>
          <div class="stat-value" data-count="<?= $messageCount ?>"><?= $messageCount ?></div>
          <div class="stat-label">Total Messages</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card blue" style="background:linear-gradient(135deg,#10b981,#0891b2)">
          <div class="stat-icon"><i class="fas fa-graduation-cap"></i></div>
          <div class="stat-value" data-count="<?= $coursesCount ?>"><?= $coursesCount ?></div>
          <div class="stat-label">Courses</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card purple" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">
          <div class="stat-icon"><i class="fas fa-suitcase"></i></div>
          <div class="stat-value" data-count="<?= $jobCount ?>"><?= $jobCount ?></div>
          <div class="stat-label">Job Listings</div>
        </div>
      </div>
    </div>

    <div class="row g-4 mb-4">
      <?php
include 'connection/config.php';

// ✅ Fetch latest 6 contact messages
$stmt = $pdo->prepare("SELECT * FROM contact ORDER BY id DESC LIMIT 6");
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Recent Contact Messages -->
<div class="col-lg-8">
    <div class="admin-card">

        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-envelope me-2 text-primary-custom"></i>
                Recent Messages
            </h3>
            <a href="contact.php" class="btn btn-outline-primary btn-sm">View All</a>
        </div>

        <div class="table-responsive">

            <table class="admin-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $i = 1;

                    foreach ($messages as $row):
                    ?>

                    <tr>

                        <td class="table-id">#<?= $i++ ?></td>

                        <td class="fw-700">
                            <?= htmlspecialchars($row['name']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['phone']) ?>
                        </td>

                        <td style="max-width:200px;font-size:12.5px;color:var(--text-secondary)">
                            <?= substr(htmlspecialchars($row['message']), 0, 60) ?>...
                        </td>

                        <td style="font-size:12.5px">
                            <?= date("M d, Y", strtotime($row['contacted_at'])) ?>
                        </td>

                        <td>
                            <div class="d-flex gap-1">
                                <a href="function.php?action=delete_message&id=<?= $row['id'] ?>"
                                   class="btn-icon delete"
                                   onclick="return confirm('Delete message?')">
                                   <i class="fas fa-trash"></i>
                                </a>

                            </div>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>
</div>
      

      

      <!-- Quick Links -->
      <div class="col-lg-4">
        <div class="admin-card h-100">
          <div class="section-header">
            <h3 class="section-title"><i class="fas fa-bolt me-2 text-primary-custom"></i>Quick Actions</h3>
          </div>
          <div class="row g-2">
            <div class="col-6"><a href="addproject.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(79,142,255,0.1);color:#4f8eff"><i class="fas fa-briefcase"></i></div>
                <span class="ql-label">Add Project</span>
              </a></div>
            <div class="col-6"><a href="addblog.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(139,92,246,0.1);color:#8b5cf6"><i class="fas fa-newspaper"></i></div>
                <span class="ql-label">Add Blog</span>
              </a></div>
            <div class="col-6"><a href="addservice.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(16,185,129,0.1);color:#10b981"><i class="fas fa-cogs"></i></div>
                <span class="ql-label">Add Service</span>
              </a></div>
            <div class="col-6"><a href="addproduct.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(245,158,11,0.1);color:#f59e0b"><i class="fas fa-box"></i></div>
                <span class="ql-label">Add Product</span>
              </a></div>
            <div class="col-6"><a href="addteam.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(6,182,212,0.1);color:#06b6d4"><i class="fas fa-user-plus"></i></div>
                <span class="ql-label">Add Team</span>
              </a></div>
            <div class="col-6"><a href="contact.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(239,68,68,0.1);color:#ef4444"><i class="fas fa-envelope"></i></div>
                <span class="ql-label">Messages</span>
              </a></div>
            <div class="col-6"><a href="addcourse.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(79,142,255,0.1);color:#4f8eff"><i class="fas fa-graduation-cap"></i></div>
                <span class="ql-label">Add Course</span>
              </a></div>
            <div class="col-6"><a href="settings.php" class="quick-link-card">
                <div class="ql-icon" style="background:rgba(107,114,128,0.1);color:#6b7280"><i class="fas fa-sliders-h"></i></div>
                <span class="ql-label">Settings</span>
              </a></div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'common/footer.php' ?>