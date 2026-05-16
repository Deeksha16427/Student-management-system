<?php
$url = getenv('MYSQL_URL');

if($url){
    $parts = parse_url($url);
    $host = $parts['host'];
    $user = $parts['user'];
    $password = $parts['pass'];
    $db = ltrim($parts['path'], '/');
    $port = $parts['port'];
    $conn = mysqli_connect($host, $user, $password, $db, $port);
} else {
    $conn = mysqli_connect('localhost', 'root', '', 'collegeproject', 3307);
}

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>