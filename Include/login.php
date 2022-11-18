<?php

session_start();

include "db.php";

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
            $_SESSION['user'] = $row->username;    
            echo "<script>
                   window.location.href='../admin/dashboard.php';
                   alert('Successfully logged in!');
                  </script>";
               
            // header('Location: ../admin/dashboard.php', true ,301);
            // echo "<script>alert('success')</script>";
            } 
        else{    
            $error = "Incorrect Username or Password!";
            echo "<script>
                    window.location.href = '../index.php';
                 </script>". $error;
            //  header('Location: ../index.php', true, 302);
            //  exit;
            }
        }   
    if($role == 2){
        $sql = "SELECT `password` FROM `voter` where `name` = '$user'";
        $result = $conn->query($sql);
        while($row = $result->fetch_object()){
            $hashedpassvoter = $row->password;
        }
        if(password_verify($password, $hashedpassvoter)){
            echo "success";
        } else{
            echo "error";
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

</head>
<body>

</body>
</html>
