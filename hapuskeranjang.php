<?php
session_start();
$id = $_GET['id'];
unset($_SESSION['keranjang'][$id]);
echo "
            <script> 
                alert('Sukses terhapus dari keranjang');
                document.location.href='keranjang.php';
            </script>
        ";
