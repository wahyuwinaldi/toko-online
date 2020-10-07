<?php
if (isset($_POST["submit"])) {
	$kategori = $_POST["kategori"];
	$nama = $_POST["nama"];
	$harga = $_POST["harga"];
	$berat = $_POST["berat"];
	$stok = $_POST["stok"];
	$desc = $_POST["desc"];
	// upload gambar
	$namaFoto = $_FILES["foto"]["name"];
	$ukuranFile = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	if ($error === 4) {
		echo "
		 			<script> 
						alert('Masukkan gambar terlebih dahulu');
						document.location.href='index.php?halaman=produk';
					</script>
				";
		die;
	}

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFoto);
	$ekstensi = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensi, $ekstensiGambarValid)) {
		echo "
				<script> 
					alert('Yang anda upload bukan gambar');
					document.location.href='index.php?halaman=produk';
				</script>";
		die;
	}

	if ($ukuranFile >= 1000000) {
		echo "	
				<script> 
						alert('Gambar yang anda upload terlalu besar');
						document.location.href='index.php?halaman=produk';
					</script>
				";
		die;
	}



	$namaFileBaru = uniqid();
	$namaFileBaru .= ".";
	$namaFileBaru .= "$ekstensi";


	move_uploaded_file($tmpName, 'foto/' . $namaFileBaru);


	if (
		empty($nama) ||
		empty($harga) ||
		empty($berat) ||
		empty($desc)
	) {

		echo "
				<script> 
					alert('data tidak boleh kosong');
					document.location.href='index.php?halaman=produk';
				</script>
			";
	} else {

		$sql = $koneksi->query("INSERT INTO produk VALUES ('','$kategori','$nama','$harga','$berat','$namaFileBaru','$desc','$stok')");
		if ($sql === true) {
			echo "
					<script>
						alert('data berhasil ditambahkan');
						document.location.href='index.php?halaman=produk';
					</script>
				";
		} else {
			echo "
					<script>
						alert('data gagal ditambhkan')
						document.location.href='index.php?halaman=produk'
						;
					</script>
				";
		}
	}
}
?>

<h2>Form Tambah Data Produk</h2>

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
	<div class="form-group">
		<label for="kategori" id="kategori">Pilih Kategori</label>
		<select name="kategori" id="" class="form-control">
			<option value="">-- Pilih Kategori --</option>
			<?php foreach ($semuaData as $pecahData) : ?>
				<option value="<?php echo $pecahData["id_kategori"] ?>"><?= $pecahData["nama_kategori"]; ?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label for="nama" id="nama">Nama Produk</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama">
	</div>
	<div class="form-group">
		<label for="harga" id="harga">Harga</label>
		<input type="number" name="harga" placeholder="Harga" class="form-control">
	</div>
	<div class="form-group">
		<label for="berat" id="berat">Berat</label>
		<input type="number" name="berat" placeholder="Berat" class="form-control">
	</div>
	<div class="form-group">
		<label for="stok" id="stok">Stok Produk</label>
		<input type="number" name="stok" placeholder="stok produk" class="form-control">
	</div>
	<div class="form-group">
		<label for="foto">Foto</label>
		<input type="file" id="foto" name="foto">
	</div>
	<div class="form-group">
		<label for="desc" id="desc">Deskripsi</label>
		<textarea name="desc" type="desc" class="form-control" rows="5"></textarea>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
</form>