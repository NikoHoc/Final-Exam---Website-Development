<?php
include 'functions.php';

if (isset($_POST['search'])) {
    // Ambil nomor_resi dari data POST
    $nomor_resi = $_POST['nomor_resi'];

    // Periksa koneksi database
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    // Lakukan query pencarian berdasarkan nomor_resi
    $query = "SELECT * FROM log WHERE nomor_resi = '$nomor_resi'";
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil
    if ($result) {
        // Ambil semua data hasil query
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Keluarkan hasil dalam format JSON
        echo json_encode($data);
    } else {
        // Jika query gagal, kirimkan respon kosong
        echo json_encode([]);
    }

    // Tutup koneksi database
    mysqli_close($conn);
}
