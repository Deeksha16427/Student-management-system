<?php
session_start();

if(!isset($_SESSION['email']))
{
    header("location:login.php");
    exit();
}
elseif(isset($_SESSION['usertype']) && $_SESSION['usertype']=='student')
{
    header("location:login.php");
    exit();
}
// DATABASE CONNECTION
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission by Admin</title>
     <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin_admission.css">
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
<!-- Admission form -->
<div id="content">
<div class="form-container">

    <h2 class="form-title">Student Admission Form</h2>

    <form action="admission_process.php" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="added_by" value="admin">

        <!-- PERSONAL DETAILS -->
        <h5 class="section-title">Personal Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>
            </div>
            <div class="col-md-6">
                <input type="date" name="dob" class="form-control mb-3" placeholder="dob" required>
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="gender" required>
                    <option>Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" name="aadhaar" class="form-control mb-3" placeholder="Aadhaar Number">
            </div>
        </div>

        <!-- FAMILY DETAILS -->
        <h5 class="section-title">Family Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="father" class="form-control mb-3" placeholder="Father Name">
            </div>
            <div class="col-md-6">
                <input type="text" name="mother" class="form-control mb-3" placeholder="Mother Name">
            </div>
        </div>

        <!-- CONTACT DETAILS -->
        <h5 class="section-title">Contact Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" class="form-control mb-3" placeholder="Phone Number" required>
            </div>
            <div class="col-12">
                <textarea class="form-control mb-3" name="address" placeholder="Full Address"></textarea>
            </div>
        </div>

        <!-- ACADEMIC DETAILS -->
        <h5 class="section-title">Academic Details</h5>
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="school" class="form-control mb-3" placeholder="Last School/College">
            </div>
            <div class="col-md-6">
                <input type="text" name="percentage" class="form-control mb-3" placeholder="Percentage / CGPA">
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="course" required>
                    <option>Select Course</option>
                    <option>BCA</option>
                    <option>BBA</option>
                    <option>B.Tech</option>
                    <option>MCA</option>
                    <option>Bcom</option>
                    <option>MBA</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control mb-3" name="year" required>
                    <option>Year</option>
                    <option>1st Year</option>
                    <option>2nd Year</option>
                    <option>3rd Year</option>
                    <option>4th Year</option>
                </select>
            </div>
        </div>

        <!-- DOCUMENT UPLOAD -->
        <h5 class="section-title">Documents</h5>
        <input type="file" name="photo" class="form-control mb-3" accept="image/*">

        <!-- SUBMIT -->
        <button type="submit" class="submit-btn btn-center">Submit</button>

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