<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}

else {
    $now = time();
  
    if($now > $_SESSION['expire']) {
        session_destroy();
        echo "<p align='center'>Session has been destroyed!!
              <script>
                window.location.href = '../index.php';
              </script>
        ";
        // header("Location: ../index.php");  
    } else { 

include('../Include/db.php');

$sql = "SELECT * FROM candidates";

$result = $conn->query($sql);

if($result){
  $count = mysqli_num_rows($result);
}

$voter = "SELECT * FROM `users` WHERE `role` = '2'";

$stm = $conn->query($voter);

if($stm){
    $voters = mysqli_num_rows($stm);
}

$vote = "SELECT * FROM vote";

$total = $conn->query($vote);

if($total){
    $totalvote = mysqli_num_rows($total);
}

function validate ($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../frontend/admin/apple-icon.png">
    <link rel="shortcut icon" href="../frontend/admin/favicon.ico">

    <link rel="stylesheet" href="../frontend/admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../frontend/admin/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="../frontend/admin/assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->

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
                   
                    <h3 class="menu-title"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?></h3><!-- /.menu-title -->
                    <li class="active">
                        <a href="dashboard.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Manage candidate</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="add.php">Add Candidate</a></li>
                            <li><i class="fa fa-table"></i><a href="view.php">View candidate</a></li>                   
                        </ul>
                    </li>         
             </nav>
        </div><!-- /.navbar-collapse -->
    </aside><!-- /#left-panel -->
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

        </header><!-- /header -->

        <?php
        if(isset($_SESSION['message']) && $_SESSION['login_status'] == false) {

            echo '<div class="alert alert-primary alert-dismissible" role="alert">' . $_SESSION['message'] . '</div>';
            $_SESSION['login_status'] = true;
        }
        ?>

        <div class="col-6">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <div class="dropdown-menu-content">
                                <a class="dropdown-item" href="view.php">Candidates</a>              
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-0">
                        <span class="count">
                            <?php echo $count; ?>
                        </span>
                    </h4>
                    <p class="text-light">Candidates</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card text-white bg-flat-color-2">
                <div class="card-body pb-0">
                    <div class="dropdown float-right">
                        <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <div class="dropdown-menu-content">
                                <a class="dropdown-item" href="viewvoter.php">View Voters</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mb-0">
                        <span class="count"><?php echo $voters; ?></span>
                    </h4>
                    <p class="text-light">Voters</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Vote</div>
                            <div class="stat-digit"><?php echo $totalvote; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">  

        <form action="dashboard.php" method="post">
            <div class="form-group">
                <label for="command">Enter the Ip address to ping ..</label>
                <input type="text" name="ip" required class="form-control">
                <button  class="btn btn-primary mt-3">Submit</button>
            </div>

            <?php 

            if(isset($_POST['ip'])){

                $ip = $_POST['ip'];

                if(filter_var($ip, FILTER_VALIDATE_IP)){

                    echo  '<pre>' . shell_exec("ping -c 4 $ip") . '</pre>';
            
                } else {
                    echo "you have Entered Invalid ip! try with valid ip!";
                }
            }       
            
            ?>
        </form>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

    <script src="../frontend/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="../frontend/admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../frontend/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../frontend/admin/assets/js/main.js"></script>

    <script src="../frontend/admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="../frontend/admin/assets/js/dashboard.js"></script>
    <script src="../frontend/admin/assets/js/widgets.js"></script>
    <script src="../frontend/admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="../frontend/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="../frontend/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
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

<?php
    
        }
    }
?>
</body>

</html>


 