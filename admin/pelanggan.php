<h2>Halaman pelanggan</h2>
<table class="table table-bordered">
	<thead>
		<th>No</th>
		<th>Email Pelanggan</th>
		<th>Nama Pelanggan</th>
		<th>Telepon Pelanggan</th>
		<th>Aksi</th>
	</thead>
	<tbody>
	<?php 
		$ambil = $koneksi->query("SELECT * FROM pelanggan");
		$nomor = 1;
		while ($pecah = $ambil->fetch_assoc()) {
	?>
	<tr>
		<td><?php echo $nomor ?></td>
		<td><?php echo $pecah["email_pelanggan"]; ?></td>
		<td><?php echo $pecah["nama_pelanggan"]; ?></td>
		<td><?php echo $pecah["telepon_pelanggan"]; ?></td>
		<td><a href=""><button class="btn btn-danger">Hapus</button></a></td>
		<?php $nomor++; ?>
		<?php } ?>
	</tr>
	</tbody>
</table>