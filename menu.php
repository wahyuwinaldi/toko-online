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
                <li><a href="keranjang.php"><i class="glyphicon glyphicon-shopping-cart"></i><span class="badge"></span></a></li>
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