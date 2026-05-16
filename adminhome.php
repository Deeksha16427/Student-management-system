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

// TOTAL STUDENTS COUNT
$sql = "SELECT COUNT(*) as total FROM admission";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_students = $row['total'];

// TOTAL TEACHERS COUNT
$sql2 = "SELECT COUNT(*) as total FROM teacher";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$total_teachers = $row2['total'];

//TOTAL COURSES COUNT
$sql3 = "SELECT COUNT(*) as total FROM course";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);
$total_courses = $row3['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin.css">
</head>
<body>
      <!-- Navbar -->
    <div class="navbar">
        <span class="menu-btn" onclick="toggleMenu()">☰</span>
        <h4 class="title">Admin Dashboard</h4>
    </div>

    
        <!-- sidebar -->
    <div class="sidebar" id="sidebar">
     
    <div class="panel">
    <div class="logo-box">
        <img src="public/images/logo.png">
        <div class="logo-text">
            <h6>Student Portal</h6>
            <p>Admin Panel</p>
        </div>
    </div>
</div>

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

    <!-- Main content -->
     <div class="content" id="content">
<div class="row justify-content-center mt-4">
    <div class="col-md-6">

        <div class="welcome-box">
            <h3>Welcome back, Admin! 👋</h3>
            <p>Here’s what’s happening in your dashboard.</p>
        </div>

    </div>
</div>

    <!-- Stats -->
    <div class="row justify-content-center g-4 mt-3 px-5">

        <div class="col-md-3 d-flex justify-content-center">
            <div class="card-box blue w-100">
                <h4><i class="fa fa-users icon-student" aria-hidden="true"></i><?php echo $total_students; ?></h4>
                <p>Total Students</p>
            </div>
        </div>

        <div class="col-md-3 d-flex justify-content-center">
            <div class="card-box green w-100">
                <h4><i class="fa fa-user-plus icon-teacher"></i><?php echo $total_teachers; ?></h4>
                <p>Total Teachers</p>
            </div>
        </div>

        <div class="col-md-3 d-flex justify-content-center">
            <div class="card-box orange w-100">
                <h4><i class="fa fa-book icon-course" aria-hidden="true"></i><?php echo $total_courses; ?></h4>
                <p>Total Courses</p>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
   <div class="mt-5">
    <h4 class="mb-4 text-center">Quick Actions</h4>

    <div class="row justify-content-center g-3 px-5 mt-3 action-wrapper">

        <div class="col-md-2 d-flex justify-content-center">
           
         <a href="addstudent.php" class="action-card blue" style="text-decoration: none;">
                <i class="fa fa-user-plus student"></i>
                <p>Add Student</p>
        </a>
        </div>

        <div class="col-md-2 d-flex justify-content-center">
            <a href="add_teacher.php" class="action-card green" style="text-decoration: none;">
                <i class="fa fa-user-plus teacher"></i>
                <p>Add Teacher</p>
            </a>
        </div>

        <div class="col-md-2 d-flex justify-content-center">
            <a href="add_course.php" class="action-card orange" style="text-decoration: none;">
                <i class="fa fa-book course"></i>
                <p>Add Course</p>
            </a>
        </div>

        <div class="col-md-2 d-flex justify-content-center">
            <a href="view_student.php" class="action-card pink" style="text-decoration: none;">
                <i class="fa fa-users view"></i>
                <p>View Students</p>
            </a>
        </div>

    </div>
</div>

</div>

<script>
function toggleMenu() {

    document.getElementById("sidebar").classList.toggle("active");

    /* MOBILE par content move nahi hoga */
    if(window.innerWidth > 768){
        document.getElementById("content").classList.toggle("active");
    }
}

/* outside click par sidebar close */
document.addEventListener("click", function(e){

    let sidebar = document.getElementById("sidebar");
    let menuBtn = document.querySelector(".menu-btn");

    if(
        !sidebar.contains(e.target) &&
        !menuBtn.contains(e.target)
    ){
        sidebar.classList.remove("active");
        document.getElementById("content").classList.remove("active");
    }

});

/* screen resize fix */
window.addEventListener("resize", function(){

    if(window.innerWidth <= 768){
        document.getElementById("content").classList.remove("active");
    }

});
</script>
</body>
</html>