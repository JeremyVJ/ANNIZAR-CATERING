<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/icon-fix.png">
    <title>Menu</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style1.css" rel="stylesheet">
</head>

<body>
    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/assets/logocrop.png" style="width:70px" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Menu <span class="sr-only"></span></a> </li>

                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                        } else {


                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Pesanan Saya</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Pilih Kategori Makanan</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="dishes.php">Pilih Menu</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg">
            <div class="container"> </div>
            <!-- end:Container -->
        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">


                </div>
            </div>
        </div>
        <!-- //results show -->
        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">


                        <div class="widget clearfix">
                            <!-- /widget heading -->
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Popular tags
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                    <li> <a href="dishes.php?res_id=52" class="tag">
                                            Paketan
                                        </a> </li>
                                    <li> <a href="dishes.php?res_id=50" class="tag">
                                            Sambal
                                        </a> </li>
                                    <li> <a href="dishes.php?res_id=51" class="tag">
                                            Minuman
                                        </a> </li>
                                    <li> <a href="dishes.php?res_id=49" class="tag">
                                            Lauk
                                        </a> </li>
                                    <li> <a href="dishes.php?res_id=48" class="tag">
                                            Nasi
                                        </a> </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end:Widget -->
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row">
                                <?php
                                $ress = mysqli_query($db, "select * from restaurant");
                                while ($rows = mysqli_fetch_array($ress)) {
                                    // Retrieve the image data from the BLOB field
                                    $imageData = $rows['image'];
                                    // Convert BLOB data to base64-encoded image
                                    $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);

                                    echo '<div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                        <div class="entry-logo">
                            <a class="img-fluid" href="dishes.php?res_id=' . $rows['rs_id'] . '"><img src="' . $imageBase64 . '" alt="Food logo"></a>
                        </div>
                        <!-- end:Logo -->
                        <div class="entry-dscr">
                            <h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5> <span>' . $rows['address'] . '</span>
                            
                        </div>
                        <!-- end:Entry description -->
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                        <div class="right-content bg-white">
                            <div class="right-review">
                                <div class="rating-block"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                <p> 245 Ulasan</p> <a href="dishes.php?res_id=' . $rows['rs_id'] . '" class="btn theme-btn-dash">Lihat Menu</a> </div>
                        </div>
                        <!-- end:right info -->
                    </div>';
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- start: FOOTER -->
        <footer class="footer">
            <div>
                <div class="text-center">
                    <img src="images/assets/logocrop.png" style="width:150px" alt="Logo-Footer">
                </div>
                <div class="text-center mt-5">
                    <ul style="display:flex;">
                        <li>
                            <a href="#"><img src="images/assets/iconwa.png" style="width:50px;" alt="Icon-Wa"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/assets/iconfb.png" style="width:40px;" alt="Icon-Wa"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/assets/iconemail.png" style="width:40px;" alt="Icon-Wa"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/assets/iconig.png" style="width:40px;" alt="Icon-Wa"></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/assets/iconfb.png" style="width:40px;" alt="Icon-Wa"></a>
                        </li>
                    </ul>
                </div>
                <div class="text-center">
                    <p>Copyright &copy; 2023. Developed by Team D3</p>
                </div>
            </div>
        </footer>
        <!-- end:Footer -->
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>