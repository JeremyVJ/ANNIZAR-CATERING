<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id']))  //if usser is not login redirected baack to login page
{
    header('location:login.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/assets/logo-icon.png">
        <title>Keranjang</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style-fix.css" rel="stylesheet">
        <link rel="stylesheet" href="css/keranjang.css">

    </head>

    <body>

        <!--header starts-->
        <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav style="background-color:#fffff0;">
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
        <div class="page-wrapper">
            <!-- top Links -->

            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/ketring.jpg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                </div>
            </div>
            <!-- //results show -->
            <section style="margin-bottom:100px" class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                            <!--Start Widget-->
                            <div class="widget clearfix">
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
                                        <li> <a href="dishes.php?res_id=48" class="tag">
                                                Nasi
                                            </a> </li>
                                        <li> <a href="dishes.php?res_id=49" class="tag">
                                                Lauk
                                            </a> </li>
                                        <li> <a href="dishes.php?res_id=50" class="tag">
                                                Penyetan
                                            </a> </li>
                                        <li> <a href="dishes.php?res_id=51" class="tag">
                                                Minuman
                                            </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end:Widget -->
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pesanan</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // displaying current session user login orders 
                                    $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                    if (!mysqli_num_rows($query_res) > 0) {
                                        echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                    } else {

                                        while ($row = mysqli_fetch_array($query_res)) {

                                    ?>
                                            <tr>
                                                <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                <td data-column="price">Rp. <?php echo $row['price']; ?></td>
                                                <td data-column="status">
                                                    <?php
                                                    $status = $row['status'];
                                                    if ($status == "" or $status == "NULL") {
                                                    ?>
                                                        <button type="button" class="btn btn-info" style="font-weight:bold;"> Proses</button>
                                                    <?php
                                                    }
                                                    if ($status == "in process") { ?>
                                                        <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span> Dalam Pengiriman</button>
                                                    <?php
                                                    }
                                                    if ($status == "closed") {
                                                    ?>
                                                        <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"> Pesanan Sampai</button>
                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($status == "rejected") {
                                                    ?>
                                                        <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Dibatalkan</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--end:row -->
                    </div>
                </div>
        </div>
        </div>
        </div>
        </section>
        <!-- start: FOOTER -->
<footer style="background-color: #fffff0; padding-top: 70px; padding-bottom: 70px">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
    <div class="container" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        <div>
            <img src="images/assets/logo-footer.png" alt="Logo Footer" width="250px">
        </div>
        <div class="tentang">
            <h2 style="font-size: 20px; margin-bottom: 50px; color: #a3816a; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase;">Tentang Kami</h2>
            <div>
                <p><i class="fa-solid fa-star" style="margin-right: 5px;"></i>Katering harian 3-4 Porsi</p>
            </div>
            <div>
                <p><i class="fa-solid fa-star" style="margin-right: 5px;"></i>Free ongkir area Situbondo Kota</p>
            </div>
            <div>
                <p><i class="fa-solid fa-star" style="margin-right: 5px;"></i>Pesan minimal h-1 hari</p>
            </div>
            <div>
                <p><i class="fa-solid fa-star" style="margin-right: 5px;"></i>Melayani pemesanan nasi kotak, tumpeng & aneka kue</p>
            </div>
            <div>
                <p><i class="fa-solid fa-star" style="margin-right: 5px;"></i>Melayani paket prasmanan acara</p>
            </div>
        </div>
        <div class="kontak">
            <h2 style="font-size: 20px; margin-bottom: 50px; color: #a3816a; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase;">Hubungi Kami</h2>
            <div>
                <p><i class="fa-solid fa-house" style="margin-right: 5px;"></i>Jl. Merak Gg. Baru No.15, Plosoan, Patokan, Kec. Situbondo, Kabupaten Situbondo</p>
            </div>
            <div>
                <p><i class="fa-solid fa-envelope" style="margin-right: 5px; margin-top: 10px;"></i>cateringanizzar@gmail.com</p>
            </div>
            <div>
                <p><i class="fa-brands fa-whatsapp" style="margin-right: 5px;"></i>081333895215</p>
            </div>
        </div>
        <div class="jam">
            <h2 style="font-size: 20px; margin-bottom: 50px; color: #a3816a; font-weight: 600; letter-spacing: 1.5px; text-transform: uppercase;">Jam Operasional Kami</h2>
            <p style="display: inline; font-weight: bold;">Buka 24 Jam Setiap Hari</p>
            <p>Libur Nasional & Hari Besar: Tutup</p>
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
<?php
}
?>