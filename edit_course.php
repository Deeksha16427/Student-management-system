<?php

require_once 'db.php';

// GET ID FROM URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// FETCH OLD DATA

$sql="SELECT * FROM course WHERE id='$id'";

$result=mysqli_query($conn,$sql);

$info=$result->fetch_assoc();


// UPDATE QUERY

if(isset($_POST['update_course']))
{
    $course_name=$_POST['course_name'];
    $course_code=$_POST['course_code'];
    $duration=$_POST['duration'];
    $fees=$_POST['fees'];
    $description=$_POST['description'];

    $update="UPDATE course SET

    course_name='$course_name',
    course_code='$course_code',
    duration='$duration',
    fees='$fees',
    description='$description'

    WHERE id='$id'
    ";

    $update_result=mysqli_query($conn,$update);

    if($update_result)
    {
        header("location:view_courses.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="edit_course.css">


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

    <a href="add_course.php">
        <i class="fa fa-book"></i> Add Course
    </a>

    <a href="view_courses.php">
        <i class="fa fa-book"></i> View Courses
    </a>

    <hr>

    <a href="logout.php" class="logout">
        <i class="fa fa-sign-out"></i> Logout
    </a>

</div>
<div id="content">

<div class="form-container">

    <h2>Edit Course</h2>

<form action="#" method="POST">

    <label>Course Name</label>

    <input type="text"
    name="course_name"
    value="<?php echo $info['course_name']?? '';?>"
    required>


    <label>Course Code</label>

    <input type="text"
    name="course_code"
    value="<?php echo $info['course_code']?? ''; ?>"
    required>


    <label>Course Duration</label>

    <input type="text"
    name="duration"
    value="<?php echo $info['duration']?? ''; ?>"
    required>


    <label>Course Fee</label>

    <input type="text"
    name="fees"
    value="<?php echo $info['fees']?? ''; ?>"
    required>


    <label>Description</label>

    <textarea
    name="description"
    required><?php echo $info['description']?? ''; ?></textarea>


    <input type="submit"
    class="btn"
    name="update_course"
    value="Update Course">

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
</script>
</body>
</html>