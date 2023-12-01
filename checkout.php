<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {

    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {
            $user_id = $_SESSION["user_id"];
            $user_query = mysqli_query($db, "SELECT username FROM users WHERE u_id = '$user_id'");
            $user_data = mysqli_fetch_assoc($user_query);
            $username = $user_data['username'];

            $SQL = "INSERT INTO users_orders(u_id, title, quantity, price) VALUES ('$user_id', '" . $item["title"] . "', '" . $item["quantity"] . "', '" . $item["price"] . "')";
            mysqli_query($db, $SQL);

            $payment_method = $_POST['mod']; // Mendapatkan metode pembayaran yang dipilih

            // Cek metode pembayaran, jika "Transfer" maka arahkan ke WhatsApp
            if ($payment_method == "paypal") {
                $whatsapp_message = 'Saya ingin membayar pesanan atas nama, ' . $username;

                $whatsappLink = 'https://api.whatsapp.com/send?phone=6281333895215&text=' . urlencode($whatsapp_message);
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "' . $whatsappLink . '";
                    }, 2000);
                </script>';
            } else {
                // Jika metode pembayaran "Tunai," tidak melakukan redirect ke WhatsApp
                $success = "Thank you! Your order has been placed successfully!";
                // Tambahkan logika atau pesan lain sesuai kebutuhan
            }
        }
    }

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
        <link href="css/index.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style-fix.css" rel="stylesheet">
    </head>

    <body>

        <div class="site-wrapper">
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
                <div class="top-links">
                    <div class="container">
                        <ul class="row links">

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Order and Pay online</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>

                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">
                            <div class="widget-body">
                                <form method="post" action="">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Checkout</h4>
                                                </div>
                                                <div class="cart-totals-fields">

                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Harga</td>
                                                                <td> <?php echo "Rp. " . $item_total; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ongkos Kirim</td>
                                                                <td>Gratis Ongkir</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-color"><strong>Total Bayar</strong></td>
                                                                <td class="text-color"><strong> <?php echo "Rp. " . $item_total; ?></strong></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--cart summary-->
                                            <div class="payment-option">
                                                <ul class=" list-unstyled">
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-20">
                                                            <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Tunai</span>
                                                            <br> <span>Pembayaran Tunai dilakukan pada saat kurir telah sampai dilokasi pengiriman</span> </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-10">
                                                            <input name="mod" type="radio" value="paypal" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Transfer</span>
                                                            <br><span>Pembayaran via Transfer dapat dilakukan via whatsapp nomor Admin</span> </label>
                                                    </li>
                                                </ul>
                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Pesan Sekarang"> </p>
                                            </div>
                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>
        <!-- start: FOOTER -->
        <footer style="background-color:#fffff0; padding-top:70px; padding-bottom:40px">
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
        </div>
        <!-- end:page wrapper -->
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