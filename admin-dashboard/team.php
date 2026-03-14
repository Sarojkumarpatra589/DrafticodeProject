<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM teams ORDER BY id DESC");
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Team Members</title>
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
                <h1 class="page-title">All Team Members</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Team Members</li>
                        <li class="breadcrumb-item active">All Team Members</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">

            <div class="section-header">

                <h3 class="section-title">
                    <i class="fas fa-users me-2 text-primary-custom"></i>Team Members
                </h3>

                <a href="addteam.php" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i>Add Member
                </a>

            </div>

            <div class="table-responsive">

                <table class="admin-table">

                    <thead>
                        <tr>

                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $i = 1;
                        foreach ($data as $row) {
                        ?>

                            <tr>

                                <td>#<?= $i++ ?></td>

                                <td>
                                    <img src="../upload/<?= $row['image'] ?>" width="50" height="50" style="border-radius:6px;">
                                </td>

                                <td><?= htmlspecialchars($row['name']) ?></td>

                                <td><?= htmlspecialchars($row['designation']) ?></td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <a href="addteam.php?id=<?= $row['id'] ?>"
                                            class="btn-icon edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <a href="function.php?delete_team=<?= $row['id'] ?>"
                                            class="btn-icon delete"
                                            onclick="return confirm('Delete Member?')">

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