<?php
session_start();

if (isset($_SESSION['login'])) {
  header("location: index.php");
}

$koneksi = new mysqli("localhost", "root", "", "toko_online");
if ($koneksi->connect_error) {
  die("Koneksi Galal:" . $koneksi->connect_error);
}

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $ambil = $koneksi->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
  if ($ambil->num_rows === 1) {
    $cocok = $ambil->fetch_assoc();
    $_SESSION['login'] = true;
    echo "<script> 
          alert('Login Sukses');
          document.location.href='index.php';
        </script>";
  } else {
    echo "<script> 
          alert('Data tidak ditemukan');
          document.location.href='login.php';
        </script>";
  }
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
  <link rel="stylesheet" href="assets/ css/stylesheet.css">
</head>

<body>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="text-center judulform">Login Administrator</h3>
          </div>
          <div class="panel-body">
            <form action="" method="POST">

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control baris">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control baris">
              </div>
              <button class="btn btn-primary" type="submit" name="login">Login</button>
              <p class="text-center">"Gunakan Waktumu Sebaik Mungkin"</p>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>





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