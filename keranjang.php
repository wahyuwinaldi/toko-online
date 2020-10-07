<?php
session_start();
include 'koneksi.php';
if (empty($_SESSION['keranjang']) or !isset($_SESSION['keranjang'])) {
  echo "<script> 
    alert('silahkan belanja terlebih dahulu');
    document.location.href='index.php';
    </script>";
}
$total = 0;
foreach ($_SESSION['keranjang'] as $id => $value) :
?>
  <?php $notif = $total += $value ?>
<?php endforeach ?>
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
          <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i><span class="badge"><?= $total; ?></span></a></li>

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


  <!-- table keranjang -->
  <div class="container">
    <h1>Keranjang Belanja</h1>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
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
            <td><a href="hapuskeranjang.php?id=<?= $id ?>" class="btn btn-danger">Hapus</a></td>
          </tr>
          <?php $nomor++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
    <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
    <a href="checkout.php" class="btn btn-primary">Checkout</a>
  </div>
  <!-- akhir table keranjang -->


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