<?php
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembayaran  WHERE id_pembelian = '$id_pembelian'");
$pecah = $ambil->fetch_assoc();
echo "<pre>";
print_r($pecah);
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
        <h2>Detail Pembayaran</h2><br>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped">
                    <tr>
                        <th>Nama</th>
                        <td><?= $pecah["nama"]; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?= $pecah["bank"]; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td><?= $pecah["jumlah"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?= $pecah["tanggal"]; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" src="../bukti_pembayaran/<?php echo $pecah["bukti"]; ?>" alt="">
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="form-group">
            <label for="resi">No. Resi</label>
            <input type="text" class="form-control" name="resi">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="">Pilih Status</option>
                <option value="lunas">Lunas</option>
                <option value="barang dikirim">Barang Dikirim</option>
                <option value="batal">Batal</option>
            </select>
        </div>
        <button class="btn btn-primary" name="proses">Proses</button>
    </form>

    <?php
    $id = $_GET['id'];
    if (isset($_POST["proses"])) {
        $resi = $_POST["resi"];
        $status = $_POST["status"];

        $update = $koneksi->query("UPDATE pembelian SET resi_pengiriman = '$resi',status_pembelian = '$status' WHERE id_pembelian = '$id'");
        if ($update = true) {
            echo "
            <script> 
               alert('Data Pembelian Terupdate');
               document.location.href='index.php?halaman=pembelian';
           </script>
       ";
        }
    }

    ?>

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