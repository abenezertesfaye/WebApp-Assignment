<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

else {
    $now = time();
  
    if($now > $_SESSION['expire']) {
        session_destroy();
        echo "<p align='center'>Session has been destroyed!!";
        header("Location: ../index.php");  
    } else { 

$_SESSION['edited'] = 0;

include('../Include/db.php');

  if (isset($_POST['submit'])) {

    $candidate_name = $_POST['candidate_name'];
    $description = $_POST['description'];
    $candidate_id=$_POST['id'];

    $sql = "UPDATE `candidates` SET `candid_name`='$candidate_name',`candid_description`='$description' WHERE `id`='$candidate_id'"; 

    $result = $conn->query($sql);

    if ($result == TRUE) {

        $_SESSION['editedMessage'] = 'You have successfully updated candidate!';
        $_SESSION['edited'] += 1;

        header('Location: view.php');

    } else { 
      echo $error = "Invalid input!";
    } 

  }

if (isset($_GET['id'])) {

    $candidate_id = $_GET['id']; 
    $sql = "SELECT * FROM `candidates` WHERE `id`='$candidate_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {

            $candidate_name= $row['candid_name'];
            $description = $row['candid_description'];
            $candidate_id = $row['id'];

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
    <title> Edit candidate</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../frontend/admin/apple-icon.png">
    <link rel="shortcut icon" href="../frontend/admin/favicon.ico">


    <link rel="stylesheet" href="../frontend/admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../frontend/admin/assets/css/style.css">

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
            </div>
      
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <h3 class="menu-title"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?></h3>
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Manage candidate</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="add.php">Add candidate</a></li>
                            <li><i class="fa fa-table"></i><a href="view.php">View candidate</a></li>
                        </ul>
                    </li>
        </nav>
    </aside>

    <div id="right-panel" class="right-panel">
    
    <header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
        <div class="header-left">
            <button class="search-trigger"><i class="fa fa-search"></i></button>
            <div class="form-inline">
                <form class="search-form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                    <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                </form>
            </div>    
        <div class="col-sm-5">
            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="../frontend/admin/images/admin.jpg" alt="User Avatar">
                </a>
            <div class="user-menu dropdown-menu">
                <a class="nav-link" href="../Include/logout.php"><i class="fa fa-power-off"></i> Logout</a>
            </div>
        </div>
    </div>
  </div>
</div>

</header>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">UPDATE INFO</div>
                <div class="card-body card-block">
                    <form action="edit.php" method="post" class="form-group">
                        <input type="text" name="candidate_name" class="input-group" value= "<?php echo $candidate_name; ?>" required>
                        <input type="hidden" name="id" value="<?php echo $candidate_id; ?>">
                        <br><br>
                                    
                        <textarea class="input-group" name="description" id="description" cols="30" rows="10" required><?php echo $description ?></textarea>
                </div>
                <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">'. $error .'</div>'; ?>
                <div class="card-body card-block">
                      <button class="btn btn-primary" name="submit">Update</button>
                    </div>
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
    <script src="../frontend/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../frontend/admin/vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="../frontend/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../frontend/admin/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

    <script src="../frontend/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../frontend/admin/assets/js/main.js"></script>

    <?php
    
            }
        }

    ?>
</body>
</html>
