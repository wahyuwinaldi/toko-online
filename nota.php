<?php
session_start();
include 'koneksi.php';


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
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>

<body>
    <?php include 'menu.php'; ?>

    <section class="konten">
        <div class="container">
            <div class="row">
                <h3>Detail Pengiriman</h3>
                <?php
                $id = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$id'");
                $detail = $ambil->fetch_assoc();
                echo "<pre>";
                print_r($detail);
                echo "</pre>";
                echo "<pre>";
                print_r($_SESSION);
                echo "</pre>";

                $yangbeli = $detail["id_pelanggan"];
                $yanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
                if ($yangbeli !== $yanglogin) {
                    echo "
                                <script> 
                                    alert('Akses Ilegal!!');
                                    </script>";
                }

                ?>

                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <strong>Tanggal : <?php echo $detail["tanggal_pembelian"]; ?></strong><br>
                    <p> <strong>Total : Rp. <?php echo number_format($detail["total_pembelian"]); ?></strong></p>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <p>
                        <strong><?php echo $detail["nama_pelanggan"]; ?></strong><br>
                        Telepon : <?php echo $detail["telepon_pelanggan"]; ?> <br>
                        Email : <?php echo $detail["email_pelanggan"]; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    <p>
                        Nama Kota : <?= $detail["nama_kota"]; ?> <br>
                        Alamat Pegiriman : <?= $detail["alamat"]; ?> <br>
                        Ongkir : Rp. <?= number_format($detail["tarif"]); ?> <br>
                    </p>
                </div>




                <div class="row">
                    <div class="col-md-12">
                        <h3>Detail Pembelian</h3>

                        <div class="table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Berat Produk</th>
                                        <th>Jumlah Produk</th>
                                        <th>Sub Berat</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian ='$id'");
                                    $nomor = 1;
                                    // $pecah = $ambil->fetch_assoc();
                                    // echo "<pre>";
                                    // print_r($ambil);
                                    // echo "</pre>";

                                    ?>
                                    <?php while ($pecah = $ambil->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?php echo $nomor ?></td>
                                            <td><?php echo $pecah["nama"]; ?></td>
                                            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
                                            <td><?= $pecah["berat"]; ?> Gr.</td>
                                            <td><?php echo $pecah["jumlah"]; ?> Unit</td>
                                            <td><?= $pecah["sub_berat"]; ?> Gr.</td>
                                            <td>Rp. <?= number_format($pecah["sub_harga"]); ?></td>

                                        </tr>
                                        <?php $nomor++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="alert alert-info">
                    <p>Silahkan melakukan pembayaran Rp. <?= number_format($detail['total_pembelian']); ?> Ke <br>
                    </p>
                    <strong>BANK BNI 152-001088-375 AN. Wahyu Winaldi</strong>
                </div>
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