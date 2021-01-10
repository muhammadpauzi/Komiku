<?php
require '../../app/init.php';
$keyword = $_GET['keyword'];
$comics = $App->getAllDataComics($keyword);
if (empty($comics)) {
    echo '<p class="text-danger text-left py-5">Komik tidak ditemukan</p>';
}

foreach ($comics as $comic) : ?>
    <div class="col">
        <div class="card h-100 shadow">
            <div class="image">
                <img src="<?= BASEURL; ?>assets/img/comic-images/<?= $comic['gambar']; ?>" class="card-img-top image-comic" alt="Gambar <?= $comic['judul']; ?>">
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title"><?= $comic['judul']; ?></h5>
                <a href="<?= BASEURL; ?>detail/<?= $comic['slug']; ?>" class="btn btn-light btn-sm border ">Detail</a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>;