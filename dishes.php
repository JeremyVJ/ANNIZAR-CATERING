<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
include_once 'product-action.php'; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/assets/logo-icon.png">
    <title>Menu Makanan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/style-fix.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-" crossorigin="anonymous" />
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
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Pilih Kategori Makanan</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>">Pilih Menu</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->

        <!-- start: Inner page hero -->
        <?php $ress = mysqli_query($db, "select * from dishes_category where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);

        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/ketring.jpg">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows['image']) . '" alt="Image">'; ?></figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                                <ul class="nav nav-inline">
                                    <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Mulai Rp.6000</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                                    <li class="nav-item ratings">
                                        <a class="nav-link" href="#">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end:Inner page hero -->
        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Keranjang Kamu
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;

                                foreach ($_SESSION["cart_item"] as $item)  // fetch items define current into session ID
                                {
                                ?>

                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-12">
                                            <div class="title-row">
                                                <?php echo $item["title"]; ?><a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">

                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "Rp" . $item["price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>
                                        <div class="col-xs-2" style="margin-top: 10px">
                                            <i class="fa fa-trash pull-right"></i></a>
                                        </div>

                                    </div>

                                <?php
                                    $item_total += ($item["price"] * $item["quantity"]); // calculating current price into cart
                                }
                                ?>
                            </div>
                        </div>

                        <!-- end:Order row -->

                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "Rp. " . $item_total; ?></strong></h3>
                                <p>Gratis Ongkir</p>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn theme-btn btn-lg">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">

                    <!-- end:Widget menu -->
                    <div class="menu-widget" id="2" style="padding-bottom:100px">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Silahkan Pilih <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php  // display values and item of food/dishes
                            $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                            ?>
                                    <div class="food-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-6">
                                                <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                    <div class="rest-logo pull-left">
                                                        <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="image" style="width: 200px; height:70px;">'; ?></a>
                                                    </div>
                                                    <!-- end:Logo -->
                                                    <div class="rest-descr">
                                                        <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                        <p> <?php echo $product['slogan']; ?></p>
                                                    </div>
                                                    <!-- end:Description -->
                                            </div>
                                            <!-- end:col -->
                                            <div class="col-xs-12 col-sm-12 col-lg-6 pull-right item-cart-info">
                                                <span class="price pull-left">Rp <?php echo $product['price']; ?></span>
                                                <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1" size="2" />
                                                <input type="submit" class="btn theme-btn" style="margin-left:40px;" value="Keranjang" />
                                            </div>
                                            </form>
                                        </div>
                                        <!-- end:row -->
                                    </div>
                                    <!-- end:Food item -->

                            <?php
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <!-- end:Bar -->
                <div class="col-xs-12 col-md-12 col-lg-3">
                    <div class="sidebar-wrap">
                        <div class="widget clearfix">
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:Right Sidebar -->
        </div>
        <!-- end:row -->
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
    <!--/end:Site wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="order-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                <div class="modal-body cart-addon">
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect2">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 2.49</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect3">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 1.99</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect5">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-4">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                    <div class="food-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-lg-6">
                                <div class="item-img pull-left">
                                    <a class="restaurant-logo pull-left" href="#"><img src="http://placehold.it/70x70" alt="Food logo"></a>
                                </div>
                                <!-- end:Logo -->
                                <div class="rest-descr">
                                    <h6><a href="#">Sandwich de Alegranza Grande Menü (28 - 30 cm.)</a></h6>
                                </div>
                                <!-- end:Description -->
                            </div>
                            <!-- end:col -->
                            <div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> <span class="price pull-left">$ 3.15</span></div>
                            <div class="col-xs-6 col-sm-4 col-lg-4">
                                <div class="row no-gutter">
                                    <div class="col-xs-7">
                                        <select class="form-control b-r-0" id="exampleSelect6">
                                            <option>Size SM</option>
                                            <option>Size LG</option>
                                            <option>Size XL</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-5">
                                        <input class="form-control" type="number" value="0" id="quant-input-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn theme-btn">Add to cart</button>
                </div>
            </div>
        </div>
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