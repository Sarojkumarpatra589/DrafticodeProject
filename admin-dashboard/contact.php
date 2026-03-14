<?php
include 'connection/config.php';

/* FETCH CONTACT MESSAGES */

$stmt = $pdo->prepare("SELECT * FROM contact ORDER BY id DESC");
$stmt->execute();
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Messages — Drafticode</title>

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

<h1 class="page-title">Contact Messages</h1>

<nav>

<ol class="breadcrumb">

<li class="breadcrumb-item"><a href="index.php">Home</a></li>

<li class="breadcrumb-item active">Messages</li>

</ol>

</nav>

</div>

</div>


<div class="admin-card">

<div class="section-header">

<h3 class="section-title">

<i class="fas fa-envelope me-2 text-primary-custom"></i>

Contact Messages

</h3>

</div>


<div class="table-responsive">

<table class="admin-table">

<thead>

<tr>

<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Subject</th>
<th>Message</th>
<th>Date</th>
<th>Action</th>

</tr>

</thead>


<tbody>

<?php
$i = 1;

foreach($messages as $row){
?>

<tr>

<td class="table-id">#<?= $i++ ?></td>

<td class="fw-700">

<?= htmlspecialchars($row['name']) ?>

</td>

<td>

<?= htmlspecialchars($row['email']) ?>

</td>

<td>

<?= htmlspecialchars($row['phone']) ?>

</td>

<td>

<?= htmlspecialchars($row['subject']) ?>

</td>

<td style="max-width:200px;font-size:12.5px;color:var(--text-secondary)">

<?= substr(htmlspecialchars($row['message']),0,80) ?>...

</td>

<td style="font-size:12.5px">

<?= date("M d, Y", strtotime($row['contacted_at'])) ?>

</td>

<td>

<div class="d-flex gap-1">

<a href="view_message.php?id=<?= $row['id'] ?>" class="btn-icon view" title="View">

<i class="fas fa-eye"></i>

</a>

<a href="function.php?action=delete_message&id=<?= $row['id'] ?>"
class="btn-icon delete"
onclick="return confirm('Delete message?')">

<i class="fas fa-trash"></i>

</a>

</div>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<?php include 'common/footer.php' ?>

</div>

</body>
</html>