<?php
session_start();
$conn = mysqli_connect("localhost","root","","collegeproject",3307);

if(!isset($_SESSION['email'])){
    header("location:login.php");
    exit();
}

$email = $_SESSION['email'];


$sql = "SELECT * FROM admission WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'] ?? 'Not Available';
$dob = $row['dob'] ?? 'Not Available';
$gender = $row['gender'] ?? 'Not Available';
$aadhaar = $row['aadhaar_number'] ?? 'Not Available';

$father = $row['father_name'] ?? 'Not Available';
$mother = $row['mother_name'] ?? 'Not Available';

$email = $row['email'] ?? 'Not Available';
$phone = $row['phone_no'] ?? 'Not Available';
$address = $row['address'] ?? 'Not Available';

$school = $row['school'] ?? 'Not Available';
$percentage = $row['percentage'] ?? 'Not Available';
$course = $row['course'] ?? 'Not Available';
$year = $row['year'] ?? 'Not Available';

$name = $_SESSION['name'] ?? "Student";
$photo = $row['photo'] ?? "default.png";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="student_details.css">
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
    <a href="studenthome.php" class="active-link">
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

<div class="content" id="content">
  <div class="profile-page">

    <div class="profile-card">

        <h2><i class="fa fa-id-card"></i> Student Full Admission Details</h2>

        <!-- PERSONAL -->
        <h4>Personal Details</h4>

        <div class="profile-row"><span>Name</span><span><?php echo $name; ?></span></div>
        <div class="profile-row"><span>DOB</span><span><?php echo $dob; ?></span></div>
        <div class="profile-row"><span>Gender</span><span><?php echo $gender; ?></span></div>
        <div class="profile-row"><span>Aadhaar</span><span><?php echo $aadhaar; ?></span></div>

        <hr>

        <!-- FAMILY -->
        <h4>Family Details</h4>

        <div class="profile-row"><span>Father Name</span><span><?php echo $father; ?></span></div>
        <div class="profile-row"><span>Mother Name</span><span><?php echo $mother; ?></span></div>

        <hr>

        <!-- CONTACT -->
        <h4>Contact Details</h4>

        <div class="profile-row"><span>Email</span><span><?php echo $email; ?></span></div>
        <div class="profile-row"><span>Phone</span><span><?php echo $phone; ?></span></div>
        <div class="profile-row"><span>Address</span><span><?php echo $address; ?></span></div>

        <hr>

        <!-- ACADEMIC -->
        <h4>Academic Details</h4>

        <div class="profile-row"><span>School</span><span><?php echo $school; ?></span></div>
        <div class="profile-row"><span>Percentage</span><span><?php echo $percentage; ?></span></div>
        <div class="profile-row"><span>Course</span><span><?php echo $course; ?></span></div>
        <div class="profile-row"><span>Year</span><span><?php echo $year; ?></span></div>

    </div>

</div>
</div>
<!-- JS -->
<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("active");

    let content = document.getElementById("content");
    if(content){
        content.classList.toggle("active");
    }
}

document.addEventListener("click", function(e) {
    let sidebar = document.getElementById("sidebar");
    let menuBtn = document.querySelector(".menu-btn");

    if(!sidebar || !menuBtn) return;

    if (!sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
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