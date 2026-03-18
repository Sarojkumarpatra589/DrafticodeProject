<?php
include 'connection/config.php';

$editMode = false;
$row = [];
$addons = [];

if (isset($_GET['action']) && $_GET['action'] == "edit_package") {
    $editMode = true;
    $id = $_GET['id'];

    // Fetch package
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    // Fetch package addons
    $stmt2 = $pdo->prepare("SELECT * FROM addons WHERE package_id=? ORDER BY id ASC");
    $stmt2->execute([$id]);
    $addons = $stmt2->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $editMode ? 'Update Addons' : 'Add Addons' ?></title>

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
  <h1 class="page-title"><?= $editMode ? 'Update Addons' : 'Add Addons' ?></h1>
</div>

<div class="row justify-content-center">
  <div class="col-lg-12">

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
          <?= $editMode ? 'Update Addons' : 'Add New Addons' ?>
        </h3>
      </div>

      <form method="POST" action="function.php">

        <?php if ($editMode) { ?>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <?php } ?>

        <div class="row g-3">

          <!-- Addons Section -->
          <div class="col-md-12">
            <div class="mb-3">
              <label class="form-label">Add Addons</label>
              <div class="d-flex gap-2">
                <input type="text" id="addonInput" class="form-control" placeholder="Enter addon">
                <button type="button" id="addAddonBtn" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
              </div>
            </div>

            <!-- Addons List -->
            <ul class="list-group" id="addonsList">
              <?php foreach ($addons as $addon) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="addon-text"><?= htmlspecialchars($addon['addons']) ?></span>
                  <div>
                    <button type="button" class="btn btn-sm btn-primary edit-addon me-1"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger delete-addon"><i class="fas fa-trash"></i></button>
                  </div>
                  <input type="hidden" name="addons[]" value="<?= htmlspecialchars($addon['addons']) ?>">
                </li>
              <?php } ?>
            </ul>
          </div>

        </div>

        <div class="d-flex gap-2 pt-2">
          <button type="submit"
                  name="<?= $editMode ? 'update_addons' : 'add_addons' ?>"
                  class="btn btn-primary">
            <i class="fas fa-save me-2"></i>
            <?= $editMode ? 'Update' : 'Save' ?>
          </button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

      </form>

    </div>
  </div>
</div>

<?php include 'common/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function() {

  // Add Addon
  $('#addAddonBtn').click(function() {
    var addon = $('#addonInput').val().trim();
    if (addon === '') return;
    
    var listItem = `<li class="list-group-item d-flex justify-content-between align-items-center">
                      <span class="addon-text">${addon}</span>
                      <div>
                        <button type="button" class="btn btn-sm btn-primary edit-addon me-1"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger delete-addon"><i class="fas fa-trash"></i></button>
                      </div>
                      <input type="hidden" name="addons[]" value="${addon}">
                    </li>`;
    $('#addonsList').append(listItem);
    $('#addonInput').val('');
  });

  // Delete Addon
  $(document).on('click', '.delete-addon', function() {
    $(this).closest('li').remove();
  });

  // Edit Addon
  $(document).on('click', '.edit-addon', function() {
    var li = $(this).closest('li');
    var textSpan = li.find('.addon-text');
    var currentText = textSpan.text();
    var newText = prompt('Edit addon:', currentText);
    if (newText !== null && newText.trim() !== '') {
      textSpan.text(newText);
      li.find('input[name="addons[]"]').val(newText);
    }
  });

});
</script>

</body>
</html>