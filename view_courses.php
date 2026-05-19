<?php

require_once 'db.php';

$sql="SELECT * FROM course";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
     <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="view_courses.css">

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

<div class="container">

    <h1>All Courses</h1>

    <table>

        <tr>

            <th>ID</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Duration</th>
            <th>Fee</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

<?php

while($info=$result->fetch_assoc())
{

?>

<tr>

    <td>
        <?php echo "{$info['id']}"; ?>
    </td>

    <td>
        <?php echo "{$info['course_name']}"; ?>
    </td>

    <td>
        <?php echo "{$info['course_code']}"; ?>
    </td>

    <td>
        <?php echo "{$info['duration']}"; ?>
    </td>

    <td>
        ₹<?php echo number_format($info['fees'],2); ?>/year
    </td>

    <td>
        <?php echo "{$info['description']}"; ?>
    </td>

    <td>

        <a class="edit-btn"
        href="edit_course.php?id=<?php echo $info['id']; ?>">
        Edit
        </a>

    </td>

    <td>

        <a class="delete-btn"
        onclick="return confirm('Are you sure to delete this course?');"
        href="delete_course.php?id=<?php echo $info['id']; ?>">
        Delete
        </a>

    </td>

</tr>

<?php

}

?>

    </table>

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