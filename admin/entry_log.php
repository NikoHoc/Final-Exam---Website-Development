<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}
include '../functions.php';
$nomor_resi = $_GET['nomor_resi'];
$log = mysqli_query($conn, "SELECT * FROM log WHERE nomor_resi = '$nomor_resi'");

if (isset($_POST['entry'])) {

    $tanggal_resi = $_POST['tanggal_resi'];
    $kota = $_POST['kota'];
    $keterangan = $_POST['keterangan'];

    mysqli_query($conn, "INSERT INTO log VALUES (NULL, '$nomor_resi', '$tanggal_resi', '$kota', '$keterangan')");

    echo "
        <script>    
            alert('Sukses entry log!');
            window.location.href='entry_log.php?nomor_resi=$nomor_resi';
        </script>           
    ";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS TEKWEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Halo, Admin</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php">Data Resi Pengiriman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="user.php">User Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="card m-3 p-3">
            <h1>Entry Log (Resi : <?= $nomor_resi ?>)</h1>
            <form action="" method="POST" class="p-5 w-25">
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal_resi" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">kota</label>
                    <input type="text" name="kota" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>
                <button type="submit" name="entry" class="btn btn-dark w-100 p-3">Entry</button>
            </form>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th class="bg-dark text-white">Tanggal Resi</th>
                        <th class="bg-dark text-white">Nomor Resi</th>
                        <th class="bg-dark text-white">Kota</th>
                        <th class="bg-dark text-white">Keterangan</th>
                        <th class="bg-dark text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($log as $td) : ?>
                        <tr>
                            <td><?= $td['tanggal'] ?></td>
                            <td><?= $td['nomor_resi'] ?></td>
                            <td><?= $td['kota'] ?></td>
                            <td><?= $td['keterangan'] ?></td>
                            <td>
                                <a href="hapus_log.php?id_log=<?= $td['id_log']; ?>&nomor_resi=<?= $td['nomor_resi']; ?>" class="btn btn-danger mx-1">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>


</html>