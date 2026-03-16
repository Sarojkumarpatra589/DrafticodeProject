<?php
include 'connection/config.php';

$editMode = isset($_GET['action']) && $_GET['action'] == 'edit_faq';
$row = [];

if ($editMode && isset($_GET['id'])) {
  $id = (int)$_GET['id'];

  $stmt = $pdo->prepare("SELECT * FROM faq WHERE id=?");
  $stmt->execute([$id]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $editMode ? 'Update FAQ' : 'Add FAQ' ?></title>

<link rel="icon" type="image/png" href="assets/images/fav.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>

<?php include 'common/sidebar.php' ?>
<?php include 'common/topbar.php' ?>

<div id="main-content">

<div class="page-header">
<h1 class="page-title"><?= $editMode ? 'Update FAQ' : 'Add FAQ' ?></h1>
</div>

<div class="row justify-content-center">

<div class="col-lg-12">

<div class="admin-card">

<div class="section-header">

<h3 class="section-title">
<i class="fas fa-question-circle me-2 text-primary-custom"></i>
<?= $editMode ? 'Update FAQ' : 'Add New FAQ' ?>
</h3>

</div>

<form action="function.php" method="POST">

<?php if ($editMode): ?>

<input type="hidden" name="id" value="<?= $row['id'] ?>">

<?php endif; ?>

<div class="row g-3">

<!-- QUESTION -->

<div class="col-md-12">

<label class="form-label">FAQ Question</label>

<input type="text"
class="form-control"
name="question"
required
value="<?= $editMode ? htmlspecialchars($row['question']) : '' ?>">

</div>


<!-- ANSWER -->

<div class="col-12">

<label class="form-label">FAQ Answer</label>

<textarea
id="answer"
class="form-control"
name="answer"
rows="5"
style="min-height:140px"><?= $editMode ? htmlspecialchars($row['answer'] ?? '') : '' ?></textarea>

</div>


<script src="ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace('answer',{
height:250
});

document.querySelector("form").addEventListener("submit",function(){
for (let instance in CKEDITOR.instances){
CKEDITOR.instances[instance].updateElement();
}
});
</script>


<div class="mt-4">

<button type="submit"
name="<?= $editMode ? 'update_faq' : 'add_faq' ?>"
class="btn btn-primary">

<?= $editMode ? 'Update FAQ' : 'Add FAQ' ?>

</button>

</div>

</div>

</form>

</div>
</div>
</div>

</div>

<?php include 'common/footer.php' ?>

</body>
</html>