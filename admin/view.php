<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

$sql = "SELECT * FROM cadidates";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> View candidates</title>
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
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Manage voters</a>
                        <ul class="sub-menu children dropdown-menu">
                             <li><i class="fa fa-puzzle-piece"></i><a href="viewvoter.php">View Voters</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="viewvoter.php">Delete voters</a></li>                         
                        </ul>
                    </li> -->
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

<!-- Header-->
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
   
<h2 class="mb-2">View Candidates</h2>
<!-- <br><br> -->
<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>candidate_name</th>

        <th>Description</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['candidate_id']; ?></td>

                    <td><?php echo $row['candidate_name']; ?></td>

                    <td><?php echo $row['description']; ?></td>

                    <td><a class="btn btn-info" href="edit.php?candidate_id=<?php echo $row['candidate_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?candidate_id=<?php echo $row['candidate_id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

<script src="../frontend/admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="../frontend/admin/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="../frontend/admin/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../frontend/admin/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

<script src="../frontend/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../frontend/admin/assets/js/main.js"></script>
</body>

</html>