<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  //include connection file
error_reporting(0);  // using to hide undefine undex errors
session_start(); //start temp session until logout/browser closed

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/animsition.min.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/carousle.css" rel="stylesheet" />
</head>

<body class="home">


    <style>

    </style>

    <!--header starts-->
    <header id="header" class="header-scroll top-header">
        <!-- .navbar -->
        <nav style="background-color:black;">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up m-b-20" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/DiyoGAY.png" alt="Gambar" style="height:70px; width:90px"> </a>
                <br>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php" style="color: white;">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php" style="color: white;">Menu <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active" style="color: white;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active" style="color: white;">Sign up</a> </li>';
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Keranjang</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">logout</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <!-- banner part starts -->

    <section class="bg-image pb-5" style="height: max-content;">
        <div>
            <div class="container" style="height : 100px;">

            </div>
            <div class="carousel" style="height: max-content;">
                <ul class="slides">
                    <input type="radio" name="radio-buttons" id="img-1" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img src="images/bg-register.jpg">
                        </div>
                    </li>
                    <input type="radio" name="radio-buttons" id="img-2" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img src="images/liwet.jpg">
                        </div>
                    </li>
                    <input type="radio" name="radio-buttons" id="img-3" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img src="images/siomay.jpg">
                        </div>
                    </li>

                    <div class="carousel-dots">
                        <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
                        <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
                        <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
                    </div>
                </ul>
            </div>
        </div>
    </section>
    <!-- banner part ends -->
    <!-- Popular block starts -->
    <section class="popular" style="background-color: antiquewhite;">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Dishes of the Month</h2>
                <p class="lead">The easiest way to your favourite food</p>
            </div>
            <div class="row">
                <?php
                // fetch records from database to display popular first 3 dishes from table
                $query_res = mysqli_query($db, "select * from dishes LIMIT 6");
                while ($r = mysqli_fetch_array($query_res)) {
                    // Convert the price to IDR
                    $price_in_idr = $r['price'];

                    echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                        <div class="food-item-wrap">
                                        <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/' . $r['img'] . '"></div>
                                        <div class="content">
                                        <h5><a href="dishes.php?res_id=' . $r['rs_id'] . '">' . $r['title'] . '</a></h5>
                                    <div class="product-name">' . $r['slogan'] . '</div>
                                <div class="price-btn-block"> <span class="price">IDR ' . number_format($price_in_idr) . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                            </div>
                        </div>
                    </div>';
                } ?>
            </div>
        </div>
    </section>
    <!-- Popular block ends -->
    <!-- How it works block starts -->
    <section class="how-it-works">
        <div class="container">
            <div class="text-xs-center">
                <h2>MENU</h2>
                <!-- 3 block sections starts -->
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                    </div>
                </div>
            </div>
            <!-- 3 block sections ends -->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">Pay by Cash on delivery</p>
                </div>
            </div>
        </div>
    </section>
    <!-- How it works block ends -->
    <!-- Featured restaurants starts -->
    <section class="featured-restaurants">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4>Paket Makanan</h4>
                    </div>
                </div>
                <div class="col-sm-8">
                    <!-- restaurants filter nav starts -->
                    <div class="restaurants-filter pull-right">
                        <nav class="primary pull-left">
                            <ul>
                                <li><a href="#" class="selected" data-filter="*">all</a> </li>
                                <?php
                                // display categories here
                                $res = mysqli_query($db, "select * from res_category");
                                while ($row = mysqli_fetch_array($res)) {
                                    echo '<li><a href="#" data-filter=".' . $row['c_name'] . '"> ' . $row['c_name'] . '</a> </li>';
                                }
                                ?>

                            </ul>
                        </nav>
                    </div>
                    <!-- restaurants filter nav ends -->
                </div>
            </div>
            <!-- restaurants listing starts -->

            <style>
                .restaurant-wrap {
                    border: 2px solid transparent;
                    /* Atur border transparan awal */
                    transition-timing-function: ease-in;
                    /* Efek transisi untuk perubahan warna dan border */
                    transition: transform 0.3s;
                    /* Mengatur transisi untuk efek animasi */
                }

                .restaurant-wrap:hover {
                    color: antiquewhite;
                    /* Warna teks menjadi oranye saat cursor hover */
                    border: 2px solid antiquewhite;
                    /* Border menjadi oranye saat cursor hover */
                    background-color: antiquewhite;
                    transform: scale(1.1);
                    /* Memperbesar elemen saat cursor hover */
                }

                .restaurant-wrap:active {
                    background-color: antiquewhite;
                    /* Warna latar belakang menjadi oranye saat elemen ditekan */
                }

                .restaurant-wrap:hover .cost,
                .restaurant-wrap:hover .mins {
                    display: block;
                    /* Tampilkan cost dan mins saat cursor hover */
                }
            </style>

            <div class="row">
                <div class="restaurant-listing">
                    <?php
                    // Fetching records from the restaurant table
                    $ress = mysqli_query($db, "select * from restaurant");
                    while ($rows = mysqli_fetch_array($ress)) {
                        // Fetch records from res_category table according to the category ID
                        $query = mysqli_query($db, "select * from res_category where c_id='" . $rows['c_id'] . "'");
                        $rowss = mysqli_fetch_array($query);

                        // Retrieve the image data from the BLOB field
                        $imageData = $rows['image'];
                        // Convert BLOB data to base64-encoded image
                        $imageBase64 = 'data:image/jpeg;base64,' . base64_encode($imageData);

                        echo '<div class="col-xs-12 col-sm-12 col-md-6 single-restaurant all ' . $rowss['c_name'] . '">
                <div class="restaurant-wrap">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 col-md-12 col-lg-3 text-xs-center">
                            <a class="restaurant-logo" href="dishes.php?res_id=' . $rows['rs_id'] . '">
                                <img src="' . $imageBase64 . '" alt="Restaurant logo">
                            </a>
                        </div>
                        <!--end:col -->
                        <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                            <h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5>
                            <span>' . $rows['address'] . '</span>
                            <div class="bottom-part">
                                <div class="cost"><i class="fa fa-check"></i> Min $ 10,00</div>
                                <div class="mins"><i class="fa fa-motorcycle"></i> 30 min</div>
                            </div>
                        </div>
                        <!-- end:col -->
                    </div>
                    <!-- end:row -->
                </div>
                <!--end:Restaurant wrap -->
            </div>';
                    }
                    ?>
                </div>
            </div>
            <!-- restaurants listing ends -->

        </div>
    </section>
    <!-- start: FOOTER -->
    <footer class="footer">
        <div class="container">
            <!-- top footer statrs -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                    <a href="#"> <img src="images/food-picky-logo.png" alt="Footer logo"> </a> <span>Order Delivery &amp; Take-Out </span>
                </div>
                <div class="col-xs-12 col-sm-2 about color-gray">
                    <h5>About Us</h5>
                    <ul>
                        <li><a href="#">About us</a> </li>
                        <li><a href="#">History</a> </li>
                        <li><a href="#">Our Team</a> </li>
                        <li><a href="#">We are hiring</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                    <h5>How it Works</h5>
                    <ul>
                        <li><a href="#">Enter your location</a> </li>
                        <li><a href="#">Choose restaurant</a> </li>
                        <li><a href="#">Choose meal</a> </li>
                        <li><a href="#">Pay via credit card</a> </li>
                        <li><a href="#">Wait for delivery</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-2 pages color-gray">
                    <h5>Pages</h5>
                    <ul>
                        <li><a href="#">Search results page</a> </li>
                        <li><a href="#">User Sing Up Page</a> </li>
                        <li><a href="#">Pricing page</a> </li>
                        <li><a href="#">Make order</a> </li>
                        <li><a href="#">Add to cart</a> </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                    <h5>Popular locations</h5>
                    <ul>
                        <li><a href="#">Sarajevo</a> </li>
                        <li><a href="#">Split</a> </li>
                        <li><a href="#">Tuzla</a> </li>
                        <li><a href="#">Sibenik</a> </li>
                        <li><a href="#">Zagreb</a> </li>
                        <li><a href="#">Brcko</a> </li>
                        <li><a href="#">Beograd</a> </li>
                        <li><a href="#">New York</a> </li>
                        <li><a href="#">Gradacac</a> </li>
                        <li><a href="#">Los Angeles</a> </li>
                    </ul>
                </div>
            </div>
            <!-- top footer ends -->
        </div>
    </footer>
    <!-- end:Footer -->

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
    <script>
        // Fungsi untuk mengaktifkan slide berikutnya
        function nextSlide() {
            const radios = document.querySelectorAll('input[type="radio"]');
            const checkedRadio = document.querySelector('input[type="radio"]:checked');
            const currentIndex = Array.from(radios).indexOf(checkedRadio);
            const nextIndex = (currentIndex + 1) % radios.length;
            radios[nextIndex].checked = true;
        }

        // Atur interval untuk mengganti slide otomatis
        const interval = 3000; // Ubah sesuai kebutuhan (dalam milidetik)
        setInterval(nextSlide, interval);
    </script>
</body>

</html>