<?php
include 'connection/config.php';

$stmt = $pdo->query("SELECT * FROM courses ORDER BY id DESC");
$courses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>All Courses — Drafticode</title>

<link rel="icon" type="image/png" href="assets/images/fav.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/admin.css">

</head>

<body>

<!-- SIDEBAR -->
<?php include 'common/sidebar.php' ?>

<!-- TOPBAR -->
<?php include 'common/topbar.php' ?>

<!-- MAIN CONTENT -->
<div id="main-content">

<div class="page-header">
<div>

<h1 class="page-title">All Courses</h1>

<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item"><a href="#">Courses</a></li>
<li class="breadcrumb-item active">All Courses</li>
</ol>
</nav>

</div>
</div>


<div class="admin-card">

<div class="section-header">

<h3 class="section-title">
<i class="fas fa-graduation-cap me-2 text-primary-custom"></i>
Courses
</h3>

<div class="d-flex gap-2">

<a href="addcourse.php" class="btn btn-primary btn-sm">
<i class="fas fa-plus me-1"></i>
Add Course
</a>

</div>

</div>


<div class="table-responsive">

<table class="admin-table">

<thead>

<tr>
<th>#</th>
<th>Thumb</th>
<th>Course</th>
<th>Instructor</th>
<th>Duration</th>
<th>Price</th>
<th>Level</th>
<th>Status</th>
<th>Actions</th>
</tr>

</thead>


<tbody>

<?php
$i=1;
foreach($courses as $course){
?>

<tr>

<td class="table-id">
#<?= str_pad($i++,3,'0',STR_PAD_LEFT); ?>
</td>


<td>
<div style="width:50px;height:36px;background:linear-gradient(135deg,#e8ecf4,#d1d9ee);border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:9px;color:#9ca3af;font-weight:600;">
COURSE
</div>
</td>


<td class="fw-700">
<?= htmlspecialchars($course['course_name']) ?>
</td>


<td style="font-size:12.5px">
Instructor
</td>


<td style="font-size:12.5px">
--
</td>


<td class="fw-700" style="color:var(--accent-green)">
--
</td>


<td>
<span class="badge" style="background:#e8ecf4;color:#6b7280;font-size:11.5px">
<?= htmlspecialchars($course['shortdescription']) ?>
</span>
</td>


<td>
<span class="badge-status badge-active">
Active
</span>
</td>


<td>

<div class="d-flex gap-1">


<a href="addcourse.php?action=edit&id=<?= $course['id'] ?>"
class="btn-icon edit"
data-bs-toggle="tooltip"
title="Edit">

<i class="fas fa-edit"></i>

</a>


<a href="function_course.php?action=delete_course&id=<?= $course['id'] ?>"
class="btn-icon delete"
onclick="return confirm('Delete this course?')"
title="Delete">

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


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>