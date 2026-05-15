<?php
$conn = mysqli_connect("localhost","root","","collegeproject",3307);

$id = (int) $_GET['id'];

$query = "DELETE FROM admission WHERE id=$id";

if(mysqli_query($conn,$query)){
    header("location:view_student.php?msg=deleted");
    exit();
} else {
    echo "Delete failed!";
}
?>