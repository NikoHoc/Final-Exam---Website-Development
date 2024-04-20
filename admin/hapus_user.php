<?php
session_start();
include '../functions.php';

$username = $_GET['username'];
mysqli_query($conn, "DELETE FROM user WHERE username = '$username'");
echo "
        <script>
            alert('Data Admin berhasil dihapus!');
            window.location.href='user.php';
        </script>
    ";
