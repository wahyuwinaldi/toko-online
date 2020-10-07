<?php
include 'koneksi.php';
$semuaData = [];
$keyword = $_GET["keyword"];
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%'");
while ($cari = $ambil->fetch_assoc()) {
    $semuaData[] = $cari;
}
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
    <?php include 'menu.php'; ?>

    <!-- card produk -->
    <div class="container">
        <?php if (empty($semuaData)) : ?>
            <div class="alert alert-danger">
                <h5>Data yang anda cari tidak ditemukan</h5>
            </div>
        <?php endif ?>
        <div class="row">

            <?php
            foreach ($semuaData as $pecahData) :
            ?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="admin/foto/<?= $pecahData["foto_produk"]; ?> " alt="foto">
                        <div class="caption">
                            <h3><?= $pecahData["nama_produk"]; ?></h3>
                            <?php if ($pecahData["stok_produk"] == 0) : ?>
                                <br>
                                &nbsp;
                                &nbsp;
                                <br>
                                <strong class="btn btn-danger">SOLD OUT</strong>
                            <?php else : ?>
                                <h5>Stok produk : <?= $pecahData["stok_produk"]; ?></h5>
                                <h5>Rp.<?= number_format($pecahData["harga_produk"]); ?> </h5>
                                <a href="beli.php?id=<?= $pecahData["id_produk"]; ?>" class="btn btn-primary">Beli</a>
                                <a href="detail.php?id=<?= $pecahData["id_produk"]; ?> " class="btn btn-default">Detail</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
        </div>
    </div>

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