<?php
require 'app/init.php';
if (isset($_POST['insert'])) {
    $comics->insert($_POST);
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

    <title>Tambah - Komiku</title>
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
                <h1>Tambah Data Komik</h1>
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
                        Formulir Tambah Data Komik
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= old('penulis'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= old('penerbit'); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <div class="form-file">
                                    <input type="file" class="form-file-input" id="gambar" name="gambar">
                                    <label class="form-file-label" for="gambar">
                                        <span class="form-file-text">Pilih gambar...</span>
                                        <span class="form-file-button">Browse</span>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary float-right" name="insert">Tambah</button>
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