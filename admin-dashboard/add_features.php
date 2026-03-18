<?php
include 'connection/config.php';

$features = [];
$package_id = null;

if (isset($_GET['last_id'])) {

    $pricing_id = $_GET['last_id'];

    // Get package_id from pricing
    $stmt = $pdo->prepare("SELECT * FROM pricing WHERE id=?");
    $stmt->execute([$pricing_id]);
    $pricing = $stmt->fetch();

    if ($pricing) {
        $package_id = $pricing['package_id'];

        // Fetch features
        $stmt2 = $pdo->prepare("SELECT * FROM features WHERE package_id=? ORDER BY id ASC");
        $stmt2->execute([$package_id]);
        $features = $stmt2->fetchAll();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>add featyures</title>

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
  <h1 class="page-title">Add features</h1>
</div>

<div class="row justify-content-center">
  <div class="col-lg-12">

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
         Add features
        </h3>
      </div>

      <form method="POST" action="function.php">
        <input type="hidden" id="package_id" value="<?= $package_id ?>">
<input type="hidden" id="pricing_id" value="<?= $_GET['last_id'] ?>">


        <div class="row g-3">

         
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
<li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?= $feature['id'] ?>">
  <span class="feature-text"><?= htmlspecialchars($feature['features']) ?></span>
  <div>
    <button type="button" class="btn btn-sm btn-primary edit-feature me-1"><i class="fas fa-edit"></i></button>
    <button type="button" class="btn btn-sm btn-danger delete-feature"><i class="fas fa-trash"></i></button>
  </div>
</li>
<?php } ?>
            </ul>
          </div>

        </div>

        <div class="d-flex gap-2 pt-2">
          <a href="add_addons.php?last_id=<?= $_GET['last_id'] ?>" class="btn btn-primary">
  Next
</a>
        </div>

      </form>

    </div>
  </div>
</div>

<?php include 'common/footer.php' ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(document).ready(function() {

  // ADD FEATURE (SAVE IN DB)
  $('#addFeatureBtn').click(function() {

    var feature = $('#featureInput').val().trim();
    var package_id = $('#package_id').val();

    if (feature === '') return;

    $.post('function.php', {
        action: 'add_feature',
        feature: feature,
        package_id: package_id
    }, function(response) {

        var data = JSON.parse(response);

        var listItem = `<li class="list-group-item d-flex justify-content-between align-items-center" data-id="${data.id}">
                          <span class="feature-text">${feature}</span>
                          <div>
                            <button type="button" class="btn btn-sm btn-primary edit-feature me-1"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-sm btn-danger delete-feature"><i class="fas fa-trash"></i></button>
                          </div>
                        </li>`;

        $('#featuresList').append(listItem);
        $('#featureInput').val('');
    });
  });

  // DELETE FEATURE
  $(document).on('click', '.delete-feature', function() {

    var li = $(this).closest('li');
    var id = li.data('id');

    $.post('function.php', {
        action: 'delete_feature',
        id: id
    }, function() {
        li.remove();
    });
  });

  // EDIT FEATURE
  $(document).on('click', '.edit-feature', function() {

    var li = $(this).closest('li');
    var id = li.data('id');
    var textSpan = li.find('.feature-text');

    var newText = prompt('Edit feature:', textSpan.text());

    if (newText !== null && newText.trim() !== '') {

        $.post('function.php', {
            action: 'update_feature',
            id: id,
            feature: newText
        }, function() {
            textSpan.text(newText);
        });
    }
  });

});
</script>

</body>
</html>