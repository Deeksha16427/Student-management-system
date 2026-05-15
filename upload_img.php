<?php
session_start();

$conn = mysqli_connect("localhost","root","","collegeproject",3307);

$email = $_SESSION['email'];

// file
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];

// unique name (important!)
$newName = time() . "_" . $photo;

// move file
move_uploaded_file($tmp, "uploads/" . $newName);

// update DB
$sql = "UPDATE user SET photo='$newName' WHERE email='$email'";
mysqli_query($conn, $sql);

// redirect back
header("Location: studenthome.php");
exit();
?>