<?php

include('config.php');

// form data lena
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

// file upload
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];

// folder me save
move_uploaded_file($tmp, "uploads/".$photo);

// insert query
$sql = "INSERT INTO admission 
(name, dob, gender, aadhaar_number, father_name, mother_name, email, phone_no, address, school, percentage, course, year, photo)
VALUES 
('$name','$dob','$gender','$aadhaar','$father','$mother','$email','$phone','$address','$school','$percentage','$course','$year','$photo')";

if(mysqli_query($conn, $sql))
{
    // admin filled admission
    if(isset($_POST['added_by']) && $_POST['added_by']=="admin")
    {
        header("Location: adminhome.php?success=1");
    }
    else
    {
        // normal student admission
        header("Location: studenthome.php?success=1");
    }

    exit();
}
else 
    {
    echo "Error";
    }

?>