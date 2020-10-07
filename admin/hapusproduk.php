<?php 

$id = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah["foto_produk"];

if (file_exists("foto/$foto")) {
	unlink("foto/$foto");
}

$delete = $koneksi->query("DELETE FROM produk WHERE id_produk='$id'");
if ($delete === true) {
	echo "<script> 
			alert('data berhasil dihapus');
			document.location.href='index.php?halaman=produk';
		</script>
	";
}

