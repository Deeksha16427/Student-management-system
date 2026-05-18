<?php
$url = getenv('MYSQL_URL');

if($url){
    $url = preg_replace('#^[^:]+://#', '', $url);
    preg_match('#^([^:]+):([^@]*)@([^:/]+):(\d+)/(.+)$#', $url, $m);
    $user     = $m[1];
    $password = $m[2];
    $host     = $m[3];
    $port     = $m[4];
    $db       = $m[5];
    $conn = mysqli_connect($host, $user, $password, $db, (int)$port);
} else {
    $conn = mysqli_connect('localhost', 'root', '', 'collegeproject', 3307);
}

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
?>