<?php
$tanggal_mulai = "-";
$tanggal_selesai = "-";
$semuaData = [];
if (isset($_POST["kirim"])) {
    $tanggal_mulai = $_POST["tglm"];
    $tanggal_selesai = $_POST["tgls"];
    $ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'");
    while ($pecah = $ambil->fetch_assoc()) {
        $semuaData[] = $pecah;
    }
    if (empty($semuaData)) {
        echo "
                <script> 
                    alert('Tidak Ada Pembelian');
                    document.location.href='index.php?halaman=laporan';
                </script>
            ";
    }
    // echo "<pre>";
    // print_r($semuaData);
    // echo "</pre>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
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
    <h2>Laporan Pembelian dari <?= $tanggal_mulai; ?> Sampai <?= $tanggal_selesai; ?></h2>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="tglm">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="tglm" value="<?= $tanggal_mulai; ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="tgls">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="tgls" value="<?= $tanggal_selesai; ?>">
                </div>
            </div>
            <div class="col-md-2">
                <label for="">&nbsp</label><br>
                <button name="kirim" class="btn btn-primary">Kirim</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $total = 0;
            foreach ($semuaData as $pecahData) : ?>
                <?php $total += $pecahData["total_pembelian"]; ?>
                <tr>
                    <td><?= $nomor; ?></td>
                    <td><?= $pecahData["nama_pelanggan"]; ?></td>
                    <td><?= $pecahData["tanggal_pembelian"]; ?></td>
                    <td>Rp. <?= number_format($pecahData["total_pembelian"]); ?></td>
                    <td><?= $pecahData["status_pembelian"]; ?></td>
                </tr>
                <?php $nomor++; ?>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total</th>
                <th>Rp. <?= number_format($total); ?></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
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