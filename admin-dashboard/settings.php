<?php
include 'connection/config.php';

// Upload folder
$uploadDir = "../upload/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Fetch current settings (assuming single row id=1)
$stmt = $pdo->prepare("SELECT * FROM settings WHERE id=1");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

// Update settings
if (isset($_POST['update_settings'])) {

    $site_title = $_POST['site_title'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];
    $address = $_POST['address'];
    $tagline = $_POST['tagline'];
    $map_link = $_POST['map_link'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $twitter = $_POST['twitter'];
    $meta_title = $_POST['meta_title'];
    $meta_keyword = $_POST['meta_keyword'];
    $meta_description = $_POST['meta_description'];

    // Keep old files by default
    $logo = $row['logo'];
    $favicon = $row['favicon'];

    // Upload new logo
    if (!empty($_FILES['logo']['name'])) {
        $ext = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'ico'];
        if (!in_array($ext, $allowed)) {
            die("Invalid logo type");
        }
        $logo = time() . rand(100, 999) . "." . $ext;
        move_uploaded_file($_FILES['logo']['tmp_name'], $uploadDir . $logo);
        if (!empty($row['logo']) && file_exists($uploadDir . $row['logo'])) {
            unlink($uploadDir . $row['logo']);
        }
    }

    // Upload new favicon
    if (!empty($_FILES['favicon']['name'])) {
        $ext = strtolower(pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'ico'];
        if (!in_array($ext, $allowed)) {
            die("Invalid favicon type");
        }
        $favicon = time() . rand(100, 999) . "." . $ext;
        move_uploaded_file($_FILES['favicon']['tmp_name'], $uploadDir . $favicon);
        if (!empty($row['favicon']) && file_exists($uploadDir . $row['favicon'])) {
            unlink($uploadDir . $row['favicon']);
        }
    }

    // Update database
    $stmt = $pdo->prepare("
        UPDATE settings SET
        site_title=?, favicon=?, logo=?, email=?, phone=?, whatsapp=?,
        address=?, tagline=?, map_link=?,
        facebook=?, instagram=?, linkedin=?, twitter=?,
        meta_title=?, meta_keyword=?, meta_description=?
        WHERE id=1
    ");

    $stmt->execute([
        $site_title,
        $favicon,
        $logo,
        $email,
        $phone,
        $whatsapp,
        $address,
        $tagline,
        $map_link,
        $facebook,
        $instagram,
        $linkedin,
        $twitter,
        $meta_title,
        $meta_keyword,
        $meta_description
    ]);

    header("Location: settings.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Settings — Drafticode</title>
    <link rel="icon" type="image/png" href="assets/images/fav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

    <?php include 'common/sidebar.php'; ?>
    <?php include 'common/topbar.php'; ?>

    <div id="main-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Website Settings</h1>

                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">All Settings</li>
                    </ol>
                </nav>

            </div>
        </div>

        <div class="admin-card">
            <div class="section-header">

                <h3 class="section-title">
                    <i class="fas fa-gear me-2 text-primary-custom"></i>Update Settings
                </h3>

            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="row g-3">



                    <!-- Logo -->
                    <div class="col-md-6">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control">
                        <?php if (!empty($row['logo'])): ?>
                            <br><img src="../upload/<?= $row['logo'] ?>" width="120" alt="Logo">
                        <?php endif; ?>
                    </div>

                    <!-- Favicon -->
                    <div class="col-md-6">
                        <label class="form-label">Favicon</label>
                        <input type="file" name="favicon" class="form-control">
                        <?php if (!empty($row['favicon'])): ?>
                            <br><img src="../upload/<?= $row['favicon'] ?>" width="50" alt="Favicon">
                        <?php endif; ?>
                    </div>

                    <!-- Site Title -->
                    <div class="col-md-6">
                        <label class="form-label">Site Title</label>
                        <input type="text" class="form-control" name="site_title" value="<?= htmlspecialchars($row['site_title']) ?>" required>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone" value="<?= htmlspecialchars($row['phone']) ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">WhatsApp</label>
                        <input type="tel" class="form-control" name="whatsapp" value="<?= htmlspecialchars($row['whatsapp']) ?>">
                    </div>

                    <!-- Address & Tagline -->
                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" rows="2"><?= htmlspecialchars($row['address']) ?></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Tagline</label>
                        <input type="text" class="form-control" name="tagline" value="<?= htmlspecialchars($row['tagline']) ?>">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Google Map Link</label>
                        <input type="url" class="form-control" name="map_link" value="<?= htmlspecialchars($row['map_link']) ?>">
                    </div>

                    <!-- Social Media -->
                    <div class="col-md-6">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control" name="facebook" value="<?= htmlspecialchars($row['facebook']) ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input type="url" class="form-control" name="instagram" value="<?= htmlspecialchars($row['instagram']) ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">LinkedIn</label>
                        <input type="url" class="form-control" name="linkedin" value="<?= htmlspecialchars($row['linkedin']) ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Twitter</label>
                        <input type="url" class="form-control" name="twitter" value="<?= htmlspecialchars($row['twitter']) ?>">
                    </div>

                    <!-- SEO -->
                    <div class="col-12">
                        <label class="form-label">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="<?= htmlspecialchars($row['meta_title']) ?>">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keyword" value="<?= htmlspecialchars($row['meta_keyword']) ?>">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Meta Description</label>
                        <textarea class="form-control" name="meta_description" rows="3"><?= htmlspecialchars($row['meta_description']) ?></textarea>
                    </div>

                    <div class="pt-3">
                        <button type="submit" name="update_settings" class="btn btn-primary"><i class="fas fa-save me-2"></i>Update Settings</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <?php include 'common/footer.php'; ?>
</body>

</html>