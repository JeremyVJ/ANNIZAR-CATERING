<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" href="images/logo-icon.png">
        <title>Admin Dashboard</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/helper.css" rel="stylesheet">
        <link href="css/style1.css" rel="stylesheet">
    </head>

    <body class="fix-header">
        <!-- Preloader - style you can find in spinners.css -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- Main wrapper  -->
        <div id="main-wrapper">
            <!-- header header  -->
            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.html">
                            <!-- Logo icon -->
                            <b><img src="images/logo-admin.png" style="width: 55px; height:55px;" alt="homepage" class="dark-logo" /></b>
                            <span><img src="images/text-icon.png" style="width: 120px; height:60px;" alt="homepage" class="dark-logo" /></span>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <div class="navbar-collapse">
                        <!-- toggle and nav items -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- User profile and search -->
                        <ul class="navbar-nav my-lg-0">

                            <!-- Profile -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/jims.jpg" alt="user" class="profile-pic" /></a>
                                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                    <ul class="dropdown-user">
                                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Keluar</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- End header header -->
            <!-- Left Sidebar  -->
            <div class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            <li class="nav-label">Home</li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="dashboard.php">Dashboard</a></li>
                                </ul>
                            </li>
                            <li class="nav-label">LOG</li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fa fa-user f-s-20"></i><span class="hide-menu">Pengguna</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="allusers.php">Daftar Pengguna</a></li>
                                    <li><a href="add_users.php">Tambah Pengguna</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="all_menu.php">Semua Menu</a></li>
                                    <li><a href="add_menu.php">Tambahkan Menu</a></li>
                                    <li><a href="add_category.php">Tambah Kategori</a></li>
                                    <li><a href="packageCat.php">Tambah Paket</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Order</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="all_orders.php">Semua Orderan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </div>
            <!-- End Left Sidebar  -->
            <!-- Page wrapper  -->
            <div class="page-wrapper" style="height:1200px;">
                <!-- Bread crumb -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-primary">Dashboard</h3>
                    </div>
                </div>
                <!-- Power BI Dashboard -->
                <iframe title="Report Section" width="1000" height="780" src="https://app.powerbi.com/view?r=eyJrIjoiZGViNTAyNjctYjM1Zi00OGUyLWEwNmEtMmJiN2IyNWYxNzY3IiwidCI6IjUyNjNjYzgxLTU5MTItNDJjNC1hYmMxLWQwZjFiNjY4YjUzMCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
                <!-- End Bread crumb -->
                <!-- Container fluid  -->
            </div>
            <!-- End Page wrapper  -->
        </div>
        <!-- End Wrapper -->
        <!-- All Jquery -->
        <script src="js/lib/jquery/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="js/lib/bootstrap/js/popper.min.js"></script>
        <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="js/jquery.slimscroll.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--stickey kit -->
        <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    </body>

</html>
<?php
}
?>