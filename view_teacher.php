<?php
include('config.php');

/* FETCH TEACHERS */

$query = "SELECT * FROM teacher";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Teachers</title>

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->

<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="view_teacher.css">


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

    <h2 class="page-title">Teachers Detail</h2>

    <div class="table-container">

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>

            <?php

            while($row = mysqli_fetch_assoc($result))
            {

            ?>

            <tr>

                <td>
                    <?php echo $row['id']; ?>
                </td>

                <td>
                    <?php echo $row['name']; ?>
                </td>

                <td>
                    <?php echo $row['subject']; ?>
                </td>

                <td>
                    <div class="actions">
                    <!-- VIEW DETAILS -->

                    <a href="teacher_details.php?id=<?php echo $row['id']; ?>"
                    class="action-btn view-btn">
                     View
                    <!-- <i class="fa fa-eye"></i> -->

                    </a>

                    <!-- EDIT -->

                    <a href="edit_teacher.php?id=<?php echo $row['id']; ?>"
                    class="action-btn edit-btn">
                     Edit
                    <!-- <i class="fa fa-pencil"></i> -->

                    </a>

                    <!-- DELETE -->

                    <a href="delete_teacher.php?id=<?php echo $row['id']; ?>"
                    class="action-btn delete-btn"

                    onclick="return confirm('Are you sure you want to delete this teacher?')">
                     Delete
                    <!-- <i class="fa fa-trash"></i> -->

                    </a>
                </div>

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