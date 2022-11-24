<?php

include "db.php";

session_start();

#check whether the input  has been given and the submit button has been pressed
if(isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['re_pass'])){

        $name = $email = $role = $password = $repassword = $error = "";

        # htmlspecialchars method helps to prevent from XXS (cross site attack)
        $name =  htmlspecialchars($_POST['name']);
        $email =  htmlspecialchars($_POST['email']);
        $password =  htmlspecialchars($_POST['pass']);
        $repassword = htmlspecialchars($_POST['re_pass']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $role = 2;

        if($repassword == $password){

            #inserts data to the table voter
            $sql = "INSERT INTO `voter` (`name`, `email`, `password`, `role_id`) VALUES ('$name', '$email', '$hashed_password', '$role')";

            if($conn->query($sql) === TRUE){
                echo "<script>
                        window.location.href = '../index.php';
                        alert('Successfully Registered!');
                      </script>";
            }else {
              $error = 'Email should be unique!';
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
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="<?php if(isset($_POST['name'])) echo $email; ?>" required/>
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