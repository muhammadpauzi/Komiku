<?php
require '../app/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="<?= BASEURL; ?>bootstrap5/css/bootstrap.min.css">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= BASEURL; ?>assets/css/style.css">

    <title>404 - Halaman Tidak Ditemukan</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5 title">
            <div class="col text-center">
                <h1 class="display-1"><strong>404</strong></h1>
                <h2>Halaman tidak ditemukan.</h2>
                <hr>
                <a href="<?= BASEURL; ?>">Kembali ke beranda</a>
            </div>
        </div>
    </div>

</body>

</html>