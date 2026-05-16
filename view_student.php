<?php
require_once 'db.php';

/* SEARCH */
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

$query = "SELECT * FROM admission 
          WHERE name LIKE '%$search%' 
          OR email LIKE '%$search%' 
          OR course LIKE '%$search%'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Students</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="view_student.css">
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
<h2>Student List</h2>

<!-- SEARCH FORM -->
<form method="GET" class="search-box">
    <input type="text" name="search" placeholder="Search student..." value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>

<!-- TABLE -->
 <div class="table-wrapper">
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['course']; ?></td>
        <td>
            <a class="view-btn" href="admin_student_details.php?id=<?php echo $row['id']; ?>">
    View
</a>
            <a class="edit-btn" href="edit_student.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a class="delete-btn" href="delete_student.php?id=<?php echo $row['id']; ?>" 
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>

    <?php } ?>

</table>
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