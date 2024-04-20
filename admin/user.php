<?php

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location:../index.php");
}
include '../functions.php';
$user = mysqli_query($conn, "SELECT * FROM user");

if (isset($_POST['tambah'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_admin = $_POST['nama_admin'];

    mysqli_query($conn, "INSERT INTO user VALUES ('$username', '$password', '$nama_admin', 'YES')");

    echo "
        <script>    
            alert('Sukses tambah admin!');
            window.location.href='user.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
            <h1>Entry Nomor Resi</h1>
            <form action="" method="POST" class="p-5 w-25">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Admin</label>
                    <input type="text" name="nama_admin" class="form-control">
                </div>
                <button type="submit" name="tambah" class="btn btn-dark w-100 p-3">Tambah</button>
            </form>
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th class="bg-dark text-white">Username</th>
                        <th class="bg-dark text-white">Password</th>
                        <th class="bg-dark text-white">Nama Admin</th>
                        <th class="bg-dark text-white">Status Aktif</th>
                        <th class="bg-dark text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $td) : ?>
                    <tr>
                        <td><?= $td['username'] ?></td>
                        <td><?= $td['password'] ?></td>
                        <td><?= $td['nama_admin'] ?></td>
                        <td><?= $td['status_aktif'] ?></td>
                        <td>
                            <a href="nonaktifkan_user.php?username=<?= $td['username']; ?>"
                                class="btn btn-warning mx-1">Nonaktifkan</a>
                            <a href="aktifkan.php?username=<?= $td['username']; ?>"
                                class="btn btn-success mx-1">Aktifkan</a>
                            <a href="hapus_user.php?username=<?= $td['username']; ?>"
                                class="btn btn-danger mx-1">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>


</html>