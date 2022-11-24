<?php

session_start();

if(!isset($_SESSION['user'])){
    header('Location: ../index.php');
}


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

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Voter </title>
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
                    <h3 class="menu-title"><?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?></h3><!-- /.menu-title -->
                    <li class="active">
                        <a href="dashboard.php">Dashboard </a>
                    </li>
                    <li>
                        <a href="voter.php">Vote </a>
                    </li>
                </ul>
        </nav>
     </div><!-- /.navbar-collapse -->
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

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

        </header><!-- /header -->
        <!-- Header-->

        <div class="col-6">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
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
            <!--/.col-->

            <div class="col-6">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
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
            <!--/.col-->

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
             <!-- /# card -->
         </div>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

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

</body>

</html>


 