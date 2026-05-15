<?php
session_start();
error_reporting(0);
$conn = mysqli_connect("localhost","root","","collegeproject",3307);

if(!isset($_SESSION['email']))
{
    header("location:login.php");
     exit();
}
elseif($_SESSION['usertype']=='admin')
{
    header("location:login.php");
     exit();
} 
$email = $_SESSION['email'];
$name = $_SESSION['name'] ?? "Student";

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$photo = $row['photo'] ?? "default.png";
$phone = $row['phone'] ?? "Not Available";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="student.css">
</head>
<body>
<!-- NAVBAR -->
<div class="navbar">
    <span class="menu-btn" onclick="toggleMenu()">☰</span>
    <h4 class="title">Student Dashboard</h4>
</div>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">

    <!-- LOGO -->
    <div class="logo-box">
        <img src="public/images/logo.png">
        <div class="logo-text">
            <h6>Student Portal</h6>
            <p>Student Panel</p>
        </div>
    </div>

    <!-- PROFILE -->
   <div class="profile">

    <form action="upload_img.php" method="POST" enctype="multipart/form-data">

        <!-- IMAGE -->
        <label for="fileUpload">
            <img src="uploads/<?php echo $photo; ?>" class="profile-img">
            
            <!-- small icon -->
            <span class="edit-icon">+</span>
        </label>

        <!-- hidden input -->
        <input type="file" name="photo" id="fileUpload" onchange="this.form.submit()" hidden>

    </form>

    <h5 style="font-size:20px; margin-top:4px;"><?php echo $name; ?></h5>

</div>
    <!-- MENU -->
    <a href="#" class="active-link">
        <i class="fa fa-home"></i>&nbsp; Dashboard
    </a>

    <a href="admission.php">
        <i class="fa fa-file-text"></i>&nbsp; Admission Form
    </a>

    <a href="Student_details.php">
        <i class="fa fa-folder"></i>&nbsp; Student Details
    </a>

    <hr>

    <a href="logout.php" class="logout">
        <i class="fa fa-sign-out"></i> Logout
    </a>

</div>

<!-- CONTENT -->
<div class="content" id="content">

    <!-- WELCOME -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="welcome-box">
                <h3>Welcome back, <?php echo $name; ?> 👋</h3>
                <p>Your dashboard is ready.</p>
            </div>
        </div>
    </div>


    <!-- MAIN CONTENT -->
<div class="main-content">

    <!-- CARD -->
    <div class="info-card">

        <h3><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Student Details</h3>

        <div class="info-row">
            <div class="label">Name</div>
            <div class="value"><?php echo $name; ?></div>
        </div>

        <div class="info-row">
            <div class="label">Email</div>
            <div class="value"><?php echo $email; ?></div>
        </div>

        <div class="info-row">
            <div class="label">Phone</div>
            <div class="value"><?php echo $phone; ?></div>
        </div>

        <!-- BUTTON -->
        <a href="Student_details.php" class="view-btn">
            View Full Profile
        </a>

    </div>

</div>

</div>

<!-- JS -->
<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");
    if(window.innerWidth > 768){
    document.getElementById("content").classList.toggle("active");
}
}
document.addEventListener("click", function(e) {
    let sidebar = document.getElementById("sidebar");
    let menuBtn = document.querySelector(".menu-btn");
    let content = document.getElementById("content");
    if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
        sidebar.classList.remove("active");
        if(window.innerWidth > 768){
        document.getElementById("content").classList.remove("active");
    }
    }
});
</script>

</body>
</html>