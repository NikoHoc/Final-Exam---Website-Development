<?php
session_start();
include '../functions.php';

$id_log = $_GET['id_log'];
$nomor_resi = $_GET['nomor_resi'];
mysqli_query($conn, "DELETE FROM log WHERE id_log = '$id_log'");
echo "
        <script>
            alert('Data Log berhasil dihapus!');
            window.location.href='index.php';
        </script>
    ";
