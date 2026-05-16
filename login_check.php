<?php

session_start();

include('config.php');


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn,$sql);

    if(!$result){
        die(mysqli_error($conn));
    }

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