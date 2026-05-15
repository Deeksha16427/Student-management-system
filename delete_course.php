<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

$conn = mysqli_connect($host, $user, $password, $db, 3307);

// GET ID FROM URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id == 0){
    die("Invalid ID");
}

// DELETE QUERY
$sql = "DELETE FROM course WHERE id = $id";

$result = mysqli_query($conn, $sql);

if($result)
{
    header("location:view_courses.php");
    exit();
}
else
{
    echo "Delete failed: " . mysqli_error($conn);
}

?>