<?php
include 'connection/config.php';

$editMode = false;
$row = [];

/* CHECK EDIT MODE */

if (isset($_GET['id'])) {

  $editMode = true;

  $id = $_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM teams WHERE id=?");
  $stmt->execute([$id]);

  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* ADD TEAM */

if (isset($_POST['add_team'])) {

  $name = $_POST['name'];
  $designation = $_POST['designation'];

  $image = $_FILES['photo']['name'];
  $tmp = $_FILES['photo']['tmp_name'];

  $folder = "../upload/" . $image;

  move_uploaded_file($tmp, $folder);

  $stmt = $pdo->prepare("INSERT INTO teams(name,designation,image) VALUES(?,?,?)");
  $stmt->execute([$name, $designation, $image]);

  header("Location: team.php");
  exit();
}

/* UPDATE TEAM */

if (isset($_POST['update_team'])) {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $designation = $_POST['designation'];

  $image = $_FILES['photo']['name'];
  $tmp = $_FILES['photo']['tmp_name'];

  if ($image != "") {

    $folder = "../upload/" . $image;
    move_uploaded_file($tmp, $folder);

    $stmt = $pdo->prepare("UPDATE teams SET name=?,designation=?,image=? WHERE id=?");
    $stmt->execute([$name, $designation, $image, $id]);
  } else {

    $stmt = $pdo->prepare("UPDATE teams SET name=?,designation=? WHERE id=?");
    $stmt->execute([$name, $designation, $id]);
  }

  header("Location: teams.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= $editMode ? 'Edit Team Member' : 'Add Team Member' ?></title>
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
      <h1 class="page-title">
        <?= $editMode ? 'Edit Team Member' : 'Add Team Member' ?>
      </h1>
    </div>

    <div class="admin-card">
      <div class="section-header">

          <h3 class="section-title">

              <i class="fas fa-plus-circle me-2 text-primary-custom"></i>

              <?= $editMode ? 'Update Team' : 'Add New Team' ?>

          </h3>

      </div>

      <form method="POST" enctype="multipart/form-data">

        <?php if ($editMode) { ?>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <?php } ?>

        <div class="row g-3">

          <div class="col-md-6">
            <label class="form-label">Member Name</label>
            <input type="text"
              class="form-control"
              name="name"
              value="<?= $editMode ? htmlspecialchars($row['name']) : '' ?>"
              required>
          </div>

          <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text"
              class="form-control"
              name="designation"
              value="<?= $editMode ? htmlspecialchars($row['designation']) : '' ?>"
              required>
          </div>

          <div class="col-md-12">

            <label class="form-label">Photo</label>

            <input type="file"
              name="photo"
              class="form-control"
              id="photoUpload"
              accept="image/*">

            <div class="mt-2" id="photoPreview">

              <?php if ($editMode && !empty($row['image'])) { ?>

                <img src="../upload/<?= $row['image'] ?>" width="150">

              <?php } ?>

            </div>

          </div>

        </div>

        <div class="pt-3">

          <button type="submit"
            name="<?= $editMode ? 'update_team' : 'add_team' ?>"
            class="btn btn-primary">

            <i class="fas fa-save me-2"></i>
            <?= $editMode ? 'Update Member' : 'Save Member' ?>

          </button>

        </div>

      </form>

    </div>

  </div>
  <script>
    document.getElementById("photoUpload").addEventListener("change", function() {

      let preview = document.getElementById("photoPreview");
      preview.innerHTML = "";

      let file = this.files[0];

      if (file) {

        let reader = new FileReader();

        reader.onload = function(e) {

          preview.innerHTML = '<img src="' + e.target.result + '" width="150">';

        }

        reader.readAsDataURL(file);

      }

    });
  </script>
  <?php include 'common/footer.php' ?>

</body>

</html>