<?php
session_start();

require_once 'db.php';

$email = $_SESSION['email'];

if(empty($_FILES['photo']['name'])){
    header("Location: studenthome.php");
    exit();
}

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