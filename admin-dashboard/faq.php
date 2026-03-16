<?php
include 'connection/config.php';

$stmt = $pdo->prepare("SELECT * FROM faq ORDER BY id DESC");
$stmt->execute();
$faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>All FAQ — Drafticode</title>

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

<h1 class="page-title">All FAQs</h1>

<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item">FAQ</li>
<li class="breadcrumb-item active">All FAQs</li>
</ol>
</nav>

</div>

</div>

<div class="admin-card">

<div class="section-header">

<h3 class="section-title">
<i class="fas fa-question-circle me-2 text-primary-custom"></i>FAQs
</h3>

<a href="add_faq.php" class="btn btn-primary btn-sm">
<i class="fas fa-plus me-1"></i>Add FAQ
</a>

</div>

<div class="table-responsive">

<table class="admin-table">

<thead>
<tr>
<th>#</th>
<th>Question</th>
<th>Answer</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php
if ($faqs) {

$i = 1;

foreach ($faqs as $row) {
?>

<tr>

<td class="table-id">#<?= $i++ ?></td>

<td class="fw-700">
<?= htmlspecialchars($row['question']) ?>
</td>

<td style="max-width:350px;font-size:12.5px;color:var(--text-muted)">
<?= substr(strip_tags($row['answer']),0,80) ?>...
</td>

<td>

<div class="d-flex gap-1">

<a href="addfaq.php?action=edit_faq&id=<?= $row['id'] ?>"
class="btn-icon edit"
title="Edit">

<i class="fas fa-edit"></i>

</a>

<a href="function.php?delete_faq=<?= $row['id'] ?>"
class="btn-icon delete"
onclick="return confirm('Delete this FAQ?')"
title="Delete">

<i class="fas fa-trash"></i>

</a>

</div>

</td>

</tr>

<?php
}
} else {

echo "<tr><td colspan='4'>No FAQs found</td></tr>";

}
?>

</tbody>

</table>

</div>

</div>

</div>

<?php include 'common/footer.php' ?>

</body>

</html>