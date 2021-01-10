<?php
require 'app/init.php';
$comics = $App->getAllDataComics();
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

    <title>Beranda - Komiku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>">Komiku</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-2">
                        <a href="<?= BASEURL; ?>" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASEURL; ?>" class="nav-link btn btn-primary btn-sm text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        <div class="row mt-4 title">
            <div class="col">
                <h1>Daftar Komik</h1>
                <a href="<?= BASEURL; ?>insert" class="btn btn-primary">Tambah Data Komik</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 my-2 search-input-group">
                <input type="text" class="form-control" placeholder="Cari komik disini.." id="search-input" autofocus autocomplete="off">
                <img src="<?= BASEURL; ?>assets/img/loader/loader.gif" class="loader">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= Message::getMessage('homeMessage'); ?>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 row-cols-xs-3 g-2 container-card">
            <?php foreach ($comics as $comic) : ?>
                <div class="col">
                    <div class="card h-100 shadow">
                        <div class="image">
                            <img src="<?= BASEURL; ?>assets/img/comic-images/<?= $comic['gambar']; ?>" class="card-img-top image-comic" alt="Gambar <?= $comic['judul']; ?>">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title"><?= substr($comic['judul'], 0, 30) ?><?= (strlen($comic['judul']) > 30) ? '...' : '';; ?></h5>
                            <a href="<?= BASEURL; ?>detail/<?= $comic['slug']; ?>" class="btn btn-light btn-sm border stretched-link">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="<?= BASEURL; ?>bootstrap5/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="<?= BASEURL; ?>assets/js/script.js"></script>
    <!-- Search Ajax-->
    <script src="<?= BASEURL; ?>assets/js/search.js"></script>
</body>

</html>