<?php
require 'app/init.php';

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $comic = $App->getDetailDataComic($slug);
    if (empty($comic)) {
        // Redirect to index.php
        titleNotFound('pages/404.php', $slug);
        die;
    }
} else {
    redirect('');
    exit;
}
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

    <title>Detail - Komiku</title>
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
                        <a href="<?= BASEURL; ?>" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= BASEURL; ?>" class="nav-link btn btn-primary btn-sm text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-4 title">
            <div class="col">
                <h1>Detail Komik</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3 shadow card-detail">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= BASEURL; ?>assets/img/comic-images/<?= $comic['gambar']; ?>" alt="Gambar <?= $comic['judul']; ?>" class="image-detail">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h1 class="card-title mb-3"><?= $comic['judul']; ?></h1>
                                <p class="card-text mb-1 "><strong>Penulis</strong> : <br><?= $comic['penulis']; ?></p>
                                <p class="card-text"><strong>Penerbit</strong> : <br><?= $comic['penerbit']; ?></p>
                                <div class="row">
                                    <div class="col d-flex mb-2">
                                        <a href="<?= BASEURL; ?>" class="btn btn-light border d-block">Kembali</a>
                                        <a href="<?= BASEURL; ?>update/<?= $comic['slug']; ?>" class="btn btn-warning mx-1 text-white">Ubah</a>
                                        <form action="<?= BASEURL; ?>delete.php?id=<?= $comic['id']; ?>" method="post">
                                            <button type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus data komik ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 -->
    <script src="<?= BASEURL; ?>bootstrap5/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="<?= BASEURL; ?>assets/js/script.js"></script>
</body>

</html>