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

if (isset($_POST['update'])) {
    $Comics->update($_POST);
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

    <title>Ubah - Komiku</title>
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

    <div class="container mb-5">
        <div class="row mt-4 title">
            <div class="col">
                <h1>Ubah Data Komik</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <?= Message::getMessage('insertMessage'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Formulir Ubah Data Komik
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $comic['id']; ?>">
                            <input type="hidden" name="gambar" value="<?= $comic['gambar']; ?>">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" autofocus value="<?= (old('judul')) ? old('judul') : $comic['judul']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= (old('penulis')) ? old('penulis') : $comic['penulis']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= (old('penerbit')) ? old('penerbit') : $comic['penerbit']; ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="gambar" name="gambar">
                                    <label class="form-file-label" for="gambar">
                                        <span class="form-file-text"><?= (old('gambar')) ? old('gambar') : $comic['gambar']; ?></span>
                                        <span class="form-file-button">Browse</span>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right" name="update">Ubah</button>
                            <a href="<?= BASEURL; ?>" class="btn btn-light border float-right mr-1">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 -->
    <script src="<?= BASEURL; ?>bootstrap5/js/bootstrap.min.js"></script>
    <!-- My Script -->
    <script src="<?= BASEURL; ?>assets/js/script.js"></script>
    <!-- Upload Input -->
    <script src="<?= BASEURL; ?>/assets/js/upload.js"></script>
</body>

</html>