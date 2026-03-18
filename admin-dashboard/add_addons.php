<?php
include 'connection/config.php';

$addons = [];
$package_id = null;

if (isset($_GET['last_id'])) {

    $pricing_id = $_GET['last_id'];

    // Get package_id from pricing
    $stmt = $pdo->prepare("SELECT * FROM pricing WHERE id=?");
    $stmt->execute([$pricing_id]);
    $pricing = $stmt->fetch();

    if ($pricing) {
        $package_id = $pricing['package_id'];

        // Fetch addons
        $stmt2 = $pdo->prepare("SELECT * FROM addons WHERE package_id=? ORDER BY id ASC");
        $stmt2->execute([$package_id]);
        $addons = $stmt2->fetchAll();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Addons</title>

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
  <h1 class="page-title">Add Addons</h1>
</div>

<div class="row justify-content-center">
  <div class="col-lg-12">

    <div class="admin-card">

      <div class="section-header">
        <h3 class="section-title">
          <i class="fas fa-plus-circle me-2 text-primary-custom"></i>
          Add New Addons
        </h3>
      </div>

      <form>

        <!-- Hidden -->
        <input type="hidden" id="package_id" value="<?= $package_id ?>">

        <div class="row g-3">

          <!-- Addons Section -->
          <div class="col-md-12">
            <div class="mb-3">
              <label class="form-label">Add Addons</label>
              <div class="d-flex gap-2">
                <input type="text" id="addonInput" class="form-control" placeholder="Enter addon">
                <button type="button" id="addAddonBtn" class="btn btn-success">
                  <i class="fas fa-plus"></i> Add
                </button>
              </div>
            </div>

            <!-- Addons List -->
            <ul class="list-group" id="addonsList">
              <?php foreach ($addons as $addon) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center" data-id="<?= $addon['id'] ?>">
                  <span class="addon-text"><?= htmlspecialchars($addon['addons']) ?></span>
                  <div>
                    <button type="button" class="btn btn-sm btn-primary edit-addon me-1">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-danger delete-addon">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>

        </div>

        <div class="d-flex gap-2 pt-3">
          <a href="package.php" class="btn btn-primary">
            <i class="fas fa-arrow-right me-2"></i> Finish
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

  // ADD ADDON
  $('#addAddonBtn').click(function() {

    var addon = $('#addonInput').val().trim();
    var package_id = $('#package_id').val();

    if (addon === '') return;

    $.post('function.php', {
        action: 'add_addon',
        addon: addon,
        package_id: package_id
    }, function(response) {

        var data = JSON.parse(response);

        var listItem = `<li class="list-group-item d-flex justify-content-between align-items-center" data-id="${data.id}">
                          <span class="addon-text">${addon}</span>
                          <div>
                            <button type="button" class="btn btn-sm btn-primary edit-addon me-1">
                              <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger delete-addon">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>
                        </li>`;

        $('#addonsList').append(listItem);
        $('#addonInput').val('');
    });
  });

  // DELETE ADDON
  $(document).on('click', '.delete-addon', function() {

    var li = $(this).closest('li');
    var id = li.data('id');

    $.post('function.php', {
        action: 'delete_addon',
        id: id
    }, function() {
        li.remove();
    });
  });

  // EDIT ADDON
  $(document).on('click', '.edit-addon', function() {

    var li = $(this).closest('li');
    var id = li.data('id');
    var textSpan = li.find('.addon-text');

    var newText = prompt('Edit addon:', textSpan.text());

    if (newText !== null && newText.trim() !== '') {

        $.post('function.php', {
            action: 'update_addon',
            id: id,
            addon: newText
        }, function() {
            textSpan.text(newText);
        });
    }
  });

});
</script>

</body>
</html>