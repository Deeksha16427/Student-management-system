<?php
include('config.php');

if(isset($_POST['add_teacher']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];

    /* PHOTO UPLOAD */
    $photo_name = "";

    if(!empty($_FILES['photo']['name']))
    {
        $photo_name = time().$_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];

        move_uploaded_file($tmp,"uploads/".$photo_name);
    }

    /* INSERT QUERY */
    $query = "INSERT INTO teacher
    (name,email,subject,phone,photo)
    
    VALUES
    ('$name','$email','$subject','$phone','$photo_name')";

    mysqli_query($conn,$query);

    header("location:add_teacher.php?msg=added");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Teacher</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="public/font-awesome/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="add_teacher.css">

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
    <h2 class="form-title">Add Teacher</h2>

<div class="form-container">

    

    <?php
    if(isset($_GET['msg']) && $_GET['msg']=="added")
    {
        echo "<div id='success-message' class='success-msg'>
        Teacher Added Successfully!
        </div>";
    }
    ?>

    <form method="POST" enctype="multipart/form-data">

        <h5 class="section-title">Teacher Information</h5>

            <div class="teacher-form">
             <label class="form-label">Teacher Name</label>
                <input type="text"
                name="name"
                class="form-control mb-3"
                placeholder="Enter Teacher Name"
                required>
            

             <label class="form-label">Teacher Email</label>
                <input type="email"
                name="email"
                class="form-control mb-3"
                placeholder="Enter Teacher Email"
                required>
           

               <label class="form-label">Subject</label>
                <input type="text"
                name="subject"
                class="form-control mb-3"
                placeholder="Subject"
                required>
           
               <label class="form-label">Phone Number</label>
                <input type="text"
                name="phone"
                class="form-control mb-3"
                placeholder="Phone Number"
                required>
            
                <label class="form-label">Upload Teacher Photo</label>
                <input type="file"
                name="photo"
                class="form-control mb-4">

       

        <button type="submit"
        name="add_teacher"
        class="submit-btn">

        Add Teacher

        </button>
        </div>

    </form>

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
setTimeout(function(){

    let msg = document.getElementById("success-message");

    if(msg){
        msg.style.display = "none";
    }

},3000);

</script>

</body>
</html>