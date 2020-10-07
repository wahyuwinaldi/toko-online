<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  <title>Document</title>
</head>

<body>
  <?php include 'menu.php'; ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>Silahkan Daftar Akun.</h3>
            </div>
            <div class="panel-body">
              <?php


              if (isset($_POST["daftar"])) {
                $nama = $_POST['nama'];
                $email = strtolower(stripslashes($_POST['email']));
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $telepon = $_POST['telepon'];
                $alamat = $_POST['alamat'];
                // ambil data dari database
                $ambil = $koneksi->query("SELECT email_pelanggan FROM pelanggan WHERE email_pelanggan = '$email'");
                $yangcocok = $ambil->fetch_assoc();

                if ($password !== $repassword) {
                  echo "
                  <script>
                  alert('Konfirmasi password salah');
                  document.location.href='daftarpelanggan.php';
                  </script>";
                  exit;
                }
                if ($ambil->num_rows === 1) {
                  echo "<script>alert('Email Sudah terdaftar');
                  document.location.href='daftarpelanggan.php';
                  </script>";
                } else {
                  $password = password_hash($password, PASSWORD_DEFAULT);
                  var_dump($password);
                  $query = $koneksi->query("INSERT INTO pelanggan VALUES ('','$email','$password','$nama','$alamat','$telepon')");
                  if ($query = true) {
                    echo "<script>alert('User baru berhasil di registrasi');
                    document.location.href='loginpelanggan.php';
                    </script>";
                  }
                }
              }
              ?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input id="nama" name="nama" type="text" class="form-control" placeholder="nama lengkap">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input name="email" id="email" type="text" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="password">
                </div>
                <div class="form-group">
                  <label for="repassword">Konfirmasi Password</label>
                  <input name="repassword" id="repassword" type="password" class="form-control" placeholder="konfirmasi password">
                </div>
                <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input name="telepon" id="telepon" type="text" class="form-control" placeholder="telepon">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" placeholder="alamat lengkap" class="form-control"></textarea>
                </div>
                <button name="daftar" class="btn btn-primary">Daftar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</body>

</html>