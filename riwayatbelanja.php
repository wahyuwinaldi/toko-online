<?php
session_start();
include "koneksi.php";


if (!isset($_SESSION["pelanggan"])) {
    echo "
            <script> 
                alert('Anda harus login terlebih dahulu');
                document.location.href='loginpelanggan.php';
            </script>
        ";
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

    <section>
        <div class="container">
            <h3>Riwayat Belanja <?= $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Opsi</th>
                </thead>
                <?php
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$id_pelanggan'");

                // $pecah = $ambil->fetch_assoc();
                // echo "<pre>";
                // print_r($pecah);
                // echo "</pre>";
                $nomor = 1;
                while ($pecah = $ambil->fetch_assoc()) {
                ?>
                    <tbody>
                        <td><?= $nomor; ?></td>
                        <td><?= $pecah["tanggal_pembelian"]; ?></td>
                        <td>
                            <?= $pecah["status_pembelian"]; ?>
                            <br>
                            <?php if (!empty($pecah["resi_pengiriman"])) : ?>
                                Resi : <?= $pecah["resi_pengiriman"]; ?>
                            <?php endif ?>
                        </td>
                        <td>Rp. <?= number_format($pecah["total_pembelian"]); ?></td>
                        <td>
                            <a href="nota.php?id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-primary">Nota</a>
                            <?php if ($pecah["status_pembelian"] == "pending") : ?>
                                <a href="pembayaran.php?id=<?= $pecah["id_pembelian"]; ?>" class="btn btn-success">Input Pembayaran</a>
                            <?php else : ?>
                                <a class="btn btn-warning" href="lihat_pembayaran.php?id=<?= $pecah["id_pembelian"]; ?>">Lihat Pembayaran</a>
                            <?php endif  ?>
                        </td>
                    </tbody>
                    <?php $nomor++; ?>
                <?php } ?>
            </table>
        </div>
    </section>


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