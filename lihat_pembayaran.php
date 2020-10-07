<?php
include 'koneksi.php';
session_start();
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay)) {
    echo "
            <script> 
                alert('Akses Ilegal');
                document.location.href='riwayatbelanja.php';
            </script>
        ";
    exit();
}
if ($_SESSION["pelanggan"]["id_pelanggan"] !== $detbay["id_pelanggan"]) {
    echo "
            <script> 
                alert('Akses Ilegal');
                document.location.href='riwayatbelanja.php';
            </script>
        ";
    exit();
}

echo "<pre>";
print_r($detbay);
echo "</pre>";
echo "</br>";
echo "<pre>";
print_r($_SESSION);
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
    <div class="container">
        <h3>Halaman Pembayaran <?= $detbay["nama"]; ?></h3><br>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <th>Nama</th>
                        <td><?= $detbay["nama"]; ?></td>
                    <tr>
                        <th>Bank</th>
                        <td><?= $detbay["bank"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $detbay["tanggal"]; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?= number_format($detbay["jumlah"]); ?> </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="bukti_pembayaran/<?= $detbay["bukti"]; ?>" alt="">
            </div>
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