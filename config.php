
<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

$host = getenv("MYSQLHOST") ?: "localhost";
$user = getenv("MYSQLUSER") ?: "root";
$password = getenv("MYSQLPASSWORD") ?: "";
$db = getenv("MYSQLDATABASE") ?: "collegeproject";
$port = getenv("MYSQLPORT") ?: 3307;

$conn = mysqli_connect($host,$user,$password,$db,$port);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>