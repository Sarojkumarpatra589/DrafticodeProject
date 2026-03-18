<?php
include 'connection/config.php';

$editMode = false;
$row = [];
$features = [];

if (isset($_GET['action']) && $_GET['action'] == "edit_package") {
    $editMode = true;
    $id = $_GET['id'];

    // Fetch package
    $stmt = $pdo->prepare("SELECT * FROM packages WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    // Fetch package features
    $stmt2 = $pdo->prepare("SELECT * FROM features WHERE package_id=? ORDER BY id ASC");
    $stmt2->execute([$id]);
    $features = $stmt2->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $editMode ? 'Update Package' : 'Add Package' ?></title>

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
  <h1 class="page-title"><?= $editMode ? 'Update Package' : 'Add Package' ?></h1>
</div>

<div class="row justify-content-center">
  <div class="col-lg-12">

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
          <?= $editMode ? 'Update Package' : 'Add New Package' ?>
        </h3>
      </div>

      <form method="POST" action="function.php">

        <?php if ($editMode) { ?>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <?php } ?>

        <div class="row g-3">

          <!-- Package Name -->
          <div class="col-md-12">
            
              <input type="hidden" name="package_id" value="<?= $editMode ? $row['id'] : '' ?>">
           
          </div>

          <!-- Features Section -->
          <div class="col-md-12">
            <div class="mb-3">
              <label class="form-label">Add Features</label>
              <div class="d-flex gap-2">
                <input type="text" id="featureInput" class="form-control" placeholder="Enter feature">
                <button type="button" id="addFeatureBtn" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
              </div>
            </div>

            <!-- Features List -->
            <ul class="list-group" id="featuresList">
              <?php foreach ($features as $feature) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="feature-text"><?= htmlspecialchars($feature['features']) ?></span>
                  <div>
                    <button type="button" class="btn btn-sm btn-primary edit-feature me-1"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger delete-feature"><i class="fas fa-trash"></i></button>
                  </div>
                  <input type="hidden" name="features[]" value="<?= htmlspecialchars($feature['features']) ?>">
                </li>
              <?php } ?>
            </ul>
          </div>

        </div>

        <div class="d-flex gap-2 pt-2">
          <button type="submit"
                  name="<?= $editMode ? 'update_package' : 'add_package' ?>"
                  class="btn btn-primary">
            <i class="fas fa-save me-2"></i>
            <?= $editMode ? 'Update' : 'Next' ?>
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<?php include 'common/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
let editMode = false;
let currentEditItem = null;

// Add OR Update Feature
$('#addFeatureBtn').click(function() {

  var feature = $('#featureInput').val().trim();
  if (feature === '') return;

  // 👉 UPDATE MODE
  if (editMode) {
    currentEditItem.find('.feature-text').text(feature);
    currentEditItem.find('input[name="features[]"]').val(feature);

    editMode = false;
    currentEditItem = null;
    $('#addFeatureBtn').html('<i class="fas fa-plus"></i> Add');
  }

  // 👉 ADD MODE
  else {
    var listItem = `<li class="list-group-item d-flex justify-content-between align-items-center">
                      <span class="feature-text">${feature}</span>
                      <div>
                        <button type="button" class="btn btn-sm btn-primary edit-feature me-1">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger delete-feature">
                          <i class="fas fa-trash"></i>
                        </button>
                      </div>
                      <input type="hidden" name="features[]" value="${feature}">
                    </li>`;

    $('#featuresList').append(listItem);
  }

  $('#featureInput').val('');
});


// Delete Feature
$(document).on('click', '.delete-feature', function() {
  $(this).closest('li').remove();
});


// Edit Feature (NO PROMPT NOW 🚀)
$(document).on('click', '.edit-feature', function() {

  editMode = true;
  currentEditItem = $(this).closest('li');

  let text = currentEditItem.find('.feature-text').text();

  $('#featureInput').val(text).focus();

  // Change button text
  $('#addFeatureBtn').html('<i class="fas fa-save"></i> Update');
});
</script>

</body>
</html>