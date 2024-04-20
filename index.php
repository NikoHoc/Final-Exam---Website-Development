<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS TEKWEB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">WELCOME!</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="card m-3 p-3">
            <h1>Cek Pengiriman</h1>
            <form id="searchForm" class="p-5 w-50" method="POST">
                <div class="mb-3 d-flex">
                    <input type="text" id="nomor_resi" class="form-control" placeholder="Nomor Pengiriman">
                    <button type="button" id="searchFormSubmit" class="btn btn-dark w-100 p-3">Lihat</button>
                </div>
            </form>
            <div id="searchResult">
                <!-- Hasil pencarian akan ditampilkan di sini -->
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#searchFormSubmit").click(function(e) {
            e.preventDefault();
            var nomor_resi = $("#nomor_resi").val();

            $.ajax({
                type: "POST",
                url: "search_log.php",
                data: {
                    search: 1,
                    nomor_resi: nomor_resi
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.length > 0) {
                        var tableHtml = "<table class='table' border='1'>";
                        tableHtml += "<thead>";
                        tableHtml += "<tr>";
                        tableHtml += "<th class='bg-dark text-white'>Tanggal</th>";
                        tableHtml += "<th class='bg-dark text-white'>Kota</th>";
                        tableHtml += "<th class='bg-dark text-white'>Keterangan</th>";
                        tableHtml += "</tr>";
                        tableHtml += "</thead>";
                        tableHtml += "<tbody>";

                        for (var i = 0; i < response.length; i++) {
                            tableHtml += "<tr>";
                            tableHtml += "<td>" + response[i].tanggal + "</td>";
                            tableHtml += "<td>" + response[i].kota + "</td>";
                            tableHtml += "<td>" + response[i].keterangan + "</td>";
                            tableHtml += "</tr>";
                        }

                        tableHtml += "</tbody>";
                        tableHtml += "</table>";

                        $("#searchResult").html(tableHtml);
                    } else {
                        $("#searchResult").html("Data tidak ditemukan.");
                    }
                }
            });
        });
    });
    </script>

</body>


</html>