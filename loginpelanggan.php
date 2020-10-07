<?php
session_start();
include 'koneksi.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $koneksi->real_escape_string($_POST['password']);
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
    $baris = $ambil->num_rows;
    $akun = $ambil->fetch_assoc();
    // echo  password_hash($password, PASSWORD_DEFAULT);
    if ($baris === 1) {
        echo "<pre>";

        var_dump($akun["password_pelanggan"]);
        print_r($akun);
        echo "</pre>";
        $check = password_verify($password, $akun['password_pelanggan']);
        if (password_verify($password, $akun["password_pelanggan"])) {
            $_SESSION["pelanggan"] = $akun;

            echo "
                         <script> 
                            alert('Login Berhasil');
                        </script>
                    ";
            if (isset($_SESSION["keranjang"])) {
                echo "<script>document.location.href='checkout.php';</script>";
            } else {
                echo "<script>document.location.href='riwayatbelanja.php';</script>";
            }
        }
    } else {
        echo "
		 			<script> 
						alert('Login Gagal');
						document.location.href='loginpelanggan.php';
					</script>
				";
    }
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
    <link rel="stylesheet" href="admin/assets/css/style.css">
</head>

<body>
    <?php include 'menu.php'; ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Login</h3>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                                <p class="text-center">belum punya akun?<a href="daftarpelanggan.php">klik disini</a></p>
                            </form>
                        </div>
                    </div>
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