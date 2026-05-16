<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$host = "localhost";
$user = "root";
$password = "";
$db = "collegeproject";

$conn = mysqli_connect($host, $user, $password, $db, 3307);

if(!$conn){
    
    
    $conn = mysqli_connect($host, $user, $password, $db, 3306);
}

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>