<?php
include 'connection/config.php';

$editMode = isset($_GET['action']) && $_GET['action'] == 'edit_client';
$row = [];

if ($editMode && isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id=?");
    $stmt->execute([$_GET['id']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $editMode ? 'Edit Client' : 'Add Client' ?></title>

    <!-- Favicon -->
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
            <h1 class="page-title"><?= $editMode ? 'Edit Client' : 'Add Client' ?></h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12">

                <div class="admin-card">
                    <div class="section-header">

                        <h3 class="section-title">

                            <i class="fas fa-plus-circle me-2 text-primary-custom"></i>

                            <?= $editMode ? 'Update Client' : 'Add New Client' ?>

                        </h3>

                    </div>

                    <form action="function.php" method="POST" enctype="multipart/form-data">

                        <?php if ($editMode): ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                        <?php endif; ?>

                        <div class="row g-3">

                            <div class="col-md-8">
                                <label class="form-label">Client Name</label>
                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                    value="<?= $editMode ? htmlspecialchars($row['name']) : '' ?>">
                            </div>

                            <div class="col-12">

                                <label class="form-label">Client Logo</label>

                                <input type="file"
                                    name="logo"
                                    class="form-control"
                                    id="clientLogoUpload"
                                    accept="image/*">

                                <div class="mt-2" id="clientLogoPreview">

                                    <?php if ($editMode && !empty($row['image'])): ?>

                                        <img src="../upload/<?= $row['image'] ?>" width="120">

                                    <?php endif; ?>

                                </div>

                            </div>

                        </div>

                        <div class="mt-3">

                            <button type="submit"
                                name="<?= $editMode ? 'update_client' : 'add_client' ?>"
                                class="btn btn-primary">

                                <i class="fas fa-save me-2"></i>
                                <?= $editMode ? 'Update Client' : 'Save Client' ?>

                            </button>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("clientLogoUpload").addEventListener("change", function() {

            let preview = document.getElementById("clientLogoPreview");
            preview.innerHTML = "";

            let file = this.files[0];

            if (file) {

                let reader = new FileReader();

                reader.onload = function(e) {

                    preview.innerHTML = '<img src="' + e.target.result + '" width="120">';

                }

                reader.readAsDataURL(file);

            }

        });
    </script>
    <?php include 'common/footer.php' ?>
</body>

</html>