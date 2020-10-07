<?php
session_start();
include 'koneksi.php';
$id_produk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
$detail = $ambil->fetch_assoc();
echo "<pre>";
print_r($detail);
echo "</pre>";
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
    <!-- panel -->
    <div class="container">
        <div class="row panel">
            <div class="col-md-offset-2 col-md-4">
                <img src="admin/foto/<?= $detail["foto_produk"]; ?> " class="img-responsive" alt="">
            </div>
            <div class="col-md-4">
                <h2><?= $detail["nama_produk"]; ?></h2>
                <h4>Rp. <?= number_format($detail["harga_produk"]); ?></h4>
                <strong>Stok produk : <?= $detail["stok_produk"]; ?> </strong>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" name="jumlah" class="form-control" min="1" max="<?= $detail['stok_produk']; ?>">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary" name="beli">Beli</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['beli'])) {
                    $jumlah = $_POST['jumlah'];
                    $_SESSION['keranjang'][$id_produk] = $jumlah;
                    echo "
                    <script> 
                    alert('Barang Berhasil Masuk Keranjang ');
                        document.location.href='keranjang.php';
                    </script>
                 ";
                    var_dump($_POST);
                }
                ?>
                <p><?= $detail["deskripsi_produk"]; ?></p>
            </div>
        </div>
    </div>
    <!-- akhir Panel -->

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