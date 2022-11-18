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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="frontend/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="frontend/css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="main">
        
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="frontend/images/ll.jpg" alt="sing up image"></figure>
                        <a href="Include/register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action="index.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="User Name" value="<?php if(isset($_POST['your_name'])) { echo $_POST['your_name'];} ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password" required/>
                            </div>                  
                            <div class="form-group">
                                <input type="radio" name="role" id="remember-me" class="agree-term" value="1" required/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Admin</label>
                                <input type="radio" name="role" id="remember-me" class="agree-term" value="2" required/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Voter</label>
                            </div>

                            <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">' . $error . '</div>' ?>

                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/>
                            </div>
                           
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>
    <script src="frontend/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>