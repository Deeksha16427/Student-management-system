<?php

error_reporting(0);
session_start();

$host="localhost";
$user="root";
$password="";
$db="collegeproject";

$data=mysqli_connect($host,$user,$password,$db,3307);

if($data===false){
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($data,$sql);

    $row = mysqli_fetch_assoc($result);


    if($row){
        $_SESSION['usertype'] = trim($row['usertype']);
        $_SESSION['email']=$email;
        $_SESSION['name'] = $row['username'];

        if(trim($row["usertype"]) == "student"){
          
            
            header("Location: studenthome.php");
            exit();
        }

        elseif(trim($row["usertype"]) == "admin"){
          
            header("Location: adminhome.php");
            exit();
        }

    }
    else{
        
        $message= "Email or password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:login.php");
    }
}

?>