<?php
$id = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

$fotoLama = $pecah["foto_produk"];

if (isset($_POST["submit"])) {
	$id = $_POST['id'];
	$kategori = $_POST["kategori"];
	$namaProduk = $_POST['nama'];
	$hargaProduk = $_POST['harga'];
	$beratProduk = $_POST['berat'];
	$deskripsiProduk = $_POST['deskripsi'];
	$stokProduk = $_POST['stok'];
	// deklarsikan foto
	$namaFoto = $_FILES['foto']['name'];

	if ($namaFoto !== "") {
		$ukuranFoto = $_FILES['foto']['size'];
		$error = $_FILES['foto']['error'];
		$lokasiFoto = $_FILES['foto']['tmp_name'];
		// cek apakah yang diupload bukan gambar
		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFoto);
		$ekstensi = strtolower(end($ekstensiGambar));

		if (!in_array($ekstensi, $ekstensiGambarValid)) {
			echo "
					<script>
						alert('yang anda upload bukan gambar!');
						document.location.href='index.php?halaman=produk';
					</script>
				";
			die;
		}

		if ($ukuranFoto >= 1000000) {
			echo "
					<script>
						alert('ukuran File terlalu besar');
						document.location.href='index.php?halaman=produk';
					</script>
				";
			die;
		}
		// ubah file dengan membangkitkan angka uniq
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= "$ekstensi";

		move_uploaded_file($lokasiFoto, 'foto/' . $namaFileBaru);

		$queri = $koneksi->query("UPDATE produk SET id_kategori = '$kategori',
			nama_produk = '$namaProduk',
			harga_produk = '$hargaProduk',
			berat_produk = '$beratProduk',
			foto_produk = '$namaFileBaru',
			deskripsi_produk = '$deskripsiProduk',
			stok_produk = '$stokProduk',
			WHERE id_produk = $id");


		if ($queri === true) {
			echo "
					<script>
						alert('data berhasil diubah');
						document.location.href='index.php?halaman=produk';
					</script>
				";
			die;
		}
	} elseif (empty($lokasiFoto)) {
		$queri = $koneksi->query("UPDATE produk SET id_kategori = '$kategori',
				nama_produk = '$namaProduk',
				harga_produk = '$hargaProduk',
				berat_produk = '$beratProduk',
				foto_produk = '$fotoLama',
				deskripsi_produk = '$deskripsiProduk',
				stok_produk = '$stokProduk' WHERE id_produk = '$id'");
		if ($queri === true) {
			echo "
					<script>
						alert('data berhasil diubah');
						document.location.href='index.php?halaman=produk';
					</script>
				";
			die;
		}
	}
}
?>

<h2>Form Ubah Data Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($data = $ambil->fetch_assoc()) {
	$semuaData[] = $data;
}
// echo "<pre>";
// print_r($semuaData);
// echo "</pre>";
?>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" class="for-control" value="<?= $pecah["id_produk"]; ?>">
	<input type="hidden" name="fotoLama" class="form-control" value="<?= $pecah["foto_produk"]; ?>">
	<div class="form-group">
		<label for="kategori" id="kategori">Pilih Kategori</label>
		<select readonly name="kategori" id="" class="form-control">
			<option value="">-- Pilih Kategori --</option>
			<?php foreach ($semuaData as $pecahData) : ?>
				<option value="<?php echo $pecahData["id_kategori"] ?>" <?php if ($pecah["id_kategori"] == $pecahData["id_kategori"]) {
																			echo "selected";
																		} ?>>
					<?= $pecahData["nama_kategori"]; ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label for="nama" id="nama">Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah["nama_produk"]; ?>">
	</div>
	<div class="form-group">
		<label for="harga" id="harga">Harga</label>
		<input type="number" name="harga" value="<?php echo $pecah["harga_produk"]; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="berat" id="berat">Berat</label>
		<input type="number" name="berat" value="<?php echo $pecah["berat_produk"]; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="stok" id="stok">Stok Produk</label>
		<input type="number" name="stok" value="<?php echo $pecah["stok_produk"]; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="foto">Foto</label> <br>
		<img width="200" src="foto/<?= $pecah["foto_produk"]; ?> ">
		<input type="file" id="foto" name="foto">
	</div>
	<div class="form-group">
		<label for="deskripsi" id="deskripsi">Deskripsi</label>
		<textarea name="deskripsi" type="text" class="form-control" rows="5"><?php echo $pecah["deskripsi_produk"]; ?></textarea>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>