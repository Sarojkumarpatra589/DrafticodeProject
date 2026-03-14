<?php
include 'connection/config.php';

$projects = $pdo->query("SELECT * FROM projects ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All Projects — Drafticode</title>

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
                <h1 class="page-title">All Projects</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Project</li>
                        <li class="breadcrumb-item active">All Projects</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">

            <div class="section-header">

                <h3 class="section-title">

                    <i class="fas fa-briefcase me-2 text-primary-custom"></i>Projects

                </h3>

                <div>

                    <a href="addproject.php" class="btn btn-primary btn-sm">

                        <i class="fas fa-plus"></i> Add Project

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

                        foreach ($projects as $project) {

                        ?>

                            <tr>

                                <td>#<?= $i++ ?></td>

                                <td>

                                    <img

                                        src="../upload/<?= $project['image'] ?>"

                                        style="width:44px;height:44px;border-radius:8px;object-fit:cover;">

                                </td>

                                <td><?= htmlspecialchars($project['title']) ?></td>

                                <td><?= htmlspecialchars($project['short_description']) ?></td>

                                <td>

                                    <div class="d-flex gap-1">

                                        <a

                                            href="addproject.php?action=edit_project&id=<?= $project['id'] ?>"

                                            class="btn-icon edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <a

                                            href="function.php?action=delete_project&id=<?= $project['id'] ?>"

                                            class="btn-icon delete"

                                            onclick="return confirm('Delete this project?')">

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