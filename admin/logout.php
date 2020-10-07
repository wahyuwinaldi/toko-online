<?php
if (session_destroy()) {
    echo "<script> alert('Anda telah logout');
    document.location.href='index.php?halaman=produk';
    </script>";
}
