<?php

session_start();
include 'functions.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status_aktif = 'YES'")) > 0) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status_aktif = 'YES'");
        $detail = query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status_aktif = 'YES'")[0];
        $id_user = $detail['id_user'];
        if (mysqli_num_rows($result) === 1) {
            $_SESSION["id_user"] = $id_user;
            $_SESSION["login"] = true;
            $_SESSION["admin"] = true;
            $_SESSION["username"] = $username;
            header("Location: admin");
            exit;
        }
    }

    echo "
        <script>    
            alert('Login gagal!');
            window.location.href='login.php';
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

    <nav class="bg-dark text-center text-white p-5">
        <h1>WELCOME!</h1>
    </nav>

    <main>
        <form action="" method="POST" class="p-5">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="login" class="btn btn-dark w-100 p-3">Login</button>
        </form>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>


</html>