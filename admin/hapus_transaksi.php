<?php
session_start();
include '../functions.php';
$nomor_resi = $_GET['nomor_resi'];
mysqli_query($conn, "DELETE FROM transaksi WHERE nomor_resi = '$nomor_resi'");
mysqli_query($conn, "DELETE FROM log WHERE nomor_resi = '$nomor_resi'");
echo "
        <script>
            alert('Data Transaksi berhasil dihapus!');
            window.location.href='index.php';
        </script>
    ";
