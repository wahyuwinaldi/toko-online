<?php
session_start();

include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM produk");


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toko Online</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <?php
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    $jml = 0;
    $notif = [];
    if (isset($_SESSION['keranjang'])) : ?>
        <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) : ?>
            <?php $notif = $jml += $jumlah; ?>
        <?php endforeach ?>
    <?php endif ?>

    <!-- navbar -->
    <div class="nav navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="" class="navbar-brand">Toko Online</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="navbar-form navbar-right">
                    <form action="cari.php" method="get">
                        <div class="form-group">
                            <input type="text" autofocus autocomplete="off" class="form-control" name="keyword" placeholder="Search Product">
                            <button name="cari" class="btn btn-primary">Search!</button>
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <?php if (!empty($notif)) : ?>
                        <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i><span class="badge"> <?= $notif; ?></span></a></li>
                    <?php else : ?>
                        <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i><span class="badge"></span></a></li>
                    <?php endif ?>
                    <li><a href="checkout.php">Checkout</a></li>
                    <?php if (!isset($_SESSION['pelanggan'])) : ?>
                        <li><a href="loginpelanggan.php"><i class="glyphicon glyphicon-user"></i> Login</a></li>
                    <?php else : ?>
                        <li><a href="riwayatbelanja.php">Riwayat Belanja</a></li>
                        <li><a href="logout.php"><i class="glyphicon glyphicon-user"></i> Logut</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <!-- akhir navbar -->
    <!-- card produk -->
    <div class="container">
        <div class="row">

            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                <div class="col-sm-3">
                    <div class="thumbnail">

                        <img src="admin/foto/<?= $pecah["foto_produk"]; ?> " alt="foto">
                        <div class="caption">
                            <h3><?= $pecah["nama_produk"]; ?></h3>
                            <?php if ($pecah["stok_produk"] == 0) : ?>
                                <h5>&nbsp;</h5>
                                <h5>&nbsp;</h5>
                                <strong class="btn btn-danger">SOLD OUT</strong>
                            <?php else : ?>
                                <h5>Stok produk : <?= $pecah["stok_produk"]; ?></h5>
                                <h5>Rp.<?= number_format($pecah["harga_produk"]); ?> </h5>
                                <a href="beli.php?id=<?= $pecah["id_produk"]; ?>" class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?= $pecah["id_produk"]; ?> " class="btn btn-default">Detail</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- akhir card produk -->





    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>

</html>