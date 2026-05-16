<?php

require_once 'db.php';

$id = (int) $_GET['id'];

/* FETCH OLD TEACHER DATA */

$query = "SELECT * FROM teacher WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

/* UPDATE TEACHER */

if(isset($_POST['update_teacher']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];

    /* OLD PHOTO */

    $photo_name = $row['photo'];

    /* NEW PHOTO */

    if(!empty($_FILES['photo']['name']))
    {
        $photo_name = time().$_FILES['photo']['name'];

        $tmp = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmp,"uploads/".$photo_name);
    }

    /* UPDATE QUERY */

    $update = "UPDATE teacher SET

    name='$name',
    email='$email',
    subject='$subject',
    phone='$phone',
    photo='$photo_name'

    WHERE id=$id";

    mysqli_query($conn,$update);

    header("location:edit_teacher.php?id=$id&msg=updated");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Teacher</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="add_teacher.css">

</head>

<body>

<!-- NAVBAR -->

<div class="navbar">

    <span class="menu-btn" onclick="toggleMenu()">☰</span>

    <h4 class="title">Admin Dashboard</h4>

</div>

<!-- SIDEBAR -->

<div class="sidebar" id="sidebar">

    <div class="logo-box">

        <img src="public/images/logo.png">

        <div class="logo-text">
            <h6>Student Portal</h6>
            <p>Admin Panel</p>
        </div>

    </div>

    <a href="adminhome.php" class="active-link">
        <i class="fa fa-home"></i> Dashboard
    </a>

    <p class="menu-title">STUDENT</p>

    <a href="addstudent.php">
        <i class="fa fa-user-plus"></i> Add Student
    </a>

    <a href="view_student.php">
        <i class="fa fa-users"></i> View Students
    </a>

    <p class="menu-title">TEACHER</p>

    <a href="add_teacher.php">
        <i class="fa fa-user-plus"></i> Add Teacher
    </a>

    <a href="view_teacher.php">
        <i class="fa fa-users"></i> View Teachers
    </a>
    <p class="menu-title">COURSES</p>

     <a href="add_course.php"><i class="fa fa-book"></i>&nbsp; Add Course</a>
    <a href="view_courses.php"><i class="fa fa-book"></i>&nbsp; View Courses</a>

    <hr>

    <a href="logout.php" class="logout">
        <i class="fa fa-sign-out"></i> Logout
    </a>


</div>

<!-- CONTENT -->

<div id="content">

<h2 class="form-title">Update Teacher Details</h2>

<div class="form-container">

<?php

if(isset($_GET['msg']) && $_GET['msg']=="updated")
{
    echo "<div id='success-message' class='success-msg'>
    Teacher Updated Successfully!
    </div>";
}

?>

<form method="POST" enctype="multipart/form-data">

<h5 class="section-title">Teacher Information</h5>

<div class="teacher-form">

    <!-- NAME -->

    <label class="form-label">Teacher Name</label>

    <input type="text"
    name="name"
    class="form-control mb-3"

    value="<?php echo $row['name']; ?>"

    required>

    <!-- EMAIL -->

    <label class="form-label">Teacher Email</label>

    <input type="email"
    name="email"
    class="form-control mb-3"

    value="<?php echo $row['email']; ?>"

    required>

    <!-- SUBJECT -->

    <label class="form-label">Subject</label>

    <input type="text"
    name="subject"
    class="form-control mb-3"

    value="<?php echo $row['subject']; ?>"

    required>

    <!-- PHONE -->

    <label class="form-label">Phone Number</label>

    <input type="text"
    name="phone"
    class="form-control mb-3"

    value="<?php echo $row['phone']; ?>"

    required>

    <!-- PHOTO -->

    <label class="form-label">Update Teacher Photo</label>

    <input type="file"
    name="photo"
    class="form-control mb-3">

    <img src="uploads/<?php echo $row['photo']; ?>"
    width="100"
    style="border-radius:10px; margin-bottom:20px;">

    <!-- BUTTON -->

    <button type="submit"
    name="update_teacher"
    class="submit-btn">

    Update Teacher

    </button>

</div>

</form>

</div>

</div>

<!-- JAVASCRIPT -->

<script>

function toggleMenu(){

    document.getElementById("sidebar")
    .classList.toggle("active");

    document.getElementById("content")
    .classList.toggle("active");
}

document.addEventListener("click", function(e){

    let sidebar =
    document.getElementById("sidebar");

    let menuBtn =
    document.querySelector(".menu-btn");

    if(!sidebar.contains(e.target)
    && !menuBtn.contains(e.target))
    {
        sidebar.classList.remove("active");

        document.getElementById("content")
        .classList.remove("active");
    }

});

/* SUCCESS MESSAGE HIDE */

setTimeout(function(){

    let msg = document.getElementById("success-message");

    if(msg){
        msg.style.display = "none";
    }

},3000);

</script>

</body>
</html>