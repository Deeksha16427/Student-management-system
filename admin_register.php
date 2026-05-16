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
    <title>Registration</title>
     <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin_register.css">
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


    <div id="content">
    <div class="center mt-5">
       <h1>Registration Form</h1>
    </div>
    <div class="register_form">
       <form action="register.php" method="post" class="form-box">
        <input type="hidden" name="added_by" value="admin">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Register</button>

    </form>
    </div>
    </div>
    <!-- javascript -->
<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");
    document.getElementById("content").classList.toggle("active");
}
document.addEventListener("click", function(e){
    let sidebar = document.getElementById("sidebar");
    let menuBtn = document.querySelector(".menu-btn");

    if(!sidebar.contains(e.target) && !menuBtn.contains(e.target)){
        sidebar.classList.remove("active");
        document.getElementById("content").classList.remove("active");
    }
});
</script>
</body>
</html>