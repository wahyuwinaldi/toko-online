<?php
session_start();

include 'koneksi.php';
$id = $_GET['id'];



if (isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id] += 1;
} else {
    $_SESSION['keranjang'][$id] = 1;
}

// echo "<pre>";
// var_dump($cart);
// print_r($_SESSION);
// echo "<pre>";
echo "<script> 
alert('Data berhasil masuk kekeranjang');
document.location.href='keranjang.php';
</script>";
