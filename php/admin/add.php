<?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

  if (isset($_POST['submit'])) {

    function validate ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $candidate_name = validate($_POST['candidate_name']);
    $description = validate($_POST['description']);
    
    $sql = "INSERT INTO `candidates` (`candid_name`,`candid_description`) VALUES ('$candidate_name','$description')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "<script>
                window.location.href = 'view.php';
                alert('Successfully Added!');
            </script>";

    }else{

      echo $error = 'Invalid Input!';

    } 

    $conn->close(); 

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
    <?php 

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

include('../Include/db.php');

  if (isset($_POST['submit'])) {

    function validate ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $candidate_name = validate($_POST['candidate_name']);
    $description = validate($_POST['description']);
    
    $sql = "INSERT INTO `candidates` (`candid_name`,`candid_description`) VALUES ('$candidate_name','$description')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "<script>
                window.location.href = 'view.php';
                alert('Successfully Added!');
            </script>";

    }else{

      echo $error = 'Invalid Input!';

    } 

    $conn->close(); 

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
    </aside><!-- /#left-panel -->

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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">ADD CANDIDATES</div>
            <div class="card-body card-block">
                <form action="add.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" id="name" name="candidate_name" placeholder="Username" class="form-control" value= "<?php if(isset($_POST['candidate_name'])) echo $candidate_name; ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <textarea name="description" id="textarea-input" rows="9" placeholder="candidates motto" class="form-control"
                        value= "<?php if(isset($_POST['description'])) echo $description; ?>" required></textarea>
                    </div>
                    
                    <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">'. $error .'</div>'; ?>
                </div>  
                    <div class="card-body card-block">
                      <button class="btn btn-primary" name="submit">Submit</button>
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

<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
</body>
</html>

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
    </aside><!-- /#left-panel -->

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

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">ADD CANDIDATES</div>
            <div class="card-body card-block">
                <form action="add.php" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" id="name" name="candidate_name" placeholder="Username" class="form-control" value= "<?php if(isset($_POST['candidate_name'])) echo $candidate_name; ?>" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <textarea name="description" id="textarea-input" rows="9" placeholder="candidates motto" class="form-control"
                        value= "<?php if(isset($_POST['description'])) echo $description; ?>" required></textarea>
                    </div>
                    
                    <?php if(isset($error)) echo '<div class="alert alert-danger" role="alert">'. $error .'</div>'; ?>
                </div>  
                    <div class="card-body card-block">
                      <button class="btn btn-primary" name="submit">Submit</button>
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

<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
</body>
</html>