<?php
session_start();
include '../functions.php';

$username = $_GET['username'];
mysqli_query($conn, "UPDATE user SET status_aktif = 'YES' WHERE username = '$username'");
echo "
        <script>
            alert('Berhasil Aktifkan user admin!');
            window.location.href='user.php';
        </script>
    ";
