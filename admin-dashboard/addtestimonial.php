<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['action']) && $_GET['action'] == 'edit_testimonial' && isset($_GET['id'])) {

    $editMode = true;

    $stmt = $pdo->prepare("SELECT * FROM testimonial WHERE id=?");
    $stmt->execute([$_GET['id']]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $editMode ? 'Update Testimonial' : 'Add New Testimonial' ?></title>

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
            <h1 class="page-title"><?= $editMode ? 'Edit Testimonial' : 'Add Testimonial' ?></h1>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-12">

                <div class="admin-card">
                    <div class="section-header">

                        <h3 class="section-title">

                            <i class="fas fa-plus-circle me-2 text-primary-custom"></i>

                            <?= $editMode ? 'Update Testimonial' : 'Add New Testimonial' ?>

                        </h3>

                    </div>

                    <form action="function.php" method="POST">

                        <?php if ($editMode) { ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <?php } ?>

                        <div class="row g-3">

                            <!-- CLIENT NAME -->

                            <div class="col-md-6">

                                <label class="form-label">Client Name</label>

                                <input type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter client name"
                                    value="<?= $editMode ? htmlspecialchars($row['name']) : '' ?>"
                                    required>

                            </div>


                            <!-- DESIGNATION -->

                            <div class="col-md-6">

                                <label class="form-label">Designation</label>

                                <input type="text"
                                    class="form-control"
                                    name="designation"
                                    placeholder="CEO, Company"
                                    value="<?= $editMode ? htmlspecialchars($row['designation']) : '' ?>"
                                    required>

                            </div>


                            <!-- TESTIMONIAL -->

                          
                            <div class="col-12">
  <div class="mb-3">
    <label class="form-label">Testimonial</label>

    <textarea
      class="form-control"
      name="testimonial"
      id="testimonial"
      rows="5"
      style="min-height:140px"><?= $editMode ? htmlspecialchars($row['description'] ?? '') : '' ?></textarea>

  </div>
</div>


<script src="ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('description', {
    height: 300
});

// update textarea when form submits
document.querySelector("form").addEventListener("submit", function () {
    for (let instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
});
</script>

                        </div>


                        <!-- BUTTONS -->

                        <div class="d-flex gap-2 pt-3">

                            <?php if ($editMode) { ?>

                                <button type="submit"
                                    name="update_testimonial"
                                    class="btn btn-primary">

                                    <i class="fas fa-save me-2"></i>Update

                                </button>

                            <?php } else { ?>

                                <button type="submit"
                                    name="add_testimonial"
                                    class="btn btn-primary">

                                    <i class="fas fa-save me-2"></i>Save

                                </button>

                            <?php } ?>

                            <button type="reset" class="btn btn-secondary">Reset</button>

                        </div>

                    </form>

                </div>
            </div>
        </div>

        <?php include 'common/footer.php' ?>

    </div>

    <!-- CKEDITOR -->

    <script>
        CKEDITOR.replace('testimonial');
    </script>

</body>

</html>