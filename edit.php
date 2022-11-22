<?php 

include('Includes/db.php');

  if (isset($_POST['submit'])) {

    $candidate_name = $_POST['candidate_name'];
    $description = $_POST['description'];
    $candidate_id=$_POST['candidate_id'];

    
    $sql = "UPDATE `cadidates` SET `candidate_name`='$candidate_name',`description`='$description' WHERE `candidate_id`='$candidate_id'"; 

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "<script>
                        window.location.href = 'view.php';
                        alert('Successfully DONE!');
                      </script>";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

  }

if (isset($_GET['candidate_id'])) {

    $candidate_id = $_GET['candidate_id']; 

    $sql = "SELECT * FROM `cadidates` WHERE `candidate_id`='$candidate_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $candidate_name= $row['candidate_name'];

            $description = $row['description'];

            $candidate_id = $row['candidate_id'];

        } 
    }
}
    ?>



<!doctype html>
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Add candidate</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

      
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.html"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Boss</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage voters</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Edit voters</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Delete voters</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Manage candidate</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add.php">Add candidate</a></li>
                            <li><i class="fa fa-table"></i><a href="edit.php">Edit candidate</a></li>
                            
                        </ul>
                    </li>
                    

        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
  </div>
</ul>
</div>
                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-header">UPDATE INFO</div>
                                                        <div class="card-body card-block">
                                                            <form action="" method="post" class="">
                                                
                                                                    <input type="text" name="candidate_name" class="form-control" value= "<?php echo $candidate_name; ?>">
                                                                        <input type="hidden" name="candidate_id" value="<?php echo $candidate_id; ?>">
                                                                        <br><br>
                                                                        <input type="text" name="description" class="form-control" value= "<?php echo $description; ?>">


                                                                    </div>
                                                                </div>

<div>
                                                                         
                                                                          
                                                                      </div>

                                                                   
                                                                      </textarea>
                                                                             </div>
        
                                                                
                                                  <br><br> <br>  <br>  <br><br> <br>              
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="submit" class="form-submit" value="UPDATE"/>
                            </div>
                        </form>
                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>