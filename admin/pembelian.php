<h2>Halaman Pembelian</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Status Pembelian</th>
			<th>Total Pembelian</th>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php
		$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan");
		$nomor = 1;
		while ($pecah = $ambil->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $nomor ?></td>
				<td><?php echo $pecah["nama_pelanggan"]; ?></td>
				<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
				<td><?= $pecah["status_pembelian"]; ?></td>
				<td>Rp. <?php echo number_format($pecah["total_pembelian"]); ?></td>
				<td>
					<a class="btn btn-info" href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?> ">Detail</a>
					<?php if ($pecah["status_pembelian"] !== "pending") : ?>
						<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Pembayaran</a>
					<?php endif ?>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>