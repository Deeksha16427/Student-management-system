<?php
// DB connection
require_once 'db.php';

// Form data receive
$username = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// (optional but recommended) basic security
$name = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$password = mysqli_real_escape_string($conn, $password);

// Insert query
$sql = "INSERT INTO user(username, email, phone, password,usertype)
        VALUES('$username', '$email', '$phone', '$password','student')";

$result = mysqli_query($conn, $sql);

if($result){

    // check admin added student or normal registration
    if(isset($_POST['added_by']) && $_POST['added_by']=="admin")
    {
        echo "<script>
            alert('Student Registered Successfully!');
            window.location.href='addstudent.php';
        </script>";
    }
    else
    {
        echo "<script>
            alert('Registration Successful!');
            window.location.href='login.php';
        </script>";
    }
}
else{
    echo "<script>
        alert('Registration Failed!');
        window.location.href='index.php';
    </script>";
}
?>