<h2>Detail Pembelian</h2>
<?php
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();


?>
<!-- <pre><//?php print_r($detail) ?></pre> -->
<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal : <?php echo $detail["tanggal_pembelian"]; ?> <br>
			Total : <strong>Rp. <?php echo number_format($detail["total_pembelian"]); ?></strong><br>
			Status Pembelian : <strong><?= $detail["status_pembelian"]; ?></strong>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<p>
			Nama : <strong><?= $detail["nama_pelanggan"]; ?></strong> <br>
			Telepon : <?php echo $detail["telepon_pelanggan"]; ?> <br>
			Email : <?php echo $detail["email_pelanggan"]; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Pengiriman</h3>
		<p>
			Kota : <?= $detail["nama_kota"]; ?><br>
			Alamat : <?= $detail["alamat"]; ?><br>
			Tarif : Rp. <?= number_format($detail["tarif"]); ?>
		</p>

	</div>
</div>




<br>
<div class="table">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga Produk</th>
				<th>Jumlah Produk</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk = produk.id_produk WHERE pembelian_produk.id_pembelian ='$_GET[id]'");
			$nomor = 1;
			// $pecah = $ambil->fetch_assoc();

			?>
			<?php while ($pecah = $ambil->fetch_assoc()) {
			?>
				<tr>
					<td><?php echo $nomor ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $pecah["jumlah"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"] * $pecah["jumlah"]); ?></td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>