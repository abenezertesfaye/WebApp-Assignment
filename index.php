<?php
session_start();

include "Include/db.php";

if(isset($_SESSION['user'])){
    header('Location: admin/dashboard.php');
}

if(isset($_POST['submit']) && isset($_POST['your_name']) && isset($_POST['your_pass']) && isset($_POST['role'])){

    function validate ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $user = $password = $role = $hashedpassadmin = $hashedpassvoter = $error = "";
    $user = validate($_POST['your_name']);
    $password = validate($_POST['your_pass']);
    $role = $_POST['role'];


    if($role == 1){
        $sql = "SELECT `password` FROM `admin` where `username` = '$user'";
        $result = $conn->query($sql);
        while($row = $result->fetch_object()){
            $hashedpassadmin     = $row->password;
        }
        if(password_verify($password, $hashedpassadmin)){   
            $_SESSION['user'] = $user;    
            echo "<script>
                   window.location.href='admin/dashboard.php';
                   alert('Successfully logged in!');
                  </script>";   
            // header('Location: ../admin/dashboard.php', true ,301);
            // echo "<script>alert('success')</script>";
            } 
        else{    
            $error = "Incorrect Username or Password!";
            }
        }   
    if($role == 2){
        $sql = "SELECT `password` FROM `voter` where `name` = '$user'";
        $result = $conn->query($sql);
        while($row = $result->fetch_object()){
            $hashedpassvoter = $row->password;
        }
        if(password_verify($password, $hashedpassvoter)){
            $_SESSION['user'] = $user;  
            echo "<script>
                    window.location.href ='voter/dashboard.php';
                    alert('Successfully Logged In!');
                  </script>";
        } else{
            $error = "Incorrect Username or Password!";
        }
    }
    
}

?>