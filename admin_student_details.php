<?php

$conn = mysqli_connect("localhost","root","","collegeproject",3307);

$id = (int) $_GET['id'];

/* FETCH OLD DATA */
$query = "SELECT * FROM admission WHERE id=$id";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

/* UPDATE DATA */
if(isset($_POST['update'])){

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $aadhaar = $_POST['aadhaar'];
    $father = $_POST['father'];
    $mother = $_POST['mother'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $school = $_POST['school'];
    $percentage = $_POST['percentage'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $photo_name = $row['photo'];

     
    // agar new photo upload hui hai
    if(!empty($_FILES['photo']['name'])){

        $photo_name = time().$_FILES['photo']['name']; // unique name
        $tmp = $_FILES['photo']['tmp_name'];

        // upload folder me save
        move_uploaded_file($tmp, "uploads/".$photo_name);
    }

    $update = "UPDATE admission SET 
    name='$name',
    dob='$dob',
    gender='$gender',
    aadhaar_number='$aadhaar',
    father_name='$father',
    mother_name='$mother',
    email='$email',
    phone_no='$phone',
    address='$address',
    school='$school',
    percentage='$percentage',
    course='$course',
    year='$year',
    photo='$photo_name'

    WHERE id=$id";

    mysqli_query($conn,$update);

    header("location:view_student.php?msg=updated");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Details</title>
    <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin_student_details.css">
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
     <div class="details-container">

    <h2 class="details-title">Student Details</h2>

    <!-- PHOTO -->
    <div class="student-photo">
        <img src="uploads/<?php echo $row['photo']; ?>" alt="Student Photo">
    </div>

    <!-- DETAILS CARD -->
    <div class="details-card">

        <div class="detail-row">
            <span class="label">Full Name:</span>
            <span><?php echo $row['name']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Date of Birth:</span>
            <span><?php echo $row['dob']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Gender:</span>
            <span><?php echo $row['gender']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Aadhaar Number:</span>
            <span><?php echo $row['aadhaar_number']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Father Name:</span>
            <span><?php echo $row['father_name']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Mother Name:</span>
            <span><?php echo $row['mother_name']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Email:</span>
            <span><?php echo $row['email']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Phone:</span>
            <span><?php echo $row['phone_no']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Address:</span>
            <span><?php echo $row['address']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">School:</span>
            <span><?php echo $row['school']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Percentage:</span>
            <span><?php echo $row['percentage']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Course:</span>
            <span><?php echo $row['course']; ?></span>
        </div>

        <div class="detail-row">
            <span class="label">Year:</span>
            <span><?php echo $row['year']; ?></span>
        </div>

    </div>

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