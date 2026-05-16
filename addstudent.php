<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("location:login.php");
    exit();
}
elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");
    exit();
}
// DATABASE CONNECTION
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="addstudent.css">
</head>
<body>
     <!-- Navbar -->
    <div class="navbar">
        <span class="menu-btn" onclick="toggleMenu()">☰</span>
        <h4 class="title">Admin Dashboard</h4>
    </div>
    <!-- sidebar -->
    <div class="sidebar" id="sidebar">
     
    <!-- <div class="panel"> -->
    <div class="logo-box">
        <img src="public/images/logo.png">
        <div class="logo-text">
            <h6>Student Portal</h6>
            <p>Admin Panel</p>
        </div>
    </div>
<!-- </div> -->

    <a href="adminhome.php" class="active-link"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;  Dashboard</a>
    <p class="menu-title">STUDENT</p>
    <a href="addstudent.php"><i class="fa fa-user-plus"></i>&nbsp; Add Student</a>
    <a href="view_student.php"><i class="fa fa-users"></i>&nbsp; View Students</a>
    <p class="menu-title">TEACHER</p>
    <a href="add_teacher.php"><i class="fa fa-user-plus"></i>&nbsp; Add Teacher</a>
    <a href="view_teacher.php"><i class="fa fa-users"></i>&nbsp; View Teachers</a>
    <p class="menu-title">COURSES</p>
    <a href="add_course.php"><i class="fa fa-book"></i>&nbsp; Add Course</a>
    <a href="view_courses.php"><i class="fa fa-book"></i>&nbsp; View Courses</a>

     <hr>

    <a href="logout.php" class="logout"><i class="fa fa-sign-out"></i> Logout</a>
</div>
 
<div id="content">
    <div class="container mt-4">

        <div class="card shadow p-4" style="border-radius:15px;">
            
            <h3 class="text-center mb-4" style="color:#164b7d;">
                <i class="fa fa-user-plus"></i> Add Student
            </h3>

            <!-- STEP BOX -->
            <div style="background:#e7f1ff; padding:20px; border-radius:10px;">

                <h5 style="color:#164b7d;"> How to Add a Student ?</h5>
                <p>To successfully add a student, please follow the steps below:</p>

                

                <!-- STEP 1 -->
                <h6 style="color:#0d6efd;">🔹 Step 1: Student Registration</h6>
                <p>
                    Start by completing the registration process.
                  This step creates the student’s account and ensures their basic information is securely saved.
                  After this step, the student will be able to access the system using their login details.
                </p>

                <!-- BUTTON -->
                <a href="admin_register.php" class="btn btn-primary mb-3">
                    Go to Registration Form
                </a>

            
                <!-- STEP 2 -->
                <h6 style="color:#0d6efd;">🔹 Step 2: Student Admission</h6>
                <p>
                    After registration, fill the Admission Form to complete student details 
                    like personal, family, and academic information.
                </p>

                <!-- BUTTON -->
                <a href="admin_admission.php" class="btn btn-success">
                    Go to Admission Form
                </a>

        
                <p class="text-muted">
                    Both steps are required to complete the student profile.
                </p>

            </div>

        </div>

    </div>
</div>




<!-- javascript -->
<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");

    let content = document.getElementById("content");
    if(content){
        content.classList.toggle("active");
    }
}

document.addEventListener("click", function(e){
    let sidebar = document.getElementById("sidebar");
    let menuBtn = document.querySelector(".menu-btn");

    if(!sidebar.contains(e.target) && !menuBtn.contains(e.target)){
        sidebar.classList.remove("active");

        let content = document.getElementById("content");
        if(content){
            content.classList.remove("active");
        }
    }
});
</script>
</body>
</html>