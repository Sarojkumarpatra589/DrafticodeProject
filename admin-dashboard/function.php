<?php
include 'connection/config.php';

$uploadDir = "../upload/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir,0777,true);
}

### ADD SLIDER
if(isset($_POST['add_slider'])){

$title = $_POST['title'];
$description = $_POST['description'];

if(empty($_FILES['image']['name'])){
die("Image required");
}

$ext = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

$stmt=$pdo->prepare("
INSERT INTO slider(title,image,description)
VALUES(?,?,?)
");

$stmt->execute([$title,$image,$description]);

header("Location: slider.php");
exit();

}


### UPDATE SLIDER
if(isset($_POST['update_slider'])){

$id=$_POST['id'];

$title=$_POST['title'];
$description=$_POST['description'];

$image=$_POST['old_image'];

if(!empty($_FILES['image']['name'])){

$ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

if(!empty($_POST['old_image'])){
$old=$uploadDir.$_POST['old_image'];
if(file_exists($old)) unlink($old);
}

}

$stmt=$pdo->prepare("
UPDATE slider
SET title=?,image=?,description=?
WHERE id=?
");

$stmt->execute([$title,$image,$description,$id]);

header("Location: slider.php");
exit();

}



### DELETE SLIDER
if(isset($_GET['action']) && $_GET['action']=="delete_slider"){

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT image FROM slider WHERE id=?");
$stmt->execute([$id]);
$row=$stmt->fetch();

if($row){

$file=$uploadDir.$row['image'];

if(file_exists($file)){
unlink($file);
}

$del=$pdo->prepare("DELETE FROM slider WHERE id=?");
$del->execute([$id]);

}

header("Location: slider.php");
exit();

}







### ADD CLIENT
if(isset($_POST['add_client'])){

$name = $_POST['name'];

$ext = strtolower(pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION));

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['logo']['tmp_name'],$uploadDir.$image);

$stmt=$pdo->prepare("
INSERT INTO clients(name,image)
VALUES(?,?)
");

$stmt->execute([$name,$image]);

header("Location: clients.php");
exit();

}


### UPDATE CLIENT
if(isset($_POST['update_client'])){

$id=$_POST['id'];
$name=$_POST['name'];

$image=$_POST['old_image'];

if(!empty($_FILES['logo']['name'])){

$ext=strtolower(pathinfo($_FILES['logo']['name'],PATHINFO_EXTENSION));

$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['logo']['tmp_name'],$uploadDir.$image);

if(file_exists($uploadDir.$_POST['old_image'])){
unlink($uploadDir.$_POST['old_image']);
}

}

$stmt=$pdo->prepare("
UPDATE clients
SET name=?, image=?
WHERE id=?
");

$stmt->execute([$name,$image,$id]);

header("Location: clients.php");
exit();

}


### DELETE CLIENT
if(isset($_GET['action']) && $_GET['action']=="delete_client"){

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT image FROM clients WHERE id=?");
$stmt->execute([$id]);
$row=$stmt->fetch();

if($row){

$file=$uploadDir.$row['image'];

if(file_exists($file)){
unlink($file);
}

$del=$pdo->prepare("DELETE FROM clients WHERE id=?");
$del->execute([$id]);

/* INSERT ACTIVITY */
$pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
VALUES ('Deleted client','Clients','Admin','Deleted')")->execute();

}

header("Location: clients.php");
exit();

}



/* =============================
   ADD TESTIMONIAL
============================= */

if(isset($_POST['add_testimonial'])){

$name = $_POST['name'];
$designation = $_POST['designation'];
$testimonial = $_POST['testimonial'];

$stmt = $pdo->prepare("
INSERT INTO testimonial (name,designation,testimonial)
VALUES (?,?,?)
");

$stmt->execute([$name,$designation,$testimonial]);

header("Location: testimonial.php");
exit();

}


/* =============================
   UPDATE TESTIMONIAL
============================= */

if(isset($_POST['update_testimonial'])){

$id = $_POST['id'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$testimonial = $_POST['testimonial'];

$stmt = $pdo->prepare("
UPDATE testimonial
SET name=?, designation=?, testimonial=?
WHERE id=?
");

$stmt->execute([$name,$designation,$testimonial,$id]);

header("Location: testimonial.php");
exit();

}


/* =============================
   DELETE TESTIMONIAL
============================= */

if(isset($_GET['delete_testimonial'])){

$id = $_GET['delete_testimonial'];

$stmt = $pdo->prepare("DELETE FROM testimonial WHERE id=?");
$stmt->execute([$id]);

header("Location: testimonial.php");
exit();

}


$uploadDir = "../upload/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir,0777,true);
}

### ADD TEAM MEMBER
if(isset($_POST['add_team'])){

$name = $_POST['name'];
$designation = $_POST['designation'];

if(empty($_FILES['photo']['name'])){
die("Image required");
}

$ext = strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['photo']['tmp_name'],$uploadDir.$image);

$stmt=$pdo->prepare("
INSERT INTO teams(name,image,designation)
VALUES(?,?,?)
");

$stmt->execute([$name,$image,$designation]);

header("Location: team.php");
exit();

}


### UPDATE TEAM MEMBER
if(isset($_POST['update_team'])){

$id=$_POST['id'];

$name=$_POST['name'];
$designation=$_POST['designation'];

$image=$_POST['old_image'];

if(!empty($_FILES['photo']['name'])){

$ext=strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['photo']['tmp_name'],$uploadDir.$image);

if(!empty($_POST['old_image'])){
$old=$uploadDir.$_POST['old_image'];

if(file_exists($old)){
unlink($old);
}
}

}

$stmt=$pdo->prepare("
UPDATE teams
SET name=?,image=?,designation=?
WHERE id=?
");

$stmt->execute([$name,$image,$designation,$id]);

header("Location: team.php");
exit();

}


### DELETE TEAM MEMBER
if(isset($_GET['action']) && $_GET['action']=="delete_team"){

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT image FROM teams WHERE id=?");
$stmt->execute([$id]);

$row=$stmt->fetch();

if($row){

$file=$uploadDir.$row['image'];

if(file_exists($file)){
unlink($file);
}

$del=$pdo->prepare("DELETE FROM teams WHERE id=?");
$del->execute([$id]);

}

header("Location: team.php");
exit();

}


if(isset($_POST['add_project'])){

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    if(empty($_FILES['image']['name'])){
        die("Image required");
    }

    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','webp','gif'];

    if(!in_array($ext, $allowed)){
        die("Invalid image");
    }

    $image = time().rand(100,999).".".$ext;

    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$image);

    // ✅ FIXED (8 placeholders)
    $stmt = $pdo->prepare("INSERT INTO projects 
    (title, image, short_description, description, slug, meta_title, meta_keywords, meta_description) 
    VALUES (?,?,?,?,?,?,?,?)");

    $stmt->execute([
        $title,
        $image,
        $short_description,
        $description,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description
    ]);

    $pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
    VALUES ('Added new project','Projects','Admin','Success')")->execute();

    header("Location: project.php");
    exit();
}

if(isset($_POST['update_project'])){

    $id = $_POST['id'];

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $image = $_POST['old_image'];

    if(!empty($_FILES['image']['name'])){

        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];

        if(!in_array($ext, $allowed)){
            die("Invalid image");
        }

        $image = time().rand(100,999).".".$ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$image);

        // delete old image
        if(!empty($_POST['old_image'])){
            $old = $uploadDir.$_POST['old_image'];
            if(file_exists($old)){
                unlink($old);
            }
        }
    }

    // ✅ FIXED QUERY
    $stmt = $pdo->prepare("UPDATE projects SET 
        title=?,
        image=?,
        short_description=?,
        description=?,
        slug=?,
        meta_title=?,
        meta_keywords=?,
        meta_description=?
        WHERE id=?");

    $stmt->execute([
        $title,
        $image,
        $short_description,
        $description,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $id
    ]);

    $pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
    VALUES ('Updated project','Projects','Admin','Success')")->execute();

    header("Location: project.php");
    exit();
}
if(isset($_POST['update_project'])){

    $id = $_POST['id'];

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $image = $_POST['old_image'];

    if(!empty($_FILES['image']['name'])){

        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];

        if(!in_array($ext, $allowed)){
            die("Invalid image");
        }

        $image = time().rand(100,999).".".$ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir.$image);

        // delete old image
        if(!empty($_POST['old_image'])){
            $old = $uploadDir.$_POST['old_image'];
            if(file_exists($old)){
                unlink($old);
            }
        }
    }

    // ✅ FIXED QUERY
    $stmt = $pdo->prepare("UPDATE projects SET 
        title=?,
        image=?,
        short_description=?,
        description=?,
        slug=?,
        meta_title=?,
        meta_keywords=?,
        meta_description=?
        WHERE id=?");

    $stmt->execute([
        $title,
        $image,
        $short_description,
        $description,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $id
    ]);

    $pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
    VALUES ('Updated project','Projects','Admin','Success')")->execute();

    header("Location: project.php");
    exit();
}

/* ================= DELETE PROJECT ================= */
if (isset($_GET['action']) && $_GET['action'] == 'delete_project') {

    $id = $_GET['id'] ?? null;

    if (!$id) {
        die("Invalid ID");
    }

    // 🔹 Get project image first
    $stmt = $pdo->prepare("SELECT image FROM projects WHERE id=?");
    $stmt->execute([$id]);
    $project = $stmt->fetch();

    // 🔹 Delete image from folder
    if ($project && !empty($project['image'])) {

        $filePath = $uploadDir . $project['image'];

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // 🔹 Delete project from DB
    $stmt = $pdo->prepare("DELETE FROM projects WHERE id=?");
    $stmt->execute([$id]);

    // 🔹 Log activity
    $pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
    VALUES ('Deleted project','Projects','Admin','Success')")->execute();

    header("Location: project.php");
exit();
}

### ADD SERVICE
if(isset($_POST['add_service'])){

$title = $_POST['title'];
$short_description = $_POST['short_description'];
$description = $_POST['description'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$meta_keywords = $_POST['meta_keywords'];
$meta_description = $_POST['meta_description'];

if(empty($_FILES['image']['name'])){
die("Image required");
}

$ext = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

$stmt=$pdo->prepare("INSERT INTO services(title,image,short_description,description,slug,meta_title,meta_keywords,meta_description) VALUES(?,?,?,?,?,?,?,?)");

$stmt->execute([$title,$image,$short_description,$description,$slug,$meta_title,$meta_keywords,$meta_description]);

header("Location: service.php");
exit();

}
### UPDATE SERVICE
if(isset($_POST['update_service'])){

$id=$_POST['id'];

$title=$_POST['title'];
$short_description=$_POST['short_description'];
$description=$_POST['description'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$meta_keywords = $_POST['meta_keywords'];
$meta_description = $_POST['meta_description'];

$image=$_POST['old_image'];

if(!empty($_FILES['image']['name'])){

$ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$allowed=['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

if(!empty($_POST['old_image'])){
$old=$uploadDir.$_POST['old_image'];
if(file_exists($old)){
unlink($old);
}
}

}

$stmt=$pdo->prepare("UPDATE services SET title=?,image=?,short_description=?,description=?,slug=?,meta_title=?,meta_keywords=?,meta_description=? WHERE id=?");

$stmt->execute([$title,$image,$short_description,$description,$slug,$meta_title,$meta_keywords,$meta_description,$id]);

header("Location: service.php");
exit();

}

### DELETE SERVICE
if(isset($_GET['action']) && $_GET['action']=="delete_service"){

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT image FROM services WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if($row){

$imageName = trim($row['image']);

if(!empty($imageName)){

$filePath = "../upload/".$imageName;

if(is_file($filePath)){
unlink($filePath);   // permanently delete image
}

}

$del = $pdo->prepare("DELETE FROM services WHERE id=?");
$del->execute([$id]);

}

header("Location: service.php");
exit();

}




// ================= ADD PRODUCT =================
if(isset($_POST['add_product'])){

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    if(empty($_FILES['image']['name'])){
        die("Image required");
    }

    $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','webp','gif'];

    if(!in_array($ext,$allowed)){
        die("Invalid image");
    }

    $image = time().rand(100,999).".".$ext;

    move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

    // ✅ FIXED QUERY (8 placeholders)
    $stmt = $pdo->prepare("INSERT INTO products 
        (title,image,short_description,description,slug,meta_title,meta_keywords,meta_description) 
        VALUES (?,?,?,?,?,?,?,?)");

    $stmt->execute([
        $title,
        $image,
        $short_description,
        $description,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description
    ]);

    header("Location: product.php");
    exit();
}



// ================= UPDATE PRODUCT =================
if(isset($_POST['update_product'])){

    $id = $_POST['id'];

    $title = $_POST['title'];
    $short_description = $_POST['short_description'];
    $description = $_POST['description'];
    $slug = $_POST['slug'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $image = $_POST['old_image'];

    if(!empty($_FILES['image']['name'])){

        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp','gif'];

        if(!in_array($ext,$allowed)){
            die("Invalid image");
        }

        $image = time().rand(100,999).".".$ext;

        move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

        // delete old image
        if(!empty($_POST['old_image'])){
            $old = $uploadDir.$_POST['old_image'];
            if(file_exists($old)){
                unlink($old);
            }
        }
    }

    $stmt = $pdo->prepare("UPDATE products SET 
        title=?,
        image=?,
        short_description=?,
        description=?,
        slug=?,
        meta_title=?,
        meta_keywords=?,
        meta_description=?
        WHERE id=?");

    $stmt->execute([
        $title,
        $image,
        $short_description,
        $description,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $id
    ]);

    header("Location: product.php");
    exit();
}



// ================= DELETE PRODUCT =================
if(isset($_GET['action']) && $_GET['action']=="delete_product"){

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT image FROM products WHERE id=?");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if($row){

        $file = $uploadDir.$row['image'];

        if(is_file($file)){
            unlink($file);
        }

        $del = $pdo->prepare("DELETE FROM products WHERE id=?");
        $del->execute([$id]);
    }

    header("Location: product.php");
    exit();
}


### ADD BLOG
if(isset($_POST['add_blog'])){

$title = $_POST['title'];
$short_description = $_POST['short_description'];
$description = $_POST['description'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$meta_keywords = $_POST['meta_keywords'];
$meta_description = $_POST['meta_description'];

if(empty($_FILES['image']['name'])){
die("Image required");
}

$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

$stmt = $pdo->prepare("INSERT INTO blogs(title,image,short_description,description,slug,meta_title,meta_keywords,meta_description) VALUES(?,?,?,?)");

$stmt->execute([$title,$image,$short_description,$description,$slug,$meta_title,$meta_keywords,$meta_description]);

header("Location: blog.php");
exit();
}



### UPDATE BLOG
if(isset($_POST['update_blog'])){

$id = $_POST['id'];

$title = $_POST['title'];
$short_description = $_POST['short_description'];
$description = $_POST['description'];
$slug = $_POST['slug'];
$meta_title = $_POST['meta_title'];
$meta_keywords = $_POST['meta_keywords'];
$meta_description = $_POST['meta_description'];

$image = $_POST['old_image'];

if(!empty($_FILES['image']['name'])){

$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','webp','gif'];

if(!in_array($ext,$allowed)){
die("Invalid image");
}

$image = time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

if(!empty($_POST['old_image'])){
$old = $uploadDir.$_POST['old_image'];

if(file_exists($old)){
unlink($old);
}
}

}

$stmt = $pdo->prepare("UPDATE blogs SET title=?,image=?,short_description=?,description=?,slug=?,meta_title=?,meta_keywords=?,meta_description=? WHERE id=?");

$stmt->execute([$title,$image,$short_description,$description,$slug,$meta_title,$meta_keywords,$meta_description,$id]);

header("Location: blog.php");
exit();
}



### DELETE BLOG
if(isset($_GET['action']) && $_GET['action']=="delete_blog"){

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT image FROM blogs WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if($row){

$file = $uploadDir.$row['image'];

if(is_file($file)){
unlink($file);
}

$del = $pdo->prepare("DELETE FROM blogs WHERE id=?");
$del->execute([$id]);

}

header("Location: blog.php");
exit();
}

if(isset($_POST['add_course'])){

    $course_name       = $_POST['name'];
    $category          = $_POST['category'];
    $short_description = $_POST['short_description'];
    $description       = $_POST['description'];

    $course_price = $_POST['course_price'];
    $instructor   = $_POST['instructor'];
    $duration     = $_POST['duration'];
    $lessons      = $_POST['lessons'];
    $seats        = $_POST['seats'];
    $language     = $_POST['language'];
    $certification= $_POST['certification'];

    $slug = !empty($_POST['slug']) 
        ? $_POST['slug'] 
        : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $course_name)));

    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    // ✅ IMAGE UPLOAD
    $image = '';
    if(!empty($_FILES['image']['name'])){
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../upload/".$image);
    }

    $stmt = $pdo->prepare("INSERT INTO courses 
    (course_name, category, short_description, description, course_price, instructor, duration, lessons, seats, language, certification, image, meta_title, meta_keywords, meta_description, slug) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->execute([
        $course_name,
        $category,
        $short_description,
        $description,
        $course_price,
        $instructor,
        $duration,
        $lessons,
        $seats,
        $language,
        $certification,
        $image,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $slug
    ]);

    header("Location: course.php");
    exit();
}
if(isset($_POST['update_course'])){

    $id = $_POST['id'];

    $course_name       = $_POST['name'];
    $category          = $_POST['category'];
    $short_description = $_POST['short_description'];
    $description       = $_POST['description'];

    $course_price = $_POST['course_price'];
    $instructor   = $_POST['instructor'];
    $duration     = $_POST['duration'];
    $lessons      = $_POST['lessons'];
    $seats        = $_POST['seats'];
    $language     = $_POST['language'];
    $certification= $_POST['certification'];

    $slug = !empty($_POST['slug']) 
        ? $_POST['slug'] 
        : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $course_name)));

    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    // ✅ GET OLD IMAGE
    $stmt = $pdo->prepare("SELECT image FROM courses WHERE id=?");
    $stmt->execute([$id]);
    $old = $stmt->fetch();

    $image = $old['image'];

    // ✅ NEW IMAGE
    if(!empty($_FILES['image']['name'])){

        // DELETE OLD IMAGE
        if(!empty($old['image']) && file_exists("../upload/".$old['image'])){
            unlink("../upload/".$old['image']);
        }

        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/courses/".$image);
    }

    $stmt = $pdo->prepare("UPDATE courses SET 
        course_name=?,
        category=?,
        short_description=?,
        description=?,
        course_price=?,
        instructor=?,
        duration=?,
        lessons=?,
        seats=?,
        language=?,
        certification=?,
        image=?,
        meta_title=?,
        meta_keywords=?,
        meta_description=?,
        slug=?
        WHERE id=?");

    $stmt->execute([
        $course_name,
        $category,
        $short_description,
        $description,
        $course_price,
        $instructor,
        $duration,
        $lessons,
        $seats,
        $language,
        $certification,
        $image,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $slug,
        $id
    ]);

    header("Location: course.php");
    exit();
}
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    // ✅ GET IMAGE
    $stmt = $pdo->prepare("SELECT image FROM courses WHERE id=?");
    $stmt->execute([$id]);
    $course = $stmt->fetch();

    // ✅ DELETE IMAGE FROM FOLDER
    if(!empty($course['image']) && file_exists("../upload/".$course['image'])){
        unlink("../upload/".$course['image']);
    }

    // ✅ DELETE FROM DB
    $stmt = $pdo->prepare("DELETE FROM courses WHERE id=?");
    $stmt->execute([$id]);

    header("Location: course.php");
    exit();
}
### ADD JOB
if(isset($_POST['add_job'])){

$title = $_POST['title'];
$type = $_POST['type'];
$location = $_POST['location'];
$salary_min = $_POST['salary_min'];
$salary_max = $_POST['salary_max'];
$department = $_POST['department'];
$deadline = $_POST['deadline'];
$description = $_POST['description'];
$requirements = $_POST['requirements'];
$status = $_POST['status'];

$image="";

if(!empty($_FILES['image']['name'])){

$ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);
}

$stmt=$pdo->prepare("INSERT INTO jobs(title,type,location,salary_min,salary_max,department,deadline,description,requirements,image,status)
VALUES(?,?,?,?,?,?,?,?,?,?,?)");

$stmt->execute([$title,$type,$location,$salary_min,$salary_max,$department,$deadline,$description,$requirements,$image,$status]);

header("Location: job.php");
exit();

}

### UPDATE JOB
if(isset($_POST['update_job'])){

$id=$_POST['id'];

$title=$_POST['title'];
$type=$_POST['type'];
$location=$_POST['location'];
$salary_min=$_POST['salary_min'];
$salary_max=$_POST['salary_max'];
$department=$_POST['department'];
$deadline=$_POST['deadline'];
$description=$_POST['description'];
$requirements=$_POST['requirements'];
$status=$_POST['status'];

$image=$_POST['old_image'];

if(!empty($_FILES['image']['name'])){

$ext=strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));
$image=time().rand(100,999).".".$ext;

move_uploaded_file($_FILES['image']['tmp_name'],$uploadDir.$image);

if(!empty($_POST['old_image'])){
$old=$uploadDir.$_POST['old_image'];
if(file_exists($old)){ unlink($old); }
}

}

$stmt=$pdo->prepare("UPDATE jobs SET title=?,type=?,location=?,salary_min=?,salary_max=?,department=?,deadline=?,description=?,requirements=?,image=?,status=? WHERE id=?");

$stmt->execute([$title,$type,$location,$salary_min,$salary_max,$department,$deadline,$description,$requirements,$image,$status,$id]);

header("Location: job.php");
exit();
}

### DELETE JOB
if(isset($_GET['delete_job'])){

$id=$_GET['delete_job'];

$stmt=$pdo->prepare("SELECT image FROM jobs WHERE id=?");
$stmt->execute([$id]);
$row=$stmt->fetch();

if(!empty($row['image'])){
$file="../upload/".$row['image'];
if(file_exists($file)){ unlink($file); }
}

$stmt=$pdo->prepare("DELETE FROM jobs WHERE id=?");
$stmt->execute([$id]);

header("Location: job.php");
exit();
}


/* ADD INTERNSHIP */

if(isset($_POST['add_internship'])){

    $title       = $_POST['title'];
    $department  = $_POST['department'];
    $duration    = $_POST['duration'];
    $stipend     = $_POST['stipend'];
    $location    = $_POST['location'];
    $deadline    = $_POST['deadline'];
    $openings    = $_POST['openings'];
    $description = $_POST['description'];
    $requirements= $_POST['requirements'];
    $status      = $_POST['status'];

    // ✅ SEO FIELDS
    $slug = !empty($_POST['slug']) 
        ? $_POST['slug'] 
        : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

    $meta_title       = $_POST['meta_title'];
    $meta_keywords    = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $stmt = $pdo->prepare("INSERT INTO internships
    (title, department, duration, stipend, location, deadline, openings, description, requirements, status, slug, meta_title, meta_keywords, meta_description)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->execute([
        $title,
        $department,
        $duration,
        $stipend,
        $location,
        $deadline,
        $openings,
        $description,
        $requirements,
        $status,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description
    ]);

    header("Location: internship.php");
    exit();
}

/* UPDATE INTERNSHIP */
if(isset($_POST['update_internship'])){

    $id = $_POST['id'];

    $title       = $_POST['title'];
    $department  = $_POST['department'];
    $duration    = $_POST['duration'];
    $stipend     = $_POST['stipend'];
    $location    = $_POST['location'];
    $deadline    = $_POST['deadline'];
    $openings    = $_POST['openings'];
    $description = $_POST['description'];
    $requirements= $_POST['requirements'];
    $status      = $_POST['status'];

    // ✅ SEO FIELDS
    $slug = !empty($_POST['slug']) 
        ? $_POST['slug'] 
        : strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));

    $meta_title       = $_POST['meta_title'];
    $meta_keywords    = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_description'];

    $stmt = $pdo->prepare("UPDATE internships SET
        title=?,
        department=?,
        duration=?,
        stipend=?,
        location=?,
        deadline=?,
        openings=?,
        description=?,
        requirements=?,
        status=?,
        slug=?,
        meta_title=?,
        meta_keywords=?,
        meta_description=?
        WHERE id=?");

    $stmt->execute([
        $title,
        $department,
        $duration,
        $stipend,
        $location,
        $deadline,
        $openings,
        $description,
        $requirements,
        $status,
        $slug,
        $meta_title,
        $meta_keywords,
        $meta_description,
        $id
    ]);

    header("Location: internship.php");
    exit();
}

/* DELETE INTERNSHIP */

if(isset($_GET['action']) && $_GET['action'] == 'delete_internship'){

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM internships WHERE id=?");
$stmt->execute([$id]);

header("Location: internships.php");
exit();

}





/* INSERT CONTACT DATA */
if(isset($_POST['submit_contact'])){

$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

/* INSERT CONTACT DATA */

$stmt = $pdo->prepare("INSERT INTO contact(name,email,phone,subject,message)
VALUES (?,?,?,?,?)");

$stmt->execute([$name,$email,$phone,$subject,$message]);

/* INSERT ACTIVITY LOG */

$pdo->prepare("INSERT INTO activity_logs(action,module,user,status)
VALUES ('New contact message','Messages','System','Unread')")->execute();

/* REDIRECT AFTER SUCCESS */

header("Location: contact.php?success=1");
exit();

}

/* DELETE CONTACT MESSAGE */

if(isset($_GET['action']) && $_GET['action'] == 'delete_message'){

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM contact WHERE id=?");
$stmt->execute([$id]);

header("Location: contact.php");
exit();

}

include 'connection/config.php';

/* ADD FAQ */

if(isset($_POST['add_faq'])){

$question = $_POST['question'];
$answer = $_POST['answer'];

$stmt = $pdo->prepare("INSERT INTO faq(question,answer) VALUES(?,?)");
$stmt->execute([$question,$answer]);

header("Location: faq.php");
exit;

}


/* UPDATE FAQ */

if(isset($_POST['update_faq'])){

$id = $_POST['id'];
$question = $_POST['question'];
$answer = $_POST['answer'];

$stmt = $pdo->prepare("UPDATE faq SET question=?, answer=? WHERE id=?");
$stmt->execute([$question,$answer,$id]);

header("Location: faq.php");
exit;

}


/* DELETE FAQ */

if(isset($_GET['delete_faq'])){

$id = $_GET['delete_faq'];

$stmt = $pdo->prepare("DELETE FROM faq WHERE id=?");
$stmt->execute([$id]);

header("Location: faq.php");
exit;

}












/* ================= ADD PACKAGE ================= */
if (isset($_POST['add_package'])) {

    $package_name = trim($_POST['package_name']);

    if (!empty($package_name)) {

        $stmt = $pdo->prepare("INSERT INTO packages (package_name) VALUES (?)");
        $stmt->execute([$package_name]);

        header("Location: package.php?success=added");
        exit();
    }
}


/* ================= UPDATE PACKAGE ================= */
if (isset($_POST['update_package'])) {

    $id = $_POST['id'];
    $package_name = trim($_POST['package_name']);

    if (!empty($package_name)) {

        $stmt = $pdo->prepare("UPDATE packages SET package_name=? WHERE id=?");
        $stmt->execute([$package_name, $id]);

        header("Location: package.php?success=updated");
        exit();
    }
}


/* ================= DELETE PACKAGE ================= */
if (isset($_GET['delete_package'])) {

    $id = $_GET['delete_package'];

    $stmt = $pdo->prepare("DELETE FROM packages WHERE id=?");
    $stmt->execute([$id]);

    header("Location: package.php?success=deleted");
    exit();
}



if (isset($_POST['add_package_type'])) {

    $pack_id  = $_POST['pack_id'];
    $type     = $_POST['pack_type'];
    $price    = $_POST['price'];

    $stmt = $pdo->prepare("INSERT INTO package_type (pack_id, pack_type, price) VALUES (?, ?, ?)");
    $stmt->execute([$pack_id, $type, $price]);

    header("Location: add_package_type.php?pack_id=" . $pack_id);
    exit;
}

if (isset($_POST['update_package_type'])) {

    $id       = $_POST['id'];
    $pack_id  = $_POST['pack_id'];
    $type     = $_POST['pack_type'];
    $price    = $_POST['price'];

    $stmt = $pdo->prepare("UPDATE package_type SET pack_type=?, price=? WHERE id=?");
    $stmt->execute([$type, $price, $id]);

    header("Location: add_package_type.php?pack_id=" . $pack_id);
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'delete_package_type') {

    $id = $_GET['id'];
    $pack_id = $_GET['pack_id'];

    $stmt = $pdo->prepare("DELETE FROM package_type WHERE id=?");
    $stmt->execute([$id]);

    header("Location: add_package_type.php?pack_id=" . $pack_id);
    exit;
}



if(isset($_POST['add_ideal'])){

$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$ideal_for = $_POST['ideal_for'];
$value = $_POST['ideal_value'];

$stmt = $pdo->prepare("INSERT INTO ideal_for (pack_id, pack_type_id, ideal_for, ideal_value) VALUES (?,?,?,?)");
$stmt->execute([$pack_id,$type_id,$ideal_for,$value]);

header("Location: add_idealfor.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_POST['update_ideal'])){

$id = $_POST['id'];
$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$ideal_for = $_POST['ideal_for'];
$value = $_POST['ideal_value'];

$stmt = $pdo->prepare("UPDATE ideal_for SET ideal_for=?, ideal_value=? WHERE id=?");
$stmt->execute([$ideal_for,$value,$id]);

header("Location: add_idealfor.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_GET['action']) && $_GET['action']=='delete_ideal'){

$id = $_GET['id'];
$pack_id = $_GET['pack_id'];
$type_id = $_GET['pack_type_id'];

$stmt = $pdo->prepare("DELETE FROM ideal_for WHERE id=?");
$stmt->execute([$id]);

header("Location: add_idealfor.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_POST['add_feature'])){

$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$feature = $_POST['feature'];

$stmt = $pdo->prepare("INSERT INTO features (pack_id, pack_type_id, features) VALUES (?,?,?)");
$stmt->execute([$pack_id,$type_id,$feature]);

header("Location: add_features.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_POST['update_feature'])){

$id = $_POST['id'];
$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$feature = $_POST['feature'];

$stmt = $pdo->prepare("UPDATE features SET features=? WHERE id=?");
$stmt->execute([$feature,$id]);

header("Location: add_features.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}
if(isset($_GET['action']) && $_GET['action']=='delete_feature'){

$id = $_GET['id'];
$pack_id = $_GET['pack_id'];
$type_id = $_GET['pack_type_id'];

$stmt = $pdo->prepare("DELETE FROM features WHERE id=?");
$stmt->execute([$id]);

header("Location: add_features.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_POST['add_addon'])){

$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$addon = $_POST['addon'];

$stmt = $pdo->prepare("INSERT INTO addons (pack_id, pack_type_id, addons) VALUES (?,?,?)");
$stmt->execute([$pack_id,$type_id,$addon]);

header("Location: add_addons.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_POST['update_addon'])){

$id = $_POST['id'];
$pack_id = $_POST['pack_id'];
$type_id = $_POST['pack_type_id'];
$addon = $_POST['addon'];

$stmt = $pdo->prepare("UPDATE addons SET addons=? WHERE id=?");
$stmt->execute([$addon,$id]);

header("Location: add_addons.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

if(isset($_GET['action']) && $_GET['action']=='delete_addon'){

$id = $_GET['id'];
$pack_id = $_GET['pack_id'];
$type_id = $_GET['pack_type_id'];

$stmt = $pdo->prepare("DELETE FROM addons WHERE id=?");
$stmt->execute([$id]);

header("Location: add_addons.php?pack_id=$pack_id&pack_type_id=$type_id");
exit;
}

/* ADD */
if(isset($_POST['add_dynamic'])){

$table = $_POST['table'];
$pack = $_POST['pack_id'];
$type = $_POST['pack_type_id'];
$value = $_POST['value'];
$status = $_POST['status'];

$stmt = $pdo->prepare("INSERT INTO $table (pack_id,pack_type_id,value,status) VALUES (?,?,?,?)");
$stmt->execute([$pack,$type,$value,$status]);

header("Location: add_$table.php?pack_id=$pack&pack_type_id=$type");
exit;
}

/* UPDATE */
if(isset($_POST['update_dynamic'])){

$table = $_POST['table'];
$id = $_POST['id'];
$pack = $_POST['pack_id'];
$type = $_POST['pack_type_id'];
$value = $_POST['value'];
$status = $_POST['status'];

$stmt = $pdo->prepare("UPDATE $table SET value=?, status=? WHERE id=?");
$stmt->execute([$value,$status,$id]);

header("Location: add_$table.php?pack_id=$pack&pack_type_id=$type");
exit;
}

/* DELETE */
if(isset($_GET['action']) && $_GET['action']=="delete_dynamic"){

$table = $_GET['table'];
$id = $_GET['id'];
$pack = $_GET['pack_id'];
$type = $_GET['pack_type_id'];

$stmt = $pdo->prepare("DELETE FROM $table WHERE id=?");
$stmt->execute([$id]);

header("Location: add_$table.php?pack_id=$pack&pack_type_id=$type");
exit;
}