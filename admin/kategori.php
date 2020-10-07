<?php
$query = $koneksi->query("SELECT * FROM kategori");
while ($pecah = $query->fetch_assoc()) {
    $semuaData[] = $pecah;
}

echo "<pre>";
print_r($semuaData);
echo "</pre>";
?>
<h3>Kategori Produk</h3>
<a href="" class="btn btn-success">Tambah Kategori</a><br><br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php foreach ($semuaData as $pecahData) : ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $pecahData["nama_kategori"]; ?></td>
                <td>
                    <a href="" class="btn btn-primary">Ubah</a>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $nomor++ ?>
        <?php endforeach ?>
    </tbody>
</table>