<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['pelanggan'])) {
    echo "
<script> 
   alert('Silahkan Login terlebih dahulu');
   document.location.href='loginpelanggan.php';
</script>
";
}

if (!isset($_SESSION['keranjang'])) {
    echo "
<script> 
   alert('Silahkan Belanja terlebih dahulu');
   document.location.href='index.php';
</script>
";
}

echo "<pre>";
print_r($_SESSION["pelanggan"]);
echo "</pre>";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Admin</title>
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
    <link rel="stylesheet" href="assets/ css/stylesheet.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <!-- table -->
    <div class="container">
        <!-- <h1>Keranjang Belanja</h1> -->
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $totalbelanja = 0; ?>
                <?php foreach ($_SESSION['keranjang'] as $id => $jumlah) : ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id'");
                    $pecah = $ambil->fetch_assoc();
                    $sub_harga = $pecah["harga_produk"] * $jumlah;
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $pecah["nama_produk"]; ?></td>
                        <td>Rp . <?= number_format($pecah["harga_produk"]); ?></td>
                        <td><?= $jumlah; ?></td>
                        <td>Rp. <?= number_format($sub_harga); ?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja += $sub_harga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Harga</th>
                    <th>Rp. <?= number_format($totalbelanja); ?></th>
                </tr>
            </tfoot>
        </table>


        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?= $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="id_ongkir" id="" class="form-control">
                            <option value="">Pilih Ongkir</option>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM ongkir");
                            while ($pecah = $ambil->fetch_assoc()) { ?>
                                <option value="<?= $pecah["id_ongkir"]; ?>">
                                    <?= $pecah["nama_kota"]; ?> -
                                    Rp. <?= number_format($pecah["tarif"]); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat Lengkap Pengiriman</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukan alamat lengkap (Kode Pos)"></textarea>
            </div>
            <button name="checkout" class="btn btn-primary">Checkout</button>
        </form>
        <?php
        if (isset($_POST["checkout"])) {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            // var_dump($id_pelanggan);
            $tanggalPembelian = date("Y-m-d");
            $id_ongkir = $_POST["id_ongkir"];
            $alamat = $_POST["alamat"];
            if (empty($id_ongkir)) {
                echo "<script> 
                alert('silahkan tentukan ogkos kirim');
                document.location.href='checkout.php';
                </script>";
                exit;
            } elseif (empty($alamat)) {
                echo "<script> 
                alert('silahkan tentukan Alamat lengkap pengiriman');
                document.location.href='checkout.php';
                </script>";
                exit;
            }
            // var_dump($_POST);
            // exit;
            $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $tarif = $arrayongkir["tarif"];
            $nama_kota = $arrayongkir["nama_kota"];
            // echo "<pre>";
            // print_r($arrayongkir);
            // echo "</pre>";


            $totalpembelian = $totalbelanja + $tarif;
            // echo "$totalpembelian";
            $query = $koneksi->query("INSERT INTO pembelian VALUES ('','$id_pelanggan','$id_ongkir','$nama_kota','$alamat','$tarif','$tanggalPembelian','$totalpembelian','pending','')");
            // var_dump($query);
            $id_pembelian_barusan = $koneksi->insert_id;
            // var_dump($id_pembelian_barusan);
            // exit;
            foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {
                $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_produk'");
                $perproduk = $ambil->fetch_assoc();
                $nama = $perproduk["nama_produk"];
                $harga = $perproduk["harga_produk"];
                $berat = $perproduk["berat_produk"];
                $subberat = $berat * $jumlah;
                $subharga = $harga * $jumlah;
                $koneksi->query("INSERT INTO pembelian_produk VALUES('','$id_pembelian_barusan','$id_produk','$nama','$harga','$berat','$subberat','$subharga','$jumlah')");

                // Update jumlah stok produk dengan dikurangi dengan jumlah jika melakukan pembelian 
                $koneksi->query("UPDATE produk SET stok_produk = stok_produk -$jumlah WHERE id_produk = '$id_produk'");
            }

            unset($_SESSION["keranjang"]);
            echo "<script> 
            alert('Pembelian sukses');
            document.location.href='nota.php?id=$id_pembelian_barusan';
            </script>";
        }


        ?>
    </div>
    <!-- akgir table -->




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