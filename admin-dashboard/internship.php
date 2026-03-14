<?php
include 'connection/config.php';

/* FETCH INTERNSHIPS */
$stmt = $pdo->prepare("SELECT * FROM internships ORDER BY id DESC");
$stmt->execute();
$internships = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Internships — Drafticode</title>

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

        <h1 class="page-title">Internships</h1>

        <nav>
          <ol class="breadcrumb">

            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

            <li class="breadcrumb-item">Internship</li>

            <li class="breadcrumb-item active">All Internships</li>

          </ol>
        </nav>

      </div>

    </div>


    <div class="admin-card">

      <div class="section-header">

        <h3 class="section-title">

          <i class="fas fa-user-graduate me-2 text-primary-custom"></i>

          Internship Listings

        </h3>


        <a href="addinternship.php" class="btn btn-primary btn-sm">

          <i class="fas fa-plus me-1"></i>Post Internship

        </a>

      </div>


      <div class="table-responsive">

        <table class="admin-table">

          <thead>

            <tr>

              <th>#</th>
              <th>Title</th>
              <th>Duration</th>
              <th>Stipend</th>
              <th>Location</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>Actions</th>

            </tr>

          </thead>


          <tbody>

            <?php
            $i = 1;

            foreach ($internships as $row) {

              $statusClass = '';

              if ($row['status'] == 'Active') {
                $statusClass = 'badge-active';
              } elseif ($row['status'] == 'Inactive') {
                $statusClass = 'badge-inactive';
              } else {
                $statusClass = 'badge-inactive';
              }
            ?>

              <tr>

                <td class="table-id">#<?= $i++ ?></td>

                <td class="fw-700">

                  <?= htmlspecialchars($row['title']) ?>

                </td>

                <td style="font-size:12.5px">

                  <?= $row['duration'] ?>

                </td>

                <td class="fw-700" style="color:var(--accent-green);font-size:13px">

                  <?= $row['stipend'] ?>

                </td>

                <td style="font-size:12.5px">

                  <i class="fas fa-map-marker-alt me-1" style="color:var(--accent-red)"></i>

                  <?= $row['location'] ?>

                </td>

                <td style="font-size:12.5px">

                  <?= date("M d, Y", strtotime($row['deadline'])) ?>

                </td>

                <td>

                  <span class="badge-status <?= $statusClass ?>">

                    <?= $row['status'] ?>

                  </span>

                </td>

                <td>

                  <div class="d-flex gap-1">

                    <a href="addinternship.php?id=<?= $row['id'] ?>"
                      class="btn-icon edit"
                      title="Edit">

                      <i class="fas fa-edit"></i>

                    </a>

                    <a href="function.php?action=delete_internship&id=<?= $row['id'] ?>"
                      class="btn-icon delete"
                      onclick="return confirm('Delete internship?')">

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