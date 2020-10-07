<?php
session_start();
include "koneksi.php";
$id_pem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");
$det_pem = $ambil->fetch_assoc();
echo "<pre>";
print_r($det_pem);
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
    <?php
    if (isset($_POST['kirim'])) {
        var_dump($_POST);
        echo "<br>";
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        // gambar yang diupload
        $bukti = $_FILES["bukti"]["name"];
        $ukuranFile = $_FILES["bukti"]["size"];
        $error = $_FILES["bukti"]["error"];
        $tmpName = $_FILES["bukti"]["tmp_name"];
        // cek apakah gambar sudah di upload
        if ($error === 4) {
            echo "<script>
            alert('Silahkan masukan gambar terlebih dahulu!');
            </script>";
        }
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $bukti);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
            <script>
            alert('yang anda upload bukan gambar');
            </script>
            ";
            exit();
        }

        if ($ukuranFile >= 1000000) {
            echo "
            <script>
            alert('ukuran gambar terlalu besar, maximal ukuran 1MB');
            </script>
            ";
        }

        $buktibaru = uniqid();
        $buktibaru .= ".";
        $buktibaru .= $ekstensiGambar;
        $tanggal = date('Y-m-d');
        move_uploaded_file($tmpName, 'bukti_pembayaran/' . $buktibaru);

        $queri = $koneksi->query("INSERT INTO pembayaran VALUES('','$id_pem','$nama','$bank','$jumlah','$tanggal','$buktibaru')");

        $ready = $koneksi->query("UPDATE pembelian SET status_pembelian = 'sudah bayar' WHERE id_pembelian = '$id_pem'");
        if ($ready = true) {
            echo " <script>
            alert('Terima kasih sudah mengirimkan bukti pemayaran');
            document.location.href='riwayatbelanja.php';
            </script>";
        }
    }
    ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h2 class="text-center">Form Bukti Pembayaran</h2><br>
                    <p>Kirim bukti pembayaran anda disini!</p>
                    <div class="alert alert-info">total tagihan anda <strong>Rp. <?= number_format($det_pem["total_pembelian"]); ?></strong> </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama Penyetor</label>
                            <input id="nama" type="text" class="form-control" placeholder="nama penyetor" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="bank">Bank</label>
                            <input id="bank" type="text" class="form-control" placeholder="Bank" name="bank" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input id="jumlah" type="number" class="form-control" placeholder="Rp..." name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="bukti">Struk Bukti</label>
                            <input id="bukti" type="file" class="form-control" name="bukti">
                            <p style="color: red;">Silahkan masukan bukti pembayaran dengan format(jpg,png,jpeg)</p>
                        </div>
                        <button name="kirim" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
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