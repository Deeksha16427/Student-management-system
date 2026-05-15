<?php

$conn = mysqli_connect("localhost","root","","collegeproject",3307);

$id = (int) $_GET['id'];

/* FETCH TEACHER DETAILS */

$query = "SELECT * FROM teacher WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Teacher Details</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="teacher_details.css">
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

    <h2 class="page-title">Teacher Full Details</h2>

    <div class="details-card">

        <!-- PHOTO -->

        <div class="teacher-photo">

            <img src="uploads/<?php echo $row['photo']; ?>">

        </div>

        <!-- DETAILS -->

        <div class="detail-box">

            <div class="detail-label">Teacher ID</div>

            <div class="detail-value">
                <?php echo $row['id']; ?>
            </div>

        </div>

        <div class="detail-box">

            <div class="detail-label">Teacher Name</div>

            <div class="detail-value">
                <?php echo $row['name']; ?>
            </div>

        </div>

        <div class="detail-box">

            <div class="detail-label">Teacher Email</div>

            <div class="detail-value">
                <?php echo $row['email']; ?>
            </div>

        </div>

        <div class="detail-box">

            <div class="detail-label">Subject</div>

            <div class="detail-value">
                <?php echo $row['subject']; ?>
            </div>

        </div>

        <div class="detail-box">

            <div class="detail-label">Phone Number</div>

            <div class="detail-value">
                <?php echo $row['phone']; ?>
            </div>

        </div>

        <!-- BACK BUTTON -->

        <a href="view_teacher.php" class="back-btn">
            ← Back
        </a>

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