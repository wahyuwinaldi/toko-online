<h2>Halaman Produk</h2>

<table class="table table-bordered">
	<thead>
		<th>No</th>
		<th>Nama Produk</th>
		<th>Kategori</th>
		<th>Harga Produk</th>
		<th>Berat Produk</th>
		<th>Foto Produk</th>
		<th>Deskripsi Produk</th>
		<th>Stok Produk</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<a href="index.php?halaman=tambah" class="btn btn-success" style="margin-bottom: 5px;">Tambah Data</a>
		<?php
		$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori");
		$nomor = 1;
		while ($pecah = $ambil->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $nomor ?></td>
				<td><?= $pecah['nama_produk']; ?></td>
				<td><?= $pecah['nama_kategori']; ?></td>
				<td><?= $pecah['harga_produk']; ?></td>
				<td><?= $pecah['berat_produk']; ?></td>
				<td><img width="100px" src="foto/<?= $pecah['foto_produk']; ?>"></td>
				<td><?= $pecah['deskripsi_produk']; ?></td>
				<td><?= $pecah['stok_produk']; ?></td>
				<td>
					<a href="index.php?halaman=editproduk&id=<?php echo $pecah["id_produk"]; ?>"><button class="btn btn-warning">Edit</button></a>
					<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah["id_produk"]; ?>"><button class="btn btn-danger">Hapus</button></a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>