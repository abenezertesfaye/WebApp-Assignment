<?php

session_start();

include "db.php";

if(isset($_SESSION['user'])){
    header('Location: admin/dashboard.php');
}

#check whether the input  has been given and the submit button has been pressed
if(isset($_POST['submit'])){

        // $name = $email = $role = $password = $repassword = $error = "";
        function validate ($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        # htmlspecialchars method helps to prevent from XXS (cross site attack)
        $name =  validate($_POST['name']);
        $password =  validate($_POST['pass']);
        $repassword = validate($_POST['re_pass']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = 2;

        if($repassword == $password){

            #inserts data to the table voter
            $sql = "INSERT INTO `users` (`name`, `password`, `role`) VALUES ('$name', '$hashed_password', '$role')";

            if($conn->query($sql) === TRUE){
                echo "<script>
                        window.location.href = '../index.php';
                        alert('Successfully Registered!');
                      </script>";
            }

        }else{
            $error = "your password doesn't match! retry!";
        }    

        $conn->close();
  }


?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign_up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="../frontend/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="../frontend/css/style.css">
</head>
<body>

 <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="register.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" value="<?php if(isset($_POST['name'])) echo $name; ?>" required/>
                            </div>           
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>

                            <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">'. $error .'</div>'; ?>
                        
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="../frontend/images/pp.jpg" alt="sing up image"></figure>
                        <a href="../index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

  <!-- JS -->
    <script src="../frontend/vendor/jquery/jquery.min.js"></script>
    <script src="../frontend/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>       