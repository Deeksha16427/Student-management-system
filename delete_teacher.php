<?php

include('config.php');

/* GET ID */

$id = (int) $_GET['id'];

/* FETCH PHOTO FIRST */

$query = "SELECT * FROM teacher WHERE id=$id";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);

/* DELETE PHOTO FROM FOLDER */

if(!empty($row['photo']))
{
    unlink("uploads/".$row['photo']);
}

/* DELETE TEACHER */

$delete = "DELETE FROM teacher WHERE id=$id";

mysqli_query($conn,$delete);

/* REDIRECT */

header("location:view_teacher.php?msg=deleted");

?>