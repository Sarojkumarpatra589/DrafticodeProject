<?php
include 'connection/config.php';

$editMode = false;
$row = [];

if (isset($_GET['action']) && $_GET['action'] == 'edit') {

    $editMode = true;
    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM courses WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $editMode ? 'Update Course' : 'Add Course' ?> — Drafticode</title>

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
            <div>
                <h1 class="page-title"><?= $editMode ? 'Update Course' : 'Add Course' ?></h1>

            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-12 col-xl-12">

                <div class="admin-card">

                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-graduation-cap me-2 text-primary-custom"></i>
                            <?= $editMode ? 'Update Course' : 'Add New Course' ?>
                        </h3>
                    </div>

                    <form method="POST" action="function.php" enctype="multipart/form-data">

                        <?php if ($editMode) { ?>
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <?php } ?>

                        <div class="row g-3">

                            <div class="col-md-8">

                                <div class="mb-3">

                                    <label class="form-label">Course Name</label>

                                    <input type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Enter course name"
                                        value="<?= $editMode ? htmlspecialchars($row['course_name']) : '' ?>"
                                        required>

                                </div>
                            </div>


                            <div class="col-md-4">

                                <div class="mb-3">

                                    <label class="form-label">Category</label>

                                    <select class="form-select" name="category">

                                        <option value="Development"
                                            <?= ($editMode && $row['shortdescription'] == 'Development') ? 'selected' : '' ?>>Development</option>

                                        <option value="Design"
                                            <?= ($editMode && $row['shortdescription'] == 'Design') ? 'selected' : '' ?>>Design</option>

                                        <option value="Marketing"
                                            <?= ($editMode && $row['shortdescription'] == 'Marketing') ? 'selected' : '' ?>>Marketing</option>

                                        <option value="Business"
                                            <?= ($editMode && $row['shortdescription'] == 'Business') ? 'selected' : '' ?>>Business</option>

                                        <option value="Data Science"
                                            <?= ($editMode && $row['shortdescription'] == 'Data Science') ? 'selected' : '' ?>>Data Science</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-12">

                                <label class="form-label">Image</label>

                                <input type="file"
                                    name="image"
                                    class="form-control"
                                    id="clientLogoUpload"
                                    accept="image/*">

                                <div class="mt-2" id="clientLogoPreview">

                                    <?php if ($editMode && !empty($row['image'])): ?>

                                        <img src="../upload/<?= $row['image'] ?>" width="120">

                                    <?php endif; ?>

                                </div>

                            </div>
                            <div class="col-md-4">
        <label class="form-label">Course Price</label>
        <input type="text" class="form-control" name="course_price"
            value="<?= $editMode ? $row['course_price'] ?? '' : '' ?>"
            placeholder="₹ 14,999/-">
    </div>

    <div class="col-md-4">
        <label class="form-label">Instructor</label>
        <input type="text" class="form-control" name="instructor"
            value="<?= $editMode ? $row['instructor'] ?? '' : '' ?>">
    </div>

    <div class="col-md-4">
        <label class="form-label">Duration</label>
        <input type="text" class="form-control" name="duration"
            value="<?= $editMode ? $row['duration'] ?? '' : '' ?>"
            placeholder="12 Weeks">
    </div>

    <div class="col-md-3">
        <label class="form-label">Lessons</label>
        <input type="number" class="form-control" name="lessons"
            value="<?= $editMode ? $row['lessons'] ?? '' : '' ?>">
    </div>

    <div class="col-md-3">
        <label class="form-label">Seats</label>
        <input type="number" class="form-control" name="seats"
            value="<?= $editMode ? $row['seats'] ?? '' : '' ?>">
    </div>

    <div class="col-md-3">
        <label class="form-label">Language</label>
        <input type="text" class="form-control" name="language"
            value="<?= $editMode ? $row['language'] ?? '' : '' ?>"
            placeholder="English, Hindi">
    </div>

    <div class="col-md-3">
        <label class="form-label">Certification</label>
        <input type="text" class="form-control" name="certification"
            value="<?= $editMode ? $row['certification'] ?? '' : '' ?>"
            placeholder="Physical">
    </div>
  
    <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Courses Short Details</label>

                                    <textarea
                                        class="form-control"
                                        name="short_description"
                                        id="short_description"
                                        rows="5"
                                        style="min-height:140px"><?= $editMode ? htmlspecialchars($row['short_description'] ?? '') : '' ?></textarea>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Courses Details</label>

                                    <textarea
                                        class="form-control"
                                        name="description"
                                        id="description"
                                        rows="5"
                                        style="min-height:140px"><?= $editMode ? htmlspecialchars($row['description'] ?? '') : '' ?></textarea>

                                </div>
                            </div>
                             <div class="col-md-12">
<div class="mb-3">

<label class="form-label">Slug (SEO URL)</label>

<input type="text"
class="form-control"
name="slug"
value="<?= $editMode ? htmlspecialchars($row['slug'] ?? '') : '' ?>"
placeholder="example-blog-title">

</div>
</div>
              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Title</label>

                  <input type="text"
                    class="form-control"
                    name="meta_title"
                    value="<?= $editMode ? htmlspecialchars($row['meta_title'] ?? '') : '' ?>">

                </div>
              </div>


              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Keywords</label>

                  <textarea
                    class="form-control"
                    name="meta_keywords"
                    rows="2"><?= $editMode ? htmlspecialchars($row['meta_keywords'] ?? '') : '' ?></textarea>

                </div>
              </div>


              <div class="col-md-12">
                <div class="mb-3">

                  <label class="form-label">Meta Description</label>

                  <textarea
                    class="form-control"
                    name="meta_description"
                    rows="3"><?= $editMode ? htmlspecialchars($row['meta_description'] ?? '') : '' ?></textarea>

                </div>
              </div>


                            <script src="ckeditor/ckeditor.js"></script>

                            <script>
                                CKEDITOR.replace('description', {
                                    height: 300
                                });

                                // update textarea when form submits
                                document.querySelector("form").addEventListener("submit", function() {
                                    for (let instance in CKEDITOR.instances) {
                                        CKEDITOR.instances[instance].updateElement();
                                    }
                                });
                            </script>
                            <script>
                                CKEDITOR.replace('short_description', {
                                    height: 300
                                });

                                // update textarea when form submits
                                document.querySelector("form").addEventListener("submit", function() {
                                    for (let instance in CKEDITOR.instances) {
                                        CKEDITOR.instances[instance].updateElement();
                                    }
                                });
                            </script>

                        </div>


                        <div class="d-flex gap-2 pt-2">

                            <button type="submit"
                                name="<?= $editMode ? 'update_course' : 'add_course' ?>"
                                class="btn btn-primary">

                                <i class="fas fa-save me-2"></i>
                                <?= $editMode ? 'Update Course' : 'Save Course' ?>

                            </button>

                            <button type="reset" class="btn btn-secondary">Reset</button>

                        </div>

                    </form>

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