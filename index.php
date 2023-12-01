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
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="images/assets/logo-icon.png">
    <title>Starter Template for Bootstrap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet" />
    <link href="css/style-fix.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/animsition.min.css" rel="stylesheet" />
    <link href="css/animate.css" rel="stylesheet" />
    <link href="css/style-fix.css" rel="stylesheet" />
    <link href="css/carousle.css" rel="stylesheet" />
</head>

<body class="home">
    <!--header starts-->
    <header id="header" class="header-scroll top-header">
        <!-- .navbar -->
        <nav style="background-color:#f6f6f6;">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up m-b-20" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/assets/logo-footer.png" alt="Gambar" style="height:70px; width:90px; "> </a>
                <br>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php" style="color: #333; font-weight:400;">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php" style="color: #333; font-weight:400;">Menu <span class="sr-only"></span></a> </li>
                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active" style="color: #333; font-weight:400;">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active" style="color: #333; font-weight:400;">Sign up</a> </li>';
                        } else {
                            echo  '<li class="nav-item"><a href="your_orders.php" style="color:black;" class="nav-link active">Pesanan Saya</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" style="color:black;" class="nav-link active">Logout</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <!-- banner part starts -->

    <section class="bg-image pb-5" style="height: 100vh;">
        <div style="background-color:black;">
            <div class="carousel">
                <ul class="slides" style="height: 100vh;">
                    <input type="radio" name="radio-buttons" id="img-1" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img class="img-custom" src="images/promo3.png">
                        </div>
                    </li>

                    <input type="radio" name="radio-buttons" id="img-2" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img class="img-custom" src="images/promo1 (3).png">
                        </div>
                    </li>

                    <input type="radio" name="radio-buttons" id="img-3" checked />
                    <li class="slide-container">
                        <div class="slide-image">
                            <img class="img-custom" src="images/promo2.png">
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
    <section class="popular" style="background-color:#f4f4ef;">
        <div class="container">
            <div class="title text-xs-center m-b-30">
                <p style="font-weight:bold; color:black; font-size:70px;">Menu <span class="best-seller" style="color:#a3816a;">Best Seller</span></p>
                <p class="lead" style="color:black; font-family: 'Plus Jakarta Sans', sans-serif;">Cita Rasa Autentik dan Kualitas Bahan yang Segar!</p>
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
                                <div class="price-btn-block"> <span class="price">IDR ' . number_format($price_in_idr) . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Sekarang</a> </div>
                            </div>
                        </div>
                    </div>';
                } ?>
            </div>
        </div>
    </section>
    <!-- Popular block ends -->
    <!-- How it works block starts -->
    <section class="how-it-works" style="background-image:url('images/assets/bghome.jpg'); background-size:cover; background-repeat:no-repeat; height:auto;">
        <div class="container">
            <div class="text-xs-center">
                <h2 style="color:white; font-weight:bold; text-shadow:3px 3px 1px rgba(0,0,0,0.5); padding-top:25px;">Kamu harus tau tentang Catering Annizar!</h2>
            </div>

            <div class="row">
                <div class="col-sm-5 offset-sm-1">
                    <h1 style="color:white; font-size:28px; text-shadow:1px 1px 1px rgba(0,0,0,0.5);">Terbuat dari bahan yang berkualitas</h1>
                    <p style="font-weight:300; color:white; text-shadow:1px 1px 1px rgba(0,0,0,0.5); font-size:18px;">Semua makanan yang dimasak oleh Catering Annizar pasti selalu fresh sampai ditangan konsumen. Hal ini dikarenakan kami selalu melakukan stok ulang bahan setiap hari. Kadang ada beberapa bahan yang susah dicari, tetapi karena kami sudah mempunyai supplier diberbagai daerah, itu sangat membantu kami dalam hal ini.</p>
                </div>
                <div class="col-sm-5">
                    <h1 style="color:white; font-size:28px; text-shadow:1px 1px 1px rgba(0,0,0,0.5);">Pelayanan yang ramah</h1>
                    <p style="font-weight:300; color:white; text-shadow:1px 1px 1px rgba(0,0,0,0.5); font-size:18px;">Catering Annizar memberikan pelayanan yang ramah dan sopan kepada setiap pelanggan. Hal ini juga merupakan poin penting dikarenakan menjalin kedekatan antara pelanggan dengan kami.</p>
                </div>
            </div>
            <div class="row" style="margin-top:50px;">
                <div class="col-sm-5 offset-sm-4">
                    <h1 style="color:white; font-size:28px; text-shadow:1px 1px 1px rgba(0,0,0,0.5);">Cita rasa dan keunikan</h1>
                    <p style="font-weight:300; color:white; text-shadow:1px 1px 1px rgba(0,0,0,0.5); font-size:18px;">Tidak diragukan lagi jika memasak dengan bahan yang berkualitas, maka akan menghasilkan makanan yang cita rasanya enak. Catering Annizar juga memiliki keunikan yang terletak pada kemasan dan hiasan sebuah makanan dibandingkan dengan catering lainnya.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- How it works block ends -->
    <!-- Featured restaurants starts -->
    <section class="featured-restaurants" style="background-color:#f4f4ef;">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4 style="font-weight:bold; font-size:28px;">Kategori Makanan</h4>
                        <hr style="border-top:1px solid black;">
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
                                $res = mysqli_query($db, "select * from package_category");
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

            <div class="row">
                <div class="restaurant-listing">
                    <?php
                    // Fetching records from the restaurant table
                    $ress = mysqli_query($db, "select * from dishes_category");
                    while ($rows = mysqli_fetch_array($ress)) {
                        // Fetch records from res_category table according to the category ID
                        $query = mysqli_query($db, "select * from package_category where c_id='" . $rows['c_id'] . "'");
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
                                <img src="' . $imageBase64 . '" alt="Restaurant logo" style="width: 100px; height:60px">
                            </a>
                        </div>
                        <!--end:col -->
                        <div class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
                            <h5><a href="dishes.php?res_id=' . $rows['rs_id'] . '">' . $rows['title'] . '</a></h5>
                            <span>' . $rows['address'] . '</span>
                            <div class="bottom-part">
                                <div class="cost"><i class="fa fa-check"></i> Mulai Rp6.000</div>
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
    <footer style="background-color:#fffff0; padding-top:70px; padding-bottom:70px">
        <div class="container" style="display:grid; grid-template-columns: 1fr 1fr 1fr 1fr">
            <div>
                <img src="images/assets/logo-footer.png" alt="Logo Footer" width="250px">
            </div>
            <div class="tentang">
                <h2 style="font-size:20px; margin-bottom:50px; color: #a3816a; font-weight:600; letter-spacing:1.5px; text-transform: uppercase;">Tentang Kami</h2>
                <div>
                    <i class="fa-solid fa-star" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Katering harian 3-4 Porsi</p>
                </div>
                <div>
                    <i class="fa-solid fa-star" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Free ongkir area Jember Kota</p>
                </div>
                <div>
                    <i class="fa-solid fa-star" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Pesan 1 hari bisa</p>
                </div>
                <div>
                    <i class="fa-solid fa-star" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Melayani pemesanan nasi kotak, tumpeng & aneka kue</p>
                </div>
                <div>
                    <i class="fa-solid fa-star" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Melayani pemesanan nasi kotak, tumpeng & aneka kue</p>
                </div>
            </div>
            <div class="kontak">
                <h2 style="font-size:20px; margin-bottom:50px; color: #a3816a; font-weight:600; letter-spacing:1.5px; text-transform: uppercase;">Hubungi Kami</h2>
                <div>
                    <i class="fa-solid fa-house" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">Jl. Gunung Lor Surabaya</p>
                </div>
                <div>
                    <i class="fa-solid fa-envelope" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">cb57catering2@gmail.com</p>
                </div>
                <div>
                    <i class="fa-brands fa-whatsapp" style="float: left; margin-right: 5px;"></i>
                    <p style="display: inline;">081234567890</p>
                </div>
            </div>
            <div class="jam">
                <h2 style="font-size:20px; margin-bottom:50px; color: #a3816a; font-weight:600; letter-spacing:1.5px; text-transform: uppercase;">Jam Operasional Kami</h2>
                <p style="display:inline">Senin - Sabtu : 08.00 -16.00</p>
                <p>Minggu & Hari Besar : Tutup</p>
            </div>
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