<?php
include 'connection/config.php';

/* FETCH JOBS */
$stmt = $pdo->prepare("SELECT * FROM jobs ORDER BY id DESC");
$stmt->execute();
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>All Jobs — Drafticode</title>

  <link rel="icon" type="image/png" href="assets/images/fav.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>

  <?php include 'common/sidebar.php' ?>
  <?php include 'common/topbar.php' ?>

  <div id="main-content">

    <div class="page-header">
      <div>
        <h1 class="page-title">All Jobs</h1>
      </div>
    </div>

    <div class="admin-card">

      <div class="section-header">

        <h3 class="section-title">
          <i class="fas fa-suitcase me-2 text-primary-custom"></i>
          Job Listings
        </h3>

        <a href="addjob.php" class="btn btn-primary btn-sm">
          <i class="fas fa-plus me-1"></i>Post Job
        </a>

      </div>

      <div class="table-responsive">

        <table class="admin-table">

          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Location</th>
              <th>Type</th>
              <th>Salary</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>

            <?php
            $i = 1;
            foreach ($jobs as $job) {

              $statusClass = '';

              if ($job['status'] == 'Active') {
                $statusClass = 'badge-active';
              } elseif ($job['status'] == 'Inactive') {
                $statusClass = 'badge-inactive';
              } else {
                $statusClass = 'badge-inactive';
              }
            ?>

              <tr>

                <td class="table-id">#<?= $i++ ?></td>

                <td class="fw-700">
                  <?= htmlspecialchars($job['title']) ?>
                </td>

                <td style="font-size:12.5px">
                  <i class="fas fa-map-marker-alt me-1" style="color:var(--accent-red)"></i>
                  <?= htmlspecialchars($job['location']) ?>
                </td>

                <td>
                  <span class="badge" style="background:#e8ecf4;color:#4b5563;font-size:11.5px">
                    <?= $job['type'] ?>
                  </span>
                </td>

                <td class="fw-700" style="color:var(--accent-green);font-size:13px">
                  <?= $job['salary_min'] ?> - <?= $job['salary_max'] ?>
                </td>

                <td style="font-size:12.5px">
                  <?= date("M d, Y", strtotime($job['deadline'])) ?>
                </td>

                <td>
                  <span class="badge-status <?= $statusClass ?>">
                    <?= $job['status'] ?>
                  </span>
                </td>

                <td>

                  <div class="d-flex gap-1">

                    <a href="addjob.php?id=<?= $job['id'] ?>" class="btn-icon edit" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a href="function.php?action=delete_job&id=<?= $job['id'] ?>"
                      class="btn-icon delete"
                      onclick="return confirm('Delete job?')">

                      <i class="fas fa-trash"></i>

                    </a>

                  </div>

                </td>

              </tr>

            <?php } ?>

          </tbody>
        </table>

      </div>
    </div>

    <?php include 'common/footer.php' ?>

  </div>

</body>

</html>