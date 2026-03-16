<?php
include 'connection/config.php';

$services = $pdo->query("SELECT * FROM services ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Services — Drafticode</title>

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
                <h1 class="page-title">All Sevices</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Sevices</li>
                        <li class="breadcrumb-item active">All Sevices</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">

            <div class="section-header">

                <h3 class="section-title">
                    <i class="fas fa-cogs me-2 text-primary-custom"></i>Services
                </h3>

                <div>
                    <a href="addservice.php" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Add Service
                    </a>
                </div>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $i = 1;
                        foreach ($services as $service) {
                        ?>

                            <tr>

                                <td>#<?= $i++ ?></td>

                                <td>
                                    <img
                                        src="../upload/<?= $service['image'] ?>"
                                        style="width:44px;height:44px;border-radius:8px;object-fit:cover;">
                                </td>

                                <td><?= htmlspecialchars($service['title']) ?></td>

                                <td><?= htmlspecialchars($service['short_description']) ?></td>

                                <td>

                                    <div class="d-flex gap-1">

                                        <a href="addservice.php?action=edit_service&id=<?= $service['id'] ?>" class="btn-icon edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="function.php?action=delete_service&id=<?= $service['id'] ?>"
                                            class="btn-icon delete"
                                            onclick="return confirm('Delete this service?')">

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

</body>

</html>