<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM clients ORDER BY id DESC");
$stmt->execute();
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Clients</title>

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
                <h1 class="page-title">All Clients</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">All Clients</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">

            <div class="section-header">

                <h3 class="section-title">
                    <i class="fas fa-handshake me-2 text-primary-custom"></i>Clients
                </h3>

                <a href="addclient.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Add Client
                </a>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $i = 1;

                        foreach ($clients as $row) {
                        ?>

                            <tr>

                                <td class="table-id">#<?= $i++ ?></td>

                                <td>
                                    <img src="../upload/<?= $row['image'] ?>"
                                        style="width:60px;height:60px;object-fit:fill;border-radius:6px;">
                                </td>

                                <td class="fw-700"><?= htmlspecialchars($row['name']) ?></td>

                                <td>

                                    <div class="d-flex gap-1">

                                        <a href="addclient.php?action=edit_client&id=<?= $row['id'] ?>"
                                            class="btn-icon edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <a href="function.php?action=delete_client&id=<?= $row['id'] ?>"
                                            class="btn-icon delete"
                                            onclick="return confirm('Delete client?')">

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

    </div>

    <?php include 'common/footer.php' ?>

</body>

</html>