<?php

require_once 'db.php';

/* ADD COURSE */

if(isset($_POST['add_course']))
{
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];
    $description = $_POST['description'];

    if($fees == ""){
       $fees = 0.00;
    }

    /* INSERT QUERY */

    $query = "INSERT INTO course
    (course_name,course_code,duration,fees,description)

    VALUES
    ('$course_name','$course_code','$duration','$fees','$description')";

    mysqli_query($conn,$query);

    header("location:add_course.php?msg=added");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Course</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="add_course.css">

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

<!-- CONTENT -->

<div id="content">

    <h2 class="form-title">Add Course</h2>

    <div class="form-container">

        <?php
        if(isset($_GET['msg']) && $_GET['msg']=="added")
        {
            echo "<div id='success-message' class='success-msg'>
            Course Added Successfully!
            </div>";
        }
        ?>

        <form method="POST">

            <h5 class="section-title">Course Information</h5>

            <div class="course-form">

                <!-- COURSE NAME -->

                <label class="form-label">Course Name</label>

                <input type="text"
                name="course_name"
                class="form-control mb-3"
                placeholder="Enter Course Name"
                required>

                <!-- COURSE CODE -->

                <label class="form-label">Course Code</label>

                <input type="text"
                name="course_code"
                class="form-control mb-3"
                placeholder="Enter Course Code"
                required>

                <!-- DURATION -->

                <label class="form-label">Duration</label>

                <input type="text"
                name="duration"
                class="form-control mb-3"
                placeholder="Example: 3 Years"
                required>

                <!-- FEES -->

                <label class="form-label">Course Fees</label>

                <input type="text"
                name="fees"
                class="form-control mb-3"
                placeholder="Enter Course Fees"
                required>

                <!-- DESCRIPTION -->

                <label class="form-label">Course Description</label>

                <textarea
                name="description"
                class="form-control mb-4"
                rows="4"
                placeholder="Enter Course Description"
                required></textarea>

                <!-- BUTTON -->

                <button type="submit"
                name="add_course"
                class="submit-btn">

                Add Course

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