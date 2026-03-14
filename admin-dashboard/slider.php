<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM slider ORDER BY id DESC");
$stmt->execute();
$sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Sliders — Drafticode</title>

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
                <h1 class="page-title">All Sliders</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Slider</li>
                        <li class="breadcrumb-item active">All Sliders</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">

            <div class="section-header">

                <h3 class="section-title">
                    <i class="fas fa-images me-2 text-primary-custom"></i>Sliders
                </h3>

                <a href="addslider.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Add Slider
                </a>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        if ($sliders) {

                            $i = 1;

                            foreach ($sliders as $row) {
                        ?>

                                <tr>

                                    <td class="table-id">#<?= $i++ ?></td>

                                    <td>

                                        <img src="../upload/<?= htmlspecialchars($row['image']) ?>"
                                            width="80"
                                            height="45"
                                            style="object-fit:cover;border-radius:6px;">

                                    </td>

                                    <td class="fw-700">
                                        <?= htmlspecialchars($row['title']) ?>
                                    </td>

                                    <td style="max-width:250px;font-size:12.5px;color:var(--text-muted)">
                                        <?= substr(strip_tags($row['description']), 0, 60) ?>...
                                    </td>

                                    <td>

                                        <div class="d-flex gap-1">

                                            <a href="addslider.php?action=edit_slider&id=<?= $row['id'] ?>"
                                                class="btn-icon edit"
                                                title="Edit">

                                                <i class="fas fa-edit"></i>

                                            </a>

                                            <a href="function.php?action=delete_slider&id=<?= $row['id'] ?>"
                                                class="btn-icon delete"
                                                onclick="return confirm('Delete this slider?')"
                                                title="Delete">

                                                <i class="fas fa-trash"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                        <?php
                            }
                        } else {

                            echo "<tr><td colspan='5'>No sliders found</td></tr>";
                        }
                        ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <?php include 'common/footer.php' ?>

</body>

</html>